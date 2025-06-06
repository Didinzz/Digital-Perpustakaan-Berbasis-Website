<?php

namespace App\Http\Controllers;

use App\Exports\BukuExport;
use App\Models\Buku;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class BukuController extends Controller
{
    public function bukuUser(Request $request)
    {
        $qeury = Buku::query();

        if ($request->filled('judul')) {
            $qeury->where('judul_buku', 'like', '%' . $request->input('judul') . '%');
        }

        if ($request->filled('kategori')) {
            $qeury->where('kategori_id', $request->input('kategori'));
        }

        $buku = $qeury->with('kategori')->where('user_id', auth()->user()->id)->get();

        $kategori = Kategori::orderBy('updated_at', 'desc')->get();
        $bukuEdit = Buku::all()->keyBy('id');
        return view('pages.buku.tabelBukuUser', compact('kategori', 'buku', 'bukuEdit'));
    }

    public function exportPdf()
    {
        $buku = Buku::with('kategori')->get();


        $pdf = Pdf::loadView('pages.export.pdf', ['bukus' => $buku]);

        return $pdf->download('buku.pdf');
    }
    public function exportExcel()
    {
        return Excel::download(new BukuExport, 'buku.xlsx');
        // return (new BukuExport)->download('buku.xlsx');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $qeury = Buku::query();

        if ($request->filled('judul')) {
            $qeury->where('judul_buku', 'like', '%' . $request->input('judul') . '%');
        }

        if ($request->filled('kategori')) {
            $qeury->where('kategori_id', $request->input('kategori'));
        }

        $buku = $qeury->with('kategori')->get();

        $bukuCount = Buku::all()->count();

        $kategori = Kategori::orderBy('updated_at', 'desc')->get();
        $bukuEdit = Buku::all()->keyBy('id');
        return view('pages.buku.tabel', compact('kategori', 'buku', 'bukuEdit', 'bukuCount'));
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
        $request->validate(
            [
                'judul_buku' => 'required',
                'kategori' => 'required',
                'jumlahBuku' => 'required',
                'deskripsi' => 'required',
                'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk cover buku
                'bukuPdf' => 'required|mimes:pdf|max:35000', // Validasi untuk PDF buku
            ],

            [
                'cover.mimes' => 'File cover buku harus berupa jpeg, png, jpg',
                'cover.max' => 'File cover buku tidak boleh lebih dari 2 MB',
                'bukuPdf.mimes' => 'File buku harus berupa pdf',
                'bukuPdf.max' => 'File buku tidak boleh lebih dari 35 MB',
            ]

        );

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
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'judul_buku' => 'required',
                'kategori' => 'required',
                'jumlahBuku' => 'required',
                'deskripsi' => 'required',
                'cover' => 'image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk cover buku
                'bukuPdf' => 'mimes:pdf|max:10000', // Validasi untuk PDF buku
            ],

            [
                'cover.mimes' => 'File cover buku harus berupa jpeg, png, jpg',
                'cover.max' => 'File cover buku tidak boleh lebih dari 2 MB',
                'bukuPdf.mimes' => 'File buku harus berupa pdf',
                'bukuPdf.max' => 'File buku tidak boleh lebih dari 10 MB',
            ]

        );
        $buku = Buku::findOrfail($id);
        $buku->kategori_id = $request->kategori;
        $buku->judul_buku = $request->judul_buku;
        $buku->jumlah_buku = $request->jumlahBuku;
        $buku->deskripsi = $request->deskripsi;

        if ($request->hasFile('cover')) {
            if ($buku->cover_buku) {
                Storage::disk('public')->delete($buku->cover_buku);
            }
            $coverPath = $request->file('cover')->store('cover_buku', 'public');
            $buku->cover_buku = $coverPath;
        }
        if ($request->hasFile('bukuPdf')) {
            if ($buku->file_buku) {
                Storage::disk('public')->delete($buku->file_buku);
            }
            $Path = $request->file('bukuPdf')->store('buku_pdf', 'public');
            $buku->file_buku = $Path;
        }

        $buku->save();

        return redirect()->back()->with('success', 'Data buku berhasil diubah');
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
