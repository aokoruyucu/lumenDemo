<?php

/**
 * Created by PhpStorm.
 * User: ahmetoguz
 * Date: 11/01/2017
 * Time: 15:21
 */
namespace App;

use Illuminate\Support\Facades\Auth;

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}
