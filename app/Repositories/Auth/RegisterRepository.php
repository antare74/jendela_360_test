<?php
namespace App\Repositories\Auth;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Repositories\UserRepository\UserRepository;
class RegisterRepository
{
    public function createUser($inputs = []){
        try {
            $userRepository = new UserRepository();
            if (isset($inputs['email'])){
                $findUsers = $userRepository->findUserByEmail($inputs['email']);
                if (!$findUsers){
                    $createUser = Sentinel::registerAndActivate($inputs);
                    if (!$createUser){
                        return myResponse('sorry, unable to create user! please try again');
                    }
                    return myResponse('user created', true);
                }
                return myResponse('user with this email already exist');
            }
            return myResponse('email is required');
        }catch (\Exception $e){
            /* untuk monitoring lebih baik di buat log dari exception */
            return myResponse('sorry, unable to create user! please try again');
        }
    }
}
