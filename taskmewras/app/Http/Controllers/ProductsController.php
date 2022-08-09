<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{


    // get all products in the same gategury
    function category($id)
    {
        //also we can use paginate(15 ,12,10 ,20 ) to limit the products 
        return Products::Where('categories_id', $id)->get();
    }

    // search by id or title of product
    function search($search)
    {

        return Products::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('id', 'LIKE', "%{$search}%")
            ->get();
    }
}
