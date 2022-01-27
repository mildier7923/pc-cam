<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
	public function index()
	{
		return view('dashboard.pages.products.index', ['product' => Product::get()]);
	}
	public function store(Request $request){
		$imageName = time() . '.' . $request->url->extension();
        $request->url->move(public_path('images'), $imageName);
        $products = new product($request->all());
        $products->image_url = $imageName;
        $products->save();
        return response()->json([
            'saved' => true,
            'products' => $products
        ]);
	}
	public function getProducts(){
		return response()->json(['productos'=> Product::get()]);
	}
	public function edit($id){
		$product = Product::findOrFail($id);
		return view('dashboard.pages.products.edit', compact('product'));
	}
}
