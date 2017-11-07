<?php

namespace App\Console\Commands;

use App\registration;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class mailcommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send daily mail with excel';

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
        $this->info('sending mail with excel');
        $this->excel();
        $this->sendmail();
        $this->info('done');
        //
    }
    public function sendmail(){

        $user = User::find(1)->toArray();
        Mail::send('emails.adminEvent', $user, function($message) use ($user) {
            $activezone=DB::table('competitions')->where('Active','=',1)->get();
            $message->from('no-reply@hello.int','carapils competitie');
            $message->to($activezone[0]->email);
            $today = date('Y-m-d');
            $url = Storage::url('overzicht.csv');
            print_r($url);
            $message->attach(storage_path('app/public/overzicht.csv'),[
                'as' => 'overzicht'.$today.'.csv'
            ]);
            $message->subject('overzicht');
        });
    }
    public function excel(){

        $activezone=DB::table('competitions')->where('Active','=',1)->get();
        $activezoneid=$activezone[0]->id;
        $type='csv';
        $create_excel=registration::select('name','straat','nummer','stad','postcode','email','ip_address')->where('competition_id','=',$activezoneid)->orderBy('id','desc')->get()->toArray();
        $excelFile = Excel::create('overzicht', function($excel) use ($create_excel) {
            $excel->sheet('mySheet', function($sheet) use ($create_excel)
            {
                $sheet->fromArray($create_excel);


            });

        })->store($type,storage_path('app/public'));

    }
}
