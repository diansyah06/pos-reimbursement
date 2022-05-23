<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Dashboard'
        ];
        return view('home/index', $data);
    }

    public function user()
    {
        $data = [
            'title' => 'Home | Dashboard'
        ];
        return view('user/index', $data);
    }
}