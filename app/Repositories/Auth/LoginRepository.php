<?php

namespace App\Repositories\Auth;
use App\Repositories\Users\UsersRepository;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class LoginRepository
{

    public function loginAuth($inputs = []){
        try {
            $userRepository = new UsersRepository();
            /* check if email field exist */
            if (isset($inputs['email'])){
                /* check if user available */
                $findUsers = $userRepository->findUserByEmail($inputs['email']);
                if (!$findUsers){
                    return myResponse('sorry, please check your input email and password is incorrect!');
                }
                /* authenticated user with credentials */
                $user = Sentinel::authenticate($inputs);
                if (!$user){
                    return myResponse('sorry, incorrect password');
                }
                return myResponse('login successfully', true);
            }
            return myResponse('please insert your email');
        }catch (\Exception $e){
            /* $e log monitoring login method*/
            return myResponse('sorry, unable to login at this time');
        }
    }

    public function logoutAuth(){
        try {
            /* sentinel logout */
            $user = Sentinel::logout();
            if (!$user){
                return myResponse('sorry, looks like something wrong');
            }
            return myResponse('logout successfully', true);
        }catch (\Exception $e){
            /* $e log monitoring for logout method */
            return myResponse('sorry, looks like something wrong');
        }
    }
}
