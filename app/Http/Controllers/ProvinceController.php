<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\Regency;

class ProvinceController extends Controller
{
    public function getProvince(Request $request) // fungsinya sama spt index untuk menampilkan semua data tp dalam bentuk json
    {
        if ($request->id) {
            $provinces = Province::where('id', $request->id)->get(); // untuk mengambil semua data games
        } else {
            $provinces = Province::all(); // untuk mengambil semua data games
        }

        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $provinces
        ]);
    }

    public function showProvince(Request $request) // fungsinya sama spt index untuk menampilkan semua data tp dalam bentuk json
    {
      if ($request->id) {
          $provinces = Province::where('id', $request->id)->with('regency:id,name')->get();
      } else {
          $provinces = Province::with('regency:id,name')->get();
      }

      return response()->json([
          'error' => false,
          'status' => 'success',
          'result' => $provinces
      ]);
    }
}
