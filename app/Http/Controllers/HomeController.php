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
        // displays home view page of admin panel
    }
    public function userslist()
    {
        return view('userslist');
        // displays userslist view page of admin panel
    }
   
    public function eventlist()
    {
        return view('eventlist');
        // displays eventlist view page of admin panel
    }
    public function register()
    {
        return view('auth/register');
        // displays register page to create new college or admin from admin panel
    }
}
