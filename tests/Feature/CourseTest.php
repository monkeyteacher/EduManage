<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Arr;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->artisan('db:seed');
    }

    /**
     * 測試課程列表API(Test course list)
     *
     * @return void
     */
    public function test_list_course_api_is_work()
    {
        $response = $this->get('api/course');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "status",
            "data"=> [
                '*' => [
                    "courseID",
                    "courseName",
                    "introduction",
                    "courseTime",
                    "lecturerID",
                    "created_at",
                    "updated_at",
                ]
            ],
            "message"
        ])->assertJson([
            "status" => "success",
        ]);
    }

    /**
     * 測試授課講師所開課程列表API(Test lecturer course list)
     *
     * @return void
     */
    public function test_list_lecturer_course_api_is_work()
    {
        $response = $this->get('api/course?lecturerID=1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "status",
            "data"=> [
                '*' => [
                    "courseID",
                    "courseName",
                    "introduction",
                    "courseTime",
                    "lecturerID",
                    "created_at",
                    "updated_at",
                ]
            ],
            "message"
        ]);
    }

    /**
     * 測試新增課程API(Test create course)
     *
     * @return void
     */
    public function test_create_course_api_is_work()
    {
        $courseData = array(
            'courseName'=>'測試課程',
            'introduction'=>'測試課程',
            'courseTime'=>'08001200',
            'lecturerID'=>'1',
        );
        $response = $this->json('POST', 'api/course', $courseData);
        $response->assertStatus(200);
        $response->dump();
        $response->assertJsonStructure([
            "status",
            "data"=> [
                "courseID",
                "courseName",
                "introduction",
                "courseTime",
                "lecturerID",
                "created_at",
                "updated_at",
            ],
            "message"
        ])->assertJson([
            "status" => "success",
            "data"=>$courseData
        ]);
    }

    /**
     * 測試更新課程API(Test update course)
     *
     * @return void
     */
    public function test_update_course_api_is_work()
    {
        $courseData = array(
            'courseName'=>'測試課程',
            'introduction'=>'測試課程',
            'courseTime'=>'08001200',
            'lecturerID'=>'1',
        );
        $response = $this->json('PUT', 'api/course/1', $courseData);
        $response->assertStatus(200);
        $courseData = Arr::add($courseData, 'courseID', 1);
        $response->assertJsonStructure([
            "status",
            "data"=> [
                "courseID",
                "courseName",
                "introduction",
                "courseTime",
                "lecturerID",
                "created_at",
                "updated_at",
            ],
            "message"
        ])->assertJson([
            "status" => "success",
            "data"=>$courseData
        ]);
    }

    /**
     * 測試刪除課程API(Test delete course)
     *
     * @return void
     */
    public function test_delete_course_api_is_work()
    {
        $response = $this->json('DELETE', 'api/course/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "status",
            "data",
            "message"
        ])->assertJson([
            "status" => "success",
        ]);
    }
}
