<?php
namespace App\Repositories\UserRepository;

use App\User;

class UserRepository{
    public function findUserByEmail($email){
        return User::with([])->where('email', $email)->oldest()->first();
    }
}