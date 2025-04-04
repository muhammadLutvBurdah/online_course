<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kursus;
class kursusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kursus = kursus::orderBy('created_at', 'DESC')->get();
        return view('kursus.index', compact('kursus'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kursus.create');
        return view('kursus.create');
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
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'poto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('poto');

        if ($request->hasFile('poto')) {
            $fileName = time() . '.' . $request->file('poto')->extension();
            $request->file('poto')->move(public_path('uploads'), $fileName);
            $data['poto'] = 'uploads/' . $fileName;
        }

        Kursus::create($data);

        return redirect()->route('kursus.index')->with('success', 'Kursus berhasil ditambahkan!');

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
        $kursus = kursus::findOrFail($id);
        return view('kursus.edit', compact('kursus'));
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
        $kursus = Kursus::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'poto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('poto');

        if ($request->hasFile('poto')) {
            // Hapus foto lama jika ada
            if ($kursus->poto && file_exists(public_path($kursus->poto))) {
                unlink(public_path($kursus->poto));
            }

            // Simpan foto baru
            $fileName = time() . '.' . $request->file('poto')->extension();
            $request->file('poto')->move(public_path('uploads'), $fileName);
            $data['poto'] = 'uploads/' . $fileName;
        }

        $kursus->update($data);

        return redirect()->route('kursus.index')->with('success', 'Kursus berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kursus = Kursus::findOrFail($id);

        // Hapus foto dari folder jika ada
        if ($kursus->poto && file_exists(public_path($kursus->poto))) {
            unlink(public_path($kursus->poto));
        }

        $kursus->delete();

        return redirect()->route('kursus.index')->with('success', 'Kursus berhasil dihapus!');
    }
}
