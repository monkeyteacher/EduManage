<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public function __construct(
        private UserRepository $UserRepository
    ) {
    }

    public function getLecturerData()
    {
        $lecturerData = $this->UserRepository->getAllLecturerData();
        return $lecturerData->map(function ($item) {
            return [
                'lecturerID'=>$item['userID'],
                'lecturerName'=>$item['name'],
                'uLogin'=>$item['ulogin'],
                'email'=>$item['email'],
                'created_at'=>$item['created_at'],
                'updated_at'=>$item['updated_at'],
            ];
        });
    }
}
