<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'ulogin'=>'test',
                'password'=>bcrypt('test'),
                'name'=>'test',
                'email'=>'test@gmail.com',
                'type'=>'T'
            ],[
                'ulogin'=>'stu',
                'password'=>bcrypt('stu'),
                'name'=>'stu',
                'email'=>'stu@gmail.com',
                'type'=>'S'
            ]
        ]);
    }
}
