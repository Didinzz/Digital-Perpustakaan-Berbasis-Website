<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashbord()
    {
        $totalBuku = Buku::count();
        $totalBukuUploads = Buku::where('user_id', auth()->user()->id)->count();
        $totalKategori = Kategori::all()->count();
        $totalUser = User::all()->count();
        return view('pages.index', compact('totalBuku', 'totalBukuUploads', 'totalKategori', 'totalUser'));
    }
}
