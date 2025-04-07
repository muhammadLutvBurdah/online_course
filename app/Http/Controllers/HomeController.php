<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\kursus;
use App\materi;
use App\pembayaran;
use Illuminate\Support\Facades\Auth;


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
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
    
        $user = Auth::user();
    
        if ($user->role === 'admin') {
            $totalKursus = kursus::count();
            $totalMateri = materi::count();
            $totalPembayaran = pembayaran::count();
    
            return view('dashboard.home', compact('totalKursus', 'totalMateri', 'totalPembayaran'));
        } elseif ($user->role === 'user') {
            $totalKursus = kursus::count();
            $totalMateri = materi::count();
            $totalPembayaran = pembayaran::count();
            return view('dashboard.user', compact('totalKursus', 'totalMateri', 'totalPembayaran'));
        }
    
        // return redirect('/')->with('error', 'Akses tidak diizinkan.');
    }
}
