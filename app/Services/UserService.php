<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

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

    public function storeLecturerData($lecturerData)
    {
        $password = Hash::make($lecturerData['password']);
        $user = array(
            'name'=>$lecturerData['name'],
            'ulogin'=>$lecturerData['ulogin'],
            'email'=>$lecturerData['email'],
            'password'=>$password,
            'type'=>'T'
        );
        $userData = $this->UserRepository->storeUser($user);
        $lecturerData = array(
            'lecturerID'=>$userData['userID'],
            'lecturerName'=>$userData['name'],
            'uLogin'=>$userData['ulogin'],
            'email'=>$userData['email'],
            'created_at'=>$userData['created_at'],
            'updated_at'=>$userData['updated_at'],
        );
        return $lecturerData;
    }
}
