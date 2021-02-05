<?php

if(! function_exists('myResponse')){
    function myResponse($message, $status = false){
        return ['status' => $status, 'message' => $message];
    }
}

if(! function_exists('mySession')){
    function mySession($status  = true, $message = ''){
        session()->flash('sessionMessage', $message);
        if($status){
            session()->flash('sessionClass', 'success');
        }else{
            session()->flash('sessionClass', 'danger');
        }
    }
}