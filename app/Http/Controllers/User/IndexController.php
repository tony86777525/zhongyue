<?php

namespace App\Http\Controllers\User;

class IndexController extends BasicController
{
    public function index()
    {

        return view('web.home');
    }
}
