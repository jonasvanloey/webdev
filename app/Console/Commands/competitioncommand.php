<?php

namespace App\Console\Commands;

use App\User;
use App\winnaar;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class competitioncommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'competition-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update competition?';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment('checking competitions');
        if($this->checkcomp()){
            $this->comment('finding winner and updating competition');
            try{

                $this->info('finding winner');
                $this->getwinner();
                $this->info('send mail to winner');
                $this->mailwinner();
                $this->info('done');
                $this->info('updating competition');
                $this->nextcomp();
                $this->info('done');
            }
            catch (QueryException $e ) {
                $this->comment('something went wrong');
                $this->error($e->getMessage());
            }


        }
        else{
            $this->comment('no need for an update');
        }
        $this->info('done');
        //
    }
    public function checkcomp(){
        $activezone=DB::table('competitions')->where('Active','=',1)->get();
        $this->comment($activezone);
        $today=date('Y-m-d');
        if($activezone[0]->end_date===$today){
               return true;
        }
        else{
            return false;
        }
    }
    public function nextcomp(){
        $today=date('Y-m-d');
        DB::table('competitions')->where('end_date','=',$today)->update(['Active'=>0]);
        DB::table('competitions')->where('start_date','=',$today)->update(['Active'=>1]);
    }
    public function mailwinner(){
        $user = User::find(1)->toArray();
        Mail::send('emails.mailEvent', $user, function($message) use ($user) {
            $activezone=DB::table('competitions')->where('Active','=',1)->get();
            $activezoneid=$activezone[0]->id;
            $winner=DB::select(DB::raw("SELECT votes.uploads_id , COUNT(votes.user_id), registrations.competition_id FROM `votes` INNER JOIN registrations ON votes.uploads_id = registrations.uploads_id WHERE registrations.competition_id = $activezoneid GROUP BY votes.uploads_id, registrations.competition_id ORDER BY COUNT(votes.user_id) DESC"));
            $wreg=DB::table('registrations')->where('uploads_id','=',$winner[0]->uploads_id)->get()->values()->all();
            $message->from('no-reply@hello.int','carapils competitie');
            $message->to($wreg[0]->email);
            $message->subject('Gefeliciteerd');
        });


    }
    public function getwinner(){
        $activezone=DB::table('competitions')->where('Active','=',1)->get();
        $activezoneid=$activezone[0]->id;
        $winner=DB::select(DB::raw("SELECT votes.uploads_id , COUNT(votes.user_id), registrations.competition_id FROM `votes` INNER JOIN registrations ON votes.uploads_id = registrations.uploads_id WHERE registrations.competition_id = $activezoneid GROUP BY votes.uploads_id, registrations.competition_id ORDER BY COUNT(votes.user_id) DESC"));
        $wreg=DB::table('registrations')->where('uploads_id','=',$winner[0]->uploads_id)->get()->values()->all();
        $winner = new winnaar();
        $winner->competition_id=$activezoneid;
        $winner->registration_id=$wreg[0]->id;
        $winner->save();

    }
}
