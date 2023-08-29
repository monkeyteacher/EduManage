<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('course_students')->insert([
            [
                'courseID'=>'1',
                'stuID'=>'2'
            ],[
                'courseID'=>'2',
                'stuID'=>'2'
            ],
        ]);
    }
}
