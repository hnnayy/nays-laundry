<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index(): string
    {
        return view('user.html');
    
    }
}
