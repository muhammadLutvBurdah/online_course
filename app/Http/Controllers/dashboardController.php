<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\kursus;
use App\materi;
use App\pembayaran;
use Illuminate\Support\Facades\Auth;
class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();
        if ($user->role === 'admin') {
            $user = User::where('role', 'user')->count();
            $totalKursus = kursus::count();
            $totalMateri = materi::count();
            $totalPembayaran = pembayaran::count();

            return view('dashboard.home', compact('totalKursus', 'totalMateri', 'totalPembayaran', 'user'));
        } elseif ($user->role === 'user') {
            // Data kursus untuk user
            $user = User::count();
            $totalKursus = kursus::count();
            $totalMateri = materi::count();
            $totalPembayaran = pembayaran::count();



            return view('dashboard.user', compact('kursusList'));
        } else {
            return redirect('/login')->with('error', 'Akses tidak diizinkan.');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        return view('dashboard.home'); // view untuk admin
    }

    public function user()
    {
        return view('dashboard.user'); // view untuk user
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
