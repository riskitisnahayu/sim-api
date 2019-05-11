<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\LogActivity;
use App\TaskMaster;

class StudentController extends Controller
{
    public function getSiswa(Request $request) // fungsinya sama spt index untuk menampilkan semua data tp dalam bentuk json
    {
        $user = User::where('id',$request->id)
               ->with('student')
               ->first();

        return response()->json([
            // 'user_id' => Auth::user()->id,
            'error' => false,
            'status' => 'success',
            'result' => $user
        ]);
    }

    public function api_detailProfil(Request $request)
    {
        $user = User::where('id',$request->id)
            ->with('student')->first();
        return response()->json([
            'error'  => false,
            'status' => 'success',
            'result' => $user
        ]);
    }

    public function updateAnak(Request $request, $id)
    {
      $this->validate($request, [
        'name'          => 'required',
        'jenis_kelamin' => 'required',
        'username'      => 'required',
        'email'         => 'required',
        // 'password'      => 'required',
        'province_id'   => 'required',
        'regency_id'    => 'required',
        'district_id'   => 'required',
        'school_name'   => 'required',
        'class'         => 'required',
      ],

      [
       'name.required'          => 'Nama harus diisi!',
       'jenis_kelamin.required' => 'Jenis kelamin harus diisi!',
       'username.required'      => 'Username harus diisi!',
       'email.required'         => 'Email harus diisi!',
       // 'password.required'      => 'Password harus diisi!',
       'province_id.required'   => 'Provinsi harus diisi!',
       'regency_id.required'    => 'Kota/kabupaten harus diisi!',
       'district_id.required'   => 'Kecamatan harus diisi!',
       'school_name.required'   => 'Sekolah harus diisi!quired',
       'class.required'         => 'Kelas harus diisi!',
      ]);

      $siswa = Student::where('user_id', $id)->first();
      $data = User::where('id', $siswa->user_id)->first();

      $data->name = $request->name;
      $siswa->jenis_kelamin = $request->jenis_kelamin;
      $data->username = $request->username;
      $data->email = $request->email;
      // $siswa->password = $request->password;
      $siswa->province_id = $request->province_id;
      $siswa->regency_id = $request->regency_id;
      $siswa->district_id = $request->district_id;
      $siswa->school_name = $request->school_name;
      $siswa->class = $request->class;
      $siswa->save();
      $data->save();

      return response()->json([
        'error' => false,
        'status' => 'success',
        'result' => $siswa
      ]);
    }

    //nampilin soal

    public function api_listSoal(Request $request)
    {
      // dd($request);
        $task_master = TaskMaster::where('class',$request->class)
                                  ->where('subjectscategories_id',$request->subjectscategories_id)
                                  ->get();
        return response()->json([
            'error'  => false,
            'status' => 'success',
            'result' => $task_master,
        ]);
    }

    public function api_soal(Request $request)
    {
        // dd($request);
        // $task_master = TaskMaster::find($id);
        // $tasks = TaskMaster::where('id', $id)->first()->tasks()->get();
        $task_master_id = $request->id;
        $task_master = TaskMaster::find($task_master_id);
        $tasks = TaskMaster::where('id', $task_master_id)
                               ->where('class', $request->class)
                               // ->where('semester', $request->semester)
                               ->first();
        if($tasks){
            $tasks = TaskMaster::where('id', $task_master_id)
                                   ->where('class', $request->class)
                                   // ->where('semester', $request->semester)
                                   ->first()->taskanswers()->get(); //answers karena di function model diberi nama answers
        }
        // else{
        //     return redirect()->back()->with('error','Maaf, Soal tidak tersedia.');
        // }
        $answers = [];
        // dd($tasks);
        foreach ($tasks as $key => $curr_task) {
            $answers[$key] = $curr_task->answers()->orderBy('choice', 'asc')->get();
        }
        // dd($answers);
        $choices = ['a', 'b', 'c', 'd'];
        // $taskmaster_id = $id;
       $taskmaster_id = $task_master_id;
        // dd($taskmaster_id);

        return response()->json([
            'error'  => false,
            'status' => 'success',
            'result' => $task_master,
            'soal'   => $tasks
        ]);
    }

    public function deleteAnak($id)
	{
		$user = User::where('id', $id)->first();
    	$anak = Student::where('user_id', $id)->first();
        // dd($user);
		$anak->delete();
		$user->delete();

   		return response()->json([
			'status' => 'success',
			'message' => "Akun berhasil dihapus"
        ]);
		}
}
