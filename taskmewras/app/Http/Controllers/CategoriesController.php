<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;

class CategoriesController extends Controller
{
    //


    // public function products(Categories $Categories)
    // {
    //     $Categories->load('products');

    //     return view('products')->withCategories($Categories);
    // } 




    function categories(Categories $Categories)
    {

        $Categories = Categories::get();

        $subCategury=[];
        foreach ($Categories as $value) {
            // I choose the title gategury as a key ,but we can choose id or any thing
            $subCategury[$value->title] = Products::Where('categories_id',$value->id)->get();
        };


        $data = array(
            // productsByCategory men,wpmen , kid {[pro1,pro2 ,pro3 ]}
            'productsByCategory'=> $subCategury,
            

            // categories with id and title 
            'categories'=> $Categories
        );
        return $data;
    }



    

}
