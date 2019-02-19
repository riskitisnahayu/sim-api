<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
