<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
session_start();

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = DB::table('users')->get();
        return View('user.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insertuser = new User();
        $insertuser->email = $request->input('user_email');   
        $insertuser->password = $request->input('user_password');
        $insertuser->name = $request->input('user_name');
        $insertuser->role_id = $request->input('user_role');
        $insertuser
            ->insert([              
                'email' =>  $insertuser->email,
                'password' =>  $insertuser->password,
                'name' =>  $insertuser->name,
                'role_id' =>  $insertuser->role_id,
                
            ]);
        return redirect('/users');
        //
        // $user = new User();
        // $user->email = $request->input('user_email');
        // $user->password = $request->input('user_password');
        // $user->name = $request->input('user_role');
        // $user->name = $request->input('user_name');   
        // $affected = DB::table('users')
        //     ->insert([
        //         'email' =>  $user->email,
        //         'password' =>  $user->password,            
        //         'role_id' => $user->role_id,   
        //         'name' => $user->name,           
        //     ]);
        //     Session::put('message','Thêm user thành công');
        // return redirect('/users');
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
        $user = DB::table('users')->find($id);
        return view('user.show_User',['user'=> $user]);
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
        DB::table('users')->where('id', $id)->delete();
        return redirect('/users');
    }
}
