<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function getProvince() // fungsinya sama spt index untuk menampilkan semua data tp dalam bentuk json
    {
        $districts = District::all(); // untuk mengambil semua data games
        return response()->json([
            'status' => 'success',
            'result' => $districts
        ]);
    }

}
