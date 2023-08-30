<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\LecturerRequest;

class UserController extends Controller
{
    //
    public function __construct(
        private UserService $UserService
    ) {
    }

    public function listLecturer()
    {
        $lecturersData = $this->UserService->getLecturerData();

        if (count($lecturersData)) {
            return response()->json(
                [
                'status' => 'success',
                'message' => null,
                'data' => $lecturersData
                ],
                200
            );
        } else {
            return response()->json(
                [
                'status' => 'success',
                'message' => '無講師資料',
                'data' => $lecturersData
                ],
                200
            );
        }
    }

    public function createLecturer(LecturerRequest $request)
    {
        $lecturerData = array(
            'name'=>$request->input('lecturerName'),
            'ulogin'=>$request->input('uLogin'),
            'password'=>$request->input('password'),
            'email'=>$request->input('email')
        );
        $lecturersData = $this->UserService->storeLecturerData($lecturerData);
        return response()->json(
            [
            'status' => 'success',
            'message' => null,
            'data' => $lecturersData
            ],
            200
        );
    }
}
