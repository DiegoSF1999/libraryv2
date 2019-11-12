<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Firebase\JWT\JWT;
Use App\users;
use Illuminate\Support\Facades\DB; 

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return users::all();
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
        users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $user = users::findOrFail(DB::table('users')
        ->where('email', $request->email)
        ->where('password', $request->password)

        ->select('users.*')->first()->id);

        $key = $user->password;
        $data_token = $user->email;

        $token = JWT::encode($data_token, $key);
        return $token;

    }

    public function login(Request $request)
    {
        $user = users::findOrFail(DB::table('users')
        ->where('email', $request->email)
        ->where('password', $request->password)

        ->select('users.*')->first()->id);

    
        $key = $user->password;
        $data_token = $user->email;

        $token = JWT::encode($data_token, $key);
        return $token;

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return users::findOrFail($id);
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
        $user = users::findOrFail($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return users::findOrFail($id);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        users::find($id)->delete();

        return 'deleted';
    }

  


}
