<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\materi;
use App\kursus;


class materiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materi = materi::orderBy('created_at', 'DESC')->get();
        $kursus = kursus::orderBy('created_at', 'DESC')->get();
        return view('materi.index', compact('materi', 'kursus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kursus = kursus::all(); // Ambil semua kursus untuk dropdown
        return view('materi.create', compact('kursus'));
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
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'durasi' => 'required|string'
        ]);

        Materi::create([
            'kursusid' => $request->kursusid, // Tambahkan ini
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'durasi' => $request->durasi,
        ]);

        return redirect()->route('materi.index')->with('success', 'Materi berhasil ditambahkan!');
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
        $materi = materi::findOrFail($id);
        $kursus = kursus::all();
        return view('materi.edit', compact('materi', 'kursus'));
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
        $materi = materi::findOrFail($id);

        $request->validate([
            'kursusid' => 'required|exists:kursus,kursusid',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'durasi' => 'required|string'
        ]);

        $materi->update($request->all());

        return redirect()->route('materi.index')->with('success', 'Materi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materi = materi::findOrFail($id);
        $materi->delete();

        return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus!');
    }
}
