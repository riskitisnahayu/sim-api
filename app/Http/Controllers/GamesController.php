<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class GamesController extends Controller
{
    public function getGames() // fungsinya sama spt index untuk menampilkan semua data tp dalam bentuk json
    {
        $games = Game::all(); // untuk mengambil semua data games
        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $games
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $games = new Game();
       $games->name=$request->name;
       $games->gamecategories_id=$request->gamecategories_id;
       $games->description=$request->description;
       $games->url=$request->url;

       // $image   = $request->file('image');
       // $ext     = $image->getClientOriginalExtension();
       // $newName = rand(100000,1001238912).".".$ext;
       // $image->move('images',$newName);
       // $games->image = $newName;
       $games->save();

       return response()->json([  //biar keluarannya berupa json
           'error' => false,
           'status' => 'success',
           'result' => $games
       ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $games = Game::find($id);
        return response()->json([  //biar keluarannya berupa json
            'error' => false,
            'status' => 'success',
            'result' => $games
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $games = Game::where('id',$id)->first();
        $games->name  = $request->name;
        $games->gamecategories_id = $request->gamecategories_id;
        $games->description = $request->description;
        $games->url   = $request->url;

        // if (!empty($request->file('image')))
        // {
        //     $image   = $request->file('image');
        //     $ext     = $image->getClientOriginalExtension();
        //     $newName = rand(100000,1001238912).".".$ext;
        //     $image->move('images',$newName);
        //     $games->image = $newName;
        // }
        $games->save();

        return response()->json([  //biar keluarannya berupa json
            'error' => false,
            'status' => 'success',
            'result' => $games
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $games = Game::where('id',$id)->first();
        $games->delete();

        return response()->json([  //biar keluarannya berupa json
            'error' => false,
            'status' => 'success',
            'result' => $games
        ]);
    }
}
