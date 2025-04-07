<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\kursus;
use App\materi;
use App\pembayaran;
class HomeController extends Controller
{
    /**z
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
        $user = Auth::user();;
        if ($user->role === 'admin') {
           return view('dashboard.home');
        } elseif ($user->role === 'user') {
            return view('dashboard.user');
        }
    }
}
