<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Tag;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


// if(!isset($_SESSION)) 
// { 
//     session_start(); 
// } 

session_start();


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::all();
		return View('tag.list_Product',['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('tag.create_Product');
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
        if ($request->file()) {
            
            $product = new Tag();
            
                $product->tag = $request->input('product_name');
                $product->price = $request->input('product_price');
                $product->description = $request->input('product_description');
                $product->content = $request->input('product_content');
                $fileName = $request->file('product_image')->getClientOriginalName();
                $filePath = $request->file('product_image')->storeAs('uploads', $fileName, 'public');
                //tham số thứ 3 là chỉ lưu trên disk 'public', tham số thứ 1:  lưu trong thư mục 'uploads' của disk 'public'
                $product->image = '/storage/app/public/' . $filePath;
                // $filepath='uploads/'+$fileName --> $profile->avatar = 'storage/uploads/tenfile --> đường dẫn hình trong thư mục public
                $product->insert([
                    'tag' =>   $product->tag,
                    'price' =>   $product->price,
                    'description' =>   $product->description,
                    'content' =>   $product->content,
                    'image' =>   $product->image,
                ]);
            Session::put('message', 'Thêm profile thành công');
            // dd($profile->avatar);
            return redirect('/tags');
        }

        
        Session::put('message', 'Thêm profile thành công');
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
        //
        $tag = Tag::find($id);
        // $user =  DB::table('users')->where('id', $id)->first();
        // $article = DB::table('articles')->where('id', $id)->first();
        return view('tag.show_Product', ['tag' => $tag]);
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
        $tag = Tag::find($id);
        return view('tag.edit_Product', ['tag' => $tag]);
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
        if ( $validated = $request->validate([
            'product_name' => 'nullable',
            'product_price' => 'nullable',
            'product_description' => 'nullable',
            'product_content' => 'nullable',
            'product_image' => 'nullable|mimes:jpg,jpeg,png,xlx,xls,pdf|max:2048',
        ])) {
            if ($request->file()) {
                $product = Tag::find($id);
                $product->tag = $request->input('product_name');
                $product->price = $request->input('product_price');
                $product->description = $request->input('product_description');
                $product->content = $request->input('product_content');
                $fileName = $request->file('product_image')->getClientOriginalName();
                $filePath = $request->file('product_image')->storeAs('uploads', $fileName, 'public');
                //tham số thứ 3 là chỉ lưu trên disk 'public', tham số thứ 1:  lưu trong thư mục 'uploads' của disk 'public'
                $product->image = '/storage/app/public/' . $filePath;
                // $filepath='uploads/'+$fileName --> $profile->avatar = 'storage/uploads/tenfile --> đường dẫn hình trong thư mục public
                $product->save();
                return back() //trả về trang trước đó
                    ->with('success', 'Profile has updated.') //lưu thông báo kèm theo để hiển thị trên view
                    ->with('success', $product->tag)
                    ->with('success', $product->price)
                    ->with('success', $product->description)
                    ->with('success', $product->content)
                    ->with('file', $fileName);
            }
            return back() //trả về trang trước đó
            ->with('fail', 'Profile has failed.'); //lưu thông báo kèm theo để hiển thị trên view
        }
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
        $product = Tag::find($id)->delete();
        return back() //trả về trang trước đó
        ->with('success',$product);
    }
}
