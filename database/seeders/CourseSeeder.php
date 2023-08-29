<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('courses')->insert([
            [
                'courseName'=>'物件導向程式設計',
                'introduction'=>'歡迎來到「深入理解物件導向程式設計」課程！本課程旨在引導您進入物件導向程式設計的世界，探索這個廣泛應用於軟體開發領域的強大範式。無論您是初學者還是有經驗的開發者，這個課程都將提供您從基本概念到高級技巧的全面學習體驗。',
                'courseTime'=>'0800-1000',
                'lecturerID'=>'1'
            ],[
                'courseName'=>'網頁程式語言設計',
                'introduction'=>'歡迎來到「網頁程式設計與物件導向」課程！本課程將引導您進入網頁開發的精彩世界，結合物件導向程式設計的核心概念，教您如何創建動態、互動性豐富的現代網頁應用。不論您是新手還是有經驗的開發者，這個課程都將提供您所需的知識和技能，讓您能夠在網頁開發領域中脫穎而出。',
                'courseTime'=>'1000-1200',
                'lecturerID'=>'1'
            ],
        ]);
    }
}
