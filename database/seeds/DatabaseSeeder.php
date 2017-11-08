<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id'=>1,
                'role'=>'admin'
            ],
            [
                'id'=>2,
                'role'=>'user'
            ]
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
