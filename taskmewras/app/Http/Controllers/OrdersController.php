<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Cart;
class OrdersController extends Controller
{
    //



    function add($userId){



        //user login for any login condition we test it here in if statment
        //i just commented it for conteniue the cycle

        // if(!session['userloged in']){
        //     return response()->json(['errors' => 'you must be loged in for submit your order']);
        // }

       $cart= Cart::where('user_id', $userId)->get();

       foreach ($cart as $item) {
        $adding = Orders::create([
            'product_id' => $item->product_id,
            'user_id' => $item->user_id,
            'quantity' => $item->quantity
        ]);
    
        if ($adding) {
            $delete = Cart::where('user_id', $userId)->delete();
            return Orders::where('user_id', $userId)->get();

        } else {
            //handle error
            return response()->json(['errors' => 'somthing wrong happend ,tyr again']);
        }


       
       }

    }
}
