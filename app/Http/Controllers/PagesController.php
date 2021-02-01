<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function about(){
        return view('about');
    }

    public function login(){
        return view('login');
    }

    public function preferences(){
        return view('preferences');
    }

    public function register(){
        return view('register');
    }
}
