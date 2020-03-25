<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
        // api request
    }
    public function userslist()
    {
        return view('userslist');
        // api request
    }
    public function eventlist()
    {
        return view('eventlist');
        // api request
    }
    public function register()
    {
        return view('auth/register');
        // api request
    }
}
