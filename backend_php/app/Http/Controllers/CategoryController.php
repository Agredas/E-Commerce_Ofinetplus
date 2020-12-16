<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function indexAll(){
        $categories = Category::with('products')->get();
        return response($categories);
    }

    public function store(Request $request){
        $body = $request->all();
        $category = Category::create($body);
        return response($category);
    }

    public function getByName($name){              
        $category = Category::with('products')->find($name);                             
        return $category;
    }
}
