<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

use App\Models\Tag_Order;

use App\Models\User;

use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderQuery = Order::query();
        $orderQuery->orderBy("created_at","desc");

        $listOfOrder = $orderQuery->get();

        return view("order.show_Order",["listOfOrder"=>$listOfOrder]);
        //
        // $orders = Order::orderBy('id','DESC')->get();
		// return View('order.list_Order',['orders' => $orders]);
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
        // $order = Order::query()->where('id','=', $id)->first();
        // return view('order.show_Order', ['order' => $order]);

        // $order = Order::query()->where('id','=',$id)->first();
        // $listOfProduct = DB::table("order_tags")
        //     ->join("tags","tags.id","=","order_tags","order_tags.tag_id")
        //     ->where("order_tags.order_id",'=',$order->id)->get();
        // $orderDetail = ["order"=>$order,'listOfProduct'=>$listOfProduct];
        // return view("order.show_Order",["orderDetail"=>$orderDetail]);

        $order_tag = DB::table('orders')->leftJoin('order_tags', "orders.id" ,"=", "order_tags.order_id")
        ->where("orders.id","=", $id)->get();
        
        //get name, quantity, unit price of product
        $tag = DB::table('order_tags')->join('tags', 'order_tags.tag_id',"=", "tags.id")
        ->where("order_tags.order_id", "=", $id)->get();
       
        //get info user
        $user = DB::table('users')->where('id', "=", $order_tag[0]->user_id)->first();


        return view('order.show_Order', ['order_tags' => $order_tag, 'users' => $user, 'tags' => $tag]);
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
