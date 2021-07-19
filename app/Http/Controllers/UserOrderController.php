<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Order;
use Auth;
class UserOrderController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
    }

    public function getHistory(){
    	return view('user.orders_history');
    }

    public function getOrder(Order $order){
    	if($order->status == "0" || $order->user_id != Auth::id()):
    		return redirect('/');
    	else:
    		$data = ['order' => $order];
    		return view('user.order_details', $data);
    	endif;
    }
}
