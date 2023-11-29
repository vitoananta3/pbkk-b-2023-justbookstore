<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function signin()
    {
        $data = [
            'title' => 'Sign In | JustBookStore',
            'page' => 'sign in'
        ];
        return view('user/signin', $data);
    }

    public function signup() 
    {
        $data = [
            'title' => 'Sign Up | JustBookStore',
            'page' => 'sign up'
        ];
        return view('user/signup', $data);
    }
}
