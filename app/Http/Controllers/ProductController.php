<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Product;

use Illuminate\Support\Facades\Session;
session_start();

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = DB::table('products')->get();
        return View('product.show_Product',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('product.create_Product');
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

        $product = new Product();
        $product->user_id = $request->input('profile_user_id');
        $product->full_name = $request->input('profile_full_name');
        $product->address = $request->input('profile_address');
        $product->phone = $request->input('profile_phone');
        $product->birthday = $request->input('profile_birthday');
        $product->avatar = $request->input('profile_avatar');
        // $get_image = $request->file('profile_avatar');
        // if($get_image){
        //     $get_name_image = $get_image->getClientOriginalName();
        //     $name_image = current(explode('.',$get_name_image));
        //     $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        //     $get_image->move('public/uploads/users',$new_image);
        //     $profile->avatar = $new_image;
        //     DB::table('profiles')
        //     ->insert([
        //         'user_id' =>  $profile->user_id,
        //         'full_name' =>  $profile->full_name,
        //         'address' =>  $profile->address,
        //         'phone' => $profile->phone,
        //         'birthday' =>  $profile->birthday,
        //         'avatar' => $new_image
        //     ]);    
        //     Session::put('message','Thêm profile thành công');       
        //     return redirect('/users');
        // }
        // $affected = DB::table('profiles')
        //     ->insert([
        //         'user_id' =>  $profile->user_id,
        //         'full_name' =>  $profile->full_name,
        //         'address' =>  $profile->address,
        //         'phone' => $profile->phone,
        //         'birthday' =>  $profile->birthday,
        //         'avatar' => ''
        //     ]);
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
        // $product = DB::table('products')->find($id);
        // return view('product.show_Product',['product'=> $product]);
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
        $product =  DB::table('products')->where('id', $id)->first();
        return View('product.edit_Product', ['product' => $product]);
        
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
        $product = new Product();
        $product->name_product = $request->input('product_name');
        $product->type_product = $request->input('product_type');
        $product->size_product = $request->input('product_size');
        $product->price_product = $request->input('product_price');
        // $product->avatar = $request->input('product_avatar');
        // $get_image = $request->file('profile_avatar');
        // if($get_image){
        //     $get_name_image = $get_image->getClientOriginalName();
        //     $name_image = current(explode('.',$get_name_image));
        //     $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        //     $get_image->move('public/uploads/users',$new_image);
        //     $profile->avatar = $new_image;
        //     DB::table('products')
        //     ->where('id', $id)
        //     ->update([                
        //         'product_name' =>  $product->product_name,
        //         'product_type' =>  $product->product_type,
        //         'product_size' => $product->product_size,
        //         'product_price' =>  $product->product_price,
        //         // 'avatar' => $new_image
        //     ]);    
        //     Session::put('message','Cập nhật profile thành công');       
        //     return redirect('/products');
        // }
        $affected = DB::table('products')
            ->where('id', $id)
            ->update([
                'name_product' =>  $product->name_product,
                'type_product' =>  $product->type_product,
                'size_product' => $product->size_product,
                'price_product' =>  $product->price_product,
                // 'avatar' => $profile->avatar
            ]);
            Session::put('message','Cập nhật profile thành công');      
        return redirect('/products');
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
