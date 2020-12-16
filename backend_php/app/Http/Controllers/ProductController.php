<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        try {
            $body = $request->validate([
                'name' => 'required|string',
                'price' => 'required',
                'description' => 'required|string',
                'img' => 'required|image',
                'category_id'=>'required'
            ]);
            $imageName = time() . '-' . request()->img->getClientOriginalName();
            request()->img->move('images/products', $imageName);
            $body['image'] = $imageName;
            $product = Product::create($body);
        } catch (\Exception $e) {
            return response($e,400);
        }
        return response($product);
    }

    public function uploadImage(Request $request, $id)
    {
        try {
            $request->validate(['img' => 'required|image']);
            $product = Product::find($id);
            $imageName = time() . '-' . request()->img->getClientOriginalName();
            request()->img->move('images/products', $imageName);
            $product->update(['image' => $imageName]);
            return response($product);
        } catch (\Exception $e) {
            return response(['message' => 'There was a fail trying to upload the image.',], 400);
        }
    }

    public function destroy(int $id)
    {
        try {
            $deleted = Product::whereId($id)->delete();
            if ($deleted)
                return response()->json(['message' => 'Product deleted succesfully.'], 200);
            else
                return response()->json(['message' => 'Nothing to delete.'], 200);
            } catch (\Exception $e) {
                return response()->json($e, 400);
            }
    }

    public function indexAll()
    {
        $products = Product::with('category')->get();
        return response($products);
    }

    public function getById($id)
    {
        $product = Product::with('category')->find($id);
        return response($product);
    }

    public function getByName($name)
    {
        $product = Product::with('category')->find($name);
        return response($product);
    }
}
