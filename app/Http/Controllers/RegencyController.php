<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegencyController extends Controller
{
    public function getRegency() // fungsinya sama spt index untuk menampilkan semua data tp dalam bentuk json
    {
        $regencies = Regency::all(); // untuk mengambil semua data games
        return response()->json([
            'status' => 'success',
            'result' => $regencies
        ]);
    }
}
