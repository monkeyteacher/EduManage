<?php

namespace App\Http\Controllers;

use App\Services\UserService;

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
}
