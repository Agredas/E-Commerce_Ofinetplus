<?php

namespace App\Http\Controllers;
use App\Models\Category;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function store(Request $request){
        $input=$request->all();
        $rules=[
            'name'=>'required',
        ];
        $messages=[
            'name.required'=>'The name field is empty.',
        ];
        
        $validator = Validator::make($input, $rules,$messages);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }else{
                $category = Category::create($input);
                return response($category);
            }
    }

    public function indexAll(){
        return Category::all();
    }

    public function getByName($name){              
        $filter = DB::table('categories')->select('*')->where('name', '=', $name)->get();
        return $filter;
    }
}
