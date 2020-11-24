<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Profile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProfileController extends Controller
{
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
        
        return View('profile.create_Profile');
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
        $profile = new Profile();
        $profile->user_id = $request->input('profile_user_id');
        $profile->full_name = $request->input('profile_full_name');
        $profile->address = $request->input('profile_address');
        $profile->phone = $request->input('profile_phone');
        $profile->birthday = $request->input('profile_birthday');
        $profile->avatar = $request->input('profile_avatar');
        $get_image = $request->file('profile_avatar');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/users',$new_image);
            $profile->avatar = $new_image;
            DB::table('profiles')
            ->insert([
                'user_id' =>  $profile->user_id,
                'full_name' =>  $profile->full_name,
                'address' =>  $profile->address,
                'phone' => $profile->phone,
                'birthday' =>  $profile->birthday,
                'avatar' => $new_image
            ]);    
            Session::put('message','Thêm profile thành công');       
            return redirect('/users');
        }
        $affected = DB::table('profiles')
            ->insert([
                'user_id' =>  $profile->user_id,
                'full_name' =>  $profile->full_name,
                'address' =>  $profile->address,
                'phone' => $profile->phone,
                'birthday' =>  $profile->birthday,
                'avatar' => ''
            ]);
            Session::put('message','Thêm profile thành công');
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$profile = DB::table('profiles')->find($id);

        if($profile = DB::table('profiles')->where('user_id', $id)->first()){
            // Session::put('message','Thêm profile thành công');
            return view('profile.show_Profile', ['profile' => $profile]);
        }else if($profile = DB::table('profiles')){ 
            Session::put('message','Thêm profile thành công');
            return View('profile.create_Profile');
        }
        
    }

    public function checkAvaProfile($id){

        if($profile = DB::table('profiles')->where('user_id', $id)->first()){
            // Session::put('message','Thêm profile thành công');
            return response()->json(['payload'=>true]);
        }else{ 
            
            return response()->json(['payload'=>false]);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($profile =  DB::table('profiles')->where('user_id', $id)->first()){
            return View('profile.edit_Profile', ['profile' => $profile]);
        }else{
            return View('profile.create_Profile');
        }
        
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
        // $profile = DB::table('profiles')->find($id);
        $profile = new Profile();
        $profile->full_name = $request->input('profile_full_name');
        $profile->address = $request->input('profile_address');
        $profile->phone = $request->input('profile_phone');
        $profile->birthday = $request->input('profile_birthday');
        $profile->avatar = $request->input('profile_avatar');
        $get_image = $request->file('profile_avatar');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/users',$new_image);
            $profile->avatar = $new_image;
            DB::table('profiles')
            ->where('id', $id)
            ->update([                
                'full_name' =>  $profile->full_name,
                'address' =>  $profile->address,
                'phone' => $profile->phone,
                'birthday' =>  $profile->birthday,
                'avatar' => $new_image
            ]);    
            Session::put('message','Cập nhật profile thành công');       
            return redirect('/users');
        }
        $affected = DB::table('profiles')
            ->where('id', $id)
            ->update([
                'full_name' =>  $profile->full_name,
                'address' =>  $profile->address,
                'phone' => $profile->phone,
                'birthday' =>  $profile->birthday,
                'avatar' => $profile->avatar
            ]);
            Session::put('message','Cập nhật profile thành công');      
        return redirect('/users');
        // ->with(['message' => 'cập nhật thành công','full_name'=>$profile->full_name]);
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
        // $profile =  DB::table('profiles')->where('id', $id)->delete();
        // return redirect('/users');
    }
}
