<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::orderBy('updated_at', 'desc')->get();
        $buku = Buku::with('kategori')->get();
        return view('pages.buku.tabel', compact('kategori', 'buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'kategori' => 'required',
            'jumlahBuku' => 'required',
            'deskripsi' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk cover buku
            'bukuPdf' => 'required|mimes:pdf|max:10000', // Validasi untuk PDF buku
        ]);

        $buku = new Buku();
        $buku->user_id = $request->user_id;
        $buku->kategori_id = $request->kategori;
        $buku->judul_buku = $request->judul_buku;
        $buku->jumlah_buku = $request->jumlahBuku;
        $buku->deskripsi = $request->deskripsi;

        // Menyimpan cover buku
        if ($request->hasFile('cover')) {
            $coverBukuPath = $request->file('cover')->store('cover_buku', 'public');
            $buku->cover_buku = $coverBukuPath; // Simpan path cover buku di database
        }

        // Menyimpan PDF buku
        if ($request->hasFile('bukuPdf')) {
            $bukuPDFPath = $request->file('bukuPdf')->store('buku_pdf', 'public');
            $buku->file_buku = $bukuPDFPath; // Simpan path PDF buku di database
        }

        $buku->save();

        return redirect()->back()->with('success', 'Data buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = Buku::find($id);
        if ($id->cover_buku) Storage::delete($id->cover_buku);
        if ($id->file_buku) Storage::delete($id->file_buku);
        $id->delete();
        return redirect()->back()->with('success', 'Buku Berhasil Dihapus');
    }
}
