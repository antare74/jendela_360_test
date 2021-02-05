<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Requests\Auth\CreateUserValidation;
use App\Http\Requests\Auth\LoginAuth;
use App\Repositories\Auth\LoginRepository;
use App\Repositories\Auth\RegisterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    protected $loginRepository;
    protected $registerRepository;
    public function __construct()
    {
        $this->loginRepository      = new LoginRepository();
        $this->registerRepository   = new RegisterRepository();
    }

    public function createUser(CreateUserValidation $request){
        $filter = $request->only('first_name', 'last_name', 'email', 'password');
        $createUser = $this->registerRepository->createUser($filter);
        if (!$createUser['status']){
            mySession($createUser['message'], $createUser['status']);
            return back();
        }
        return redirect(route('dashboard'));
    }

    public function loginAuth(LoginAuth $request){
        $filter     = $request->only('email', 'password');
        $loginAuth  = $this->loginRepository->loginAuth($filter);
        if (!$loginAuth['status']){
            mySession($loginAuth['status'], $loginAuth['message']);
            return back();
        }
        return redirect(route('dashboard'));
    }

    public function logoutAuth(){
        $logoutAuth = $this->loginRepository->logoutAuth();
        if (!$logoutAuth['status']){
            mySession($logoutAuth['status'], $logoutAuth['message']);
            return back();
        }
        return redirect(route('login'));
    }

    public function indexLogin(){
        return view('pages.authentication.login');
    }

    public function indexRegister(){
        return view('pages.authentication.register');
    }
}
