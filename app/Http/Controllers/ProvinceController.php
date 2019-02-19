<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function getProvince() // fungsinya sama spt index untuk menampilkan semua data tp dalam bentuk json
    {
        $provinces = Province::all(); // untuk mengambil semua data games
        return response()->json([
            'status' => 'success',
            'result' => $provinces
        ]);
    }

}
