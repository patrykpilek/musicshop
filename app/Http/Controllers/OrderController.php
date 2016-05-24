<?php

namespace Musicshop\Http\Controllers;

use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Musicshop\Http\Requests;
use Musicshop\Http\Controllers\Controller;
use Musicshop\Order;
use Musicshop\OrderDetails;

class OrderController extends Controller
{
    /**
     * OrderController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $basket = Cart::content();
        return view('order.index', compact('basket', 'user'));
    }

    /**
     * @return mixed
     */
    public function saveOrder()
    {
        $user = Auth::user();
        $basket = Cart::content();

        $order = new Order();
        $data = [];

        $order->user_id = $user->id;
        $order->order_Number = rand();
        $order->accepted = false;
        $order->order_total_price = Cart::total();
        $order->save();

        foreach($basket as $item) {
            $data[] = [
                'order_id' => $order->id,
                'album_id' => $item->id,
                'quantity' => $item->qty,
                'total_price' => $item->subtotal,
                'created_at' => date( 'Y-m-d H:i:s'),
                'updated_at' => date( 'Y-m-d H:i:s'),
            ];
        }

        OrderDetails::insert($data);

        Cart::destroy();

        return redirect("/user/orders/{$user->id}" )->withSuccess('CONFIRMATION Thank you for your order.');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOderView($id)
    {
        $user = Auth::user();
        $orderDetails = DB::table('order_details')
            ->select('order_details.*', 'orders.*', 'albums.*')
            ->join('orders', 'order_details.order_id', '=' , 'orders.id')
            ->join('albums', 'order_details.album_id', '=' , 'albums.id')
            ->where('order_details.order_id', '=', $id)
            ->get();

        return view("/user/order_details", compact('user', 'orderDetails'));
    }
}
