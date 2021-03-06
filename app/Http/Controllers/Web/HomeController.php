<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

class HomeController extends WebController
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
    }

    /**
     * Show the application OAuth2 dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function oauth2()
    {
        return view('oauth2');
    }
}
