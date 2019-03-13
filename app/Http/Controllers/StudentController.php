<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class StudentController extends Controller
{
    public function getSiswa(Request $request) // fungsinya sama spt index untuk menampilkan semua data tp dalam bentuk json
    {
        $user = User::where('id',$request->id)
               ->with('student')
               ->first(); // untuk mengambil semua data games

        return response()->json([
            // 'user_id' => Auth::user()->id,
            'error' => false,
            'status' => 'success',
            'result' => $user
        ]);
    }
}
