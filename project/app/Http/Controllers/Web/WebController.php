<?php

namespace LaraDev\Http\Controllers\Web;

use Illuminate\Http\Request;
use LaraDev\Http\Controllers\Controller;

class WebController extends Controller
{
    public function home()
    {
        return view('web.home');
    }

    public function rent()
    {
        return view('web.filter');
    }

    public function buy()
    {
        return view('web.filter');
    }

    public function filter()
    {
        return view('web.filter');
    }

    public function contact()
    {
        return view('web.filter');
    }
}
