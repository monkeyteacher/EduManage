<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getAllLecturerData()
    {
        return User::where('type', 'T')->get();
    }
}
