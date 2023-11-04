<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function show()
    {
        $nama = "Putri Indah";
        $umur = 21;
        $alamat = "Banyuwangi";
        $kelas = "FSWD";

        return view('biodata', compact('nama', 'umur', 'alamat', 'kelas',));
    }
}
