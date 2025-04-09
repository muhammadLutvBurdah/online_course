<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kursusPengguna;
use App\kursus;
use App\pembayaran;

class kursusPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil daftar kursus pengguna beserta kursus admin terkait
        $kursusPengguna = KursusPengguna::with('kursus')->get();

        $kursusList = [
            [
                'image' => asset('/assets/images/slider/img-slide-1.jpg'),
                'judul' => 'Dasar-Dasar Pengembangan Website: HTML, CSS dan...',
                'pengajar' => 'Remote Worker Indonesia',
                'rating' => 4.6,
                'ulasan' => 56,
                'harga_asli' => 309000,
                'harga_diskon' => 99000,
                'status' => ''
            ],
            [
                'image' => asset('/assets/images/slider/img-slide-2.jpg'),
                'judul' => 'Belajar Web Development Menggunakan Bahasa...',
                'pengajar' => 'CodePolitan Online',
                'rating' => 4.6,
                'ulasan' => 393,
                'harga_asli' => 529000,
                'harga_diskon' => 99000,
                'status' => ''
            ],
            [
                'image' => asset('/assets/images/slider/img-slide-4.jpg'),
                'judul' => 'Web Programming Dasar Sampai Mahir',
                'pengajar' => 'Dr. Junaidi S.Kom',
                'rating' => 4.8,
                'ulasan' => 33,
                'harga_asli' => 289000,
                'harga_diskon' => 99000,
                'status' => ''
            ],
            [
                'image' => asset('/assets/images/slider/img-slide-6.jpg'),
                'judul' => 'The Complete Full-Stack Web Development Bootcamp',
                'pengajar' => 'Dr. Angela Yu',
                'rating' => 4.7,
                'ulasan' => 432128,
                'harga_asli' => 639000,
                'harga_diskon' => 99000,
                'status' => 'Terlaris'
            ]
        ];


        return view('kursusPengguna.index', compact('kursusPengguna', 'kursusList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kursus = Kursus::findOrFail($id);
        return view('kursusPengguna.create', compact('kursus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kursusid' => 'required|exists:kursus,kursusid',
            'tujuan_tf' => 'required|string',
            'tanggal_tf' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric',
        ]);

        pembayaran::create([
            'kursusid' => $request->kursusid,
            'tujuan_tf' => $request->tujuan_tf,
            'tanggal_tf' => $request->tanggal_tf,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
        ]);

        return redirect()->route('kursusPengguna.index')->with('success', 'Pembayaran berhasil dikirim!');
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
