<?php

namespace App\Storage\Implementations;

use App\Models\User;
use App\Storage\UserRepository;


class DbUserRepository implements UserRepository 
{
    public function add(User $user)
    {
        $user->save();
    }
    public function getUserByEmail(string $email):?User {
        return User::where('email', $email)->first();
    }
} 