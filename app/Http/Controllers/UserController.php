<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
// use App\Orangtua;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function regisortu(Request $request){
        $this->validate($request, [
                 'name'          => 'required',
                 'username'      => 'required',
                 'email'         => 'required',
                 'password'      => 'required',

           ],

           [
                'name.required'     => 'Nama harus diisi!',
                'username.required'   => 'Username harus diisi!',
                'email.required'      => 'Email harus diisi!',
                'password.required'   => 'Password harus diisi!',
            ]

       );

        $user = User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'type'      => 'Orang tua',
        ])->orangtuas()->create([]);

        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $user
        ]);
    }

    public function regisSiswa(Request $request){
        $this->validate($request, [
                 'name'          => 'required',
                 'jenis_kelamin' => 'required',
                 'username'      => 'required',
                 'email'         => 'required',
                 'password'      => 'required',
                 'orangtua_id'   => 'required',
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
                'password.required'      => 'Password harus diisi!',
                'orangtua_id.required'   => 'Id orangtua harus diisi!',
                'province_id.required'   => 'Provinsi harus diisi!',
                'regency_id.required'    => 'Kota/kabupaten harus diisi!',
                'district_id.required'   => 'Kecamatan harus diisi!',
                'school_name.required'   => 'Sekolah harus diisi!quired',
                'class.required'         => 'Kelas harus diisi!',
            ]

       );

        $user = User::create([
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'type'          => 'Siswa',
        ])->students()->create([
            'jenis_kelamin' => $request->jenis_kelamin,
            'orangtua_id'   => $request->orangtua_id,
            'province_id'   => $request->province_id,
            'regency_id'    => $request->regency_id,
            'district_id'   => $request->district_id,
            'school_name'   => $request->school_name,
            'class'         => $request->class,
        ]);

        return response()->json([
            'error' => false,
            'status' => 'success',
            'result' => $user
        ]);
    }

    public function login(Request $request){
      if(Auth::attempt([
          'username' => request('username'),
          'password' => request('password')
      ])){
          $user = Auth::user();
          $username = $request->get('username');
          $password = $request->get('password');
          $success['token'] =  $user->createToken('MyApp')-> accessToken;
          $success['username'] = $username;
          $success['password'] = $password;

          $pengguna = User::where('username', $success['username'])->first();
          $pengguna->token = $success['token'];
          // dd($pengguna);
          return response()->json([
              // 'error'=>false,
              'status'=>'success',
              // 'token' => $success['token'],
              'user' => $pengguna
          ]);
      }
      else{
          $success['status'] = 'failed';
          $success['error'] = 'Unauthorised';
          $success['message'] = 'Your username or password incorrect!';
          return response()->json([$success],401);
      }
  }

    public function logout(Request $request){
      $request->user()->token()->revoke();
      return response()->json([
        'message' => 'Successfully logged out'
      ]);
    }


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
