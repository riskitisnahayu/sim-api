<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Province;

class ProvinceController extends Controller
{
    public function showProvince()
    {
      $province = Province :: all();
      return response()->json([
          'status' => 'success',
          'province' => $province
      ]);
    }
=======

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

>>>>>>> 184fa9bba2a078d9cfa96fe48fa293b50be6165a
}
