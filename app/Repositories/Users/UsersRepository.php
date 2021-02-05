<?php
namespace App\Repositories\Users;

use App\User;

class UsersRepository{

    public function findUserByEmail($email){
        return User::with([])->where('email', $email)->oldest()->first();
    }
}