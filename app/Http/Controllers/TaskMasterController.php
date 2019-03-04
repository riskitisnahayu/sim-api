<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskMaster;
use App\SubjectsCategory;
use App\LogActivity;
use Auth;

class TaskMasterController extends Controller
{

    public function getTaskMaster() // fungsinya sama spt index untuk menampilkan semua data tp dalam bentuk json
    {
        LogActivity::create([
            'user_id' => Auth::user()->id,
            'fitur'   => 'Bank Soal'
        ]);

        $task_masters = TaskMaster::all(); // untuk mengambil semua data games
        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $task_masters
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
        $task_masters = new TaskMaster();
        $task_masters->title=$request->title;
        $task_masters->class=$request->class;
        $task_masters->semester=$request->semester;
        $task_masters->subjectscategories_id=$request->subjectscategories_id;
        $task_masters->total_task=$request->total_task;
        $task_masters->save();

        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $task_masters
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
        $task_masters = TaskMaster::find($id);
           // dd($ebooks);
        $subjectscategories = SubjectsCategory::all();

        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $task_masters
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
        $task_masters = TaskMaster::find($id);
        $subjectscategories = SubjectsCategory::all();
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
        $task_masters = TaskMaster::where('id',$id)->first();
        $task_masters->title=$request->title;
        $task_masters->class=$request->class;
        $task_masters->semester=$request->semester;
        $task_masters->subjectscategories_id=$request->subjectscategories_id;

        $task_masters->save();

        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $task_masters
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
        $task_masters = TaskMaster::where('id',$id)->first();
        $task_masters->delete();

        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $task_masters
        ]);
    }
}
