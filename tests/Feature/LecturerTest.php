<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Arr;

class LecturerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        // 一定要先呼叫，建立 Laravel Service Container 以便測試
        parent::setUp();
        $this->artisan('migrate');
        $this->artisan('db:seed');
        // 每次都要初始化資料庫
    }

    /**
     * 測試授課講師列表API(Test lecturer list)
     *
     * @return void
     */
    public function test_list_lecturer_api_is_work()
    {
        $response = $this->get('api/lecturer');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "status",
            "data"=> [
                '*' => [
                    "lecturerID",
                    "lecturerName",
                    "uLogin",
                    "email",
                    "created_at",
                    "updated_at",
                ]
            ],
            "message"
        ])->assertJson([
            "status" => "success",
        ]);
    }

    public function test_create_lecturer_api_is_work()
    {
        $lecturerData = array(
            'lecturerName'=>'test123',
            'uLogin'=>'test123',
            'password'=>'test123',
            'email'=>'test123@gmail.com',
        );
        $response = $this->json('POST', 'api/lecturer', $lecturerData);
        $response->assertStatus(200);
        $lecturerData = Arr::except($lecturerData, ['password']);
        $response->assertJsonStructure([
            "status",
            "data"=> [
                "lecturerID",
                "lecturerName",
                "uLogin",
                "email",
                "created_at",
                "updated_at",
            ],
            "message"
        ])->assertJson([
            "status" => "success",
            "data"=>$lecturerData
        ]);
    }
}
