<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->get();

        $kategori = Kategori::all();

        $segment = request()->segment(1);

        if ($segment === null) {
            $segment = '/album';
        }

        return view(
            'galeri',
            compact(
                'galeri',
                'segment',
                'kategori'
            )
        );
    }
}