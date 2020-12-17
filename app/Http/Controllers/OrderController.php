<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

use App\Models\OrderTag;

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
        // $orderQuery = Order::query();
        // $orderQuery->orderBy("created_at","desc");

        // $listOfOrder = $orderQuery->get();

        // return view("order.show_Order",["listOfOrder"=>$listOfOrder]);
        //
        // $orders = Order::orderBy('id','DESC')->get();
        // return View('order.list_Order',['orders' => $orders]);
        
        $orders = Order::orderBy('id','DESC')->get();

        return View('order.list_Order',['orders' => $orders]);
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
        $order = Order::find($id);
        //$order = Order::query()->where('id','=', $id)->first();
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


        return view('order.show_Order', ['order' => $order, 'user' => $user, 'tags' => $tag]);
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
        $order = Order::find($id);
        $order_tag = DB::table('orders')->leftJoin('order_tags', "orders.id" ,"=", "order_tags.order_id")
        ->where("orders.id","=", $id)->get();
        
        //get name, quantity, unit price of product
        $tag = DB::table('order_tags')->join('tags', 'order_tags.tag_id',"=", "tags.id")
        ->where("order_tags.order_id", "=", $id)->get();
       
        //get info user
        $user = DB::table('users')->where('id', "=", $order_tag[0]->user_id)->first();


        return view('order.edit_Order', ['order' => $order, 'user' => $user, 'tags' => $tag]);
        // return view('order.edit_Order', ['order' => $order]);
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
        // if ( $validated = $request->validate([
            
        //     'order->status' => 'nullable',
            
        // ])) {
        //     if ($request->file()) {
        //         $order = Order::find($id);
        //         $order->status = $request->input('order_status');
                
        //         $order->save();
        //         return back() //trả về trang trước đó
        //             ->with('success', 'Profile has updated.'); //lưu thông báo kèm theo để hiển thị trên view
                    
        //     }
        //     return back() //trả về trang trước đó
        //     ->with('fail', 'Profile has failed.'); //lưu thông báo kèm theo để hiển thị trên view
        // }
        // $orderInfo = $request->all(['status']);

        // $order = Order::query()->where('id','=',$id);
        // $queryResult = $order->update($orderInfo);
        // if ($queryResult){
        //     return redirect()->route('orders.show',["order"=>$id]);
        // }
        //
        $order = Order::find($id);
        $order->status = $request->input('order_status');
        $order->save();
        return back() //trả về trang trước đó
            ->with('success', 'Article has updated.');
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
        $order = DB::table('orders')->where('id','=',$id);
        $tags_order = OrderTag::query()->where('order_id','=',$id);
        if ($order){
            $order->delete();
            $tags_order->delete();
            return redirect()->route('orders.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $order
     * @param  int  $tag
     * @return \Illuminate\Http\Response
     */
    public function removeproduct($order,$tag)
    {
        $tag_order = OrderTag::query()
            ->where('order_id','=',$order)
            ->where('tag_id','=',$tag);
        if ($tag_order->delete()){
            return redirect()->route('orders.show',['order'=>$order])
            ->with('messages',"Remove Product ID:".$tag." from Cart ID:".$order);;
        }
        //
    }
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function filter(Request $request)
    {

        $order = Order::query();
        if($request->input("List_of_Status"))
        {
            $order->where('status', '=', $request->input('List_of_Status'));
        }
        
        if($request->input("dateStart") != null && $request->input('dateEnd') != null){
           $dateStart = $request->input('dateStart');
           $dateEnd = $request->input('dateEnd');
           $order->where('created_at', '>', $dateStart);
           $order->where('updated_at', '<', $dateEnd);
        }
        $order = $order->get();
       
        // Alert::success('Filter Done', 'Click ok to continue');
        return view('order.list_Order', ['orders' => $order]);
    }

}
