<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{


    function add($userId, $productId, $quantity)
    {
        //add query
        $adding = Cart::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity
        ]);

        if ($adding) {
            return Cart::where('user_id', $userId)->get();
        } else {
            //handle error
            return response()->json(['errors' => 'somthing wrong happend ,tyr again']);
        }
    }



    function update($userId, $productId, $quantity)
    {

        //update query
        $updating = Cart::where('user_id', $userId)->where('product_id', $productId)
            ->update(
                [
                    'quantity' => $quantity,
                ]
            );
        if ($updating) {
            return Cart::where('user_id', $userId)->get();
        } else {
            //handle error
            return response()->json(['errors' => 'somthing wrong happend ,tyr again']);
        }
    }





    function index($userId, $productId, $quantity)
    {

        return Cart::where('user_id', $userId)->where('product_id', $productId)->get();
    }

    function destroy($userId, $productId)
    {

        //delete query
        $delete = Cart::where('user_id', $userId)->where('product_id', $productId)->delete();

        if ($delete) {
            return Cart::where('user_id', $userId)->get();
        } else {
            //handle error
            return response()->json(['errors' => 'somthing wrong happend , tyr again']);
        }
    }
}
