<?php

namespace LaraDev\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LaraDev\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function showLogininForm()
    {
        return view('admin.index');
    }
}
