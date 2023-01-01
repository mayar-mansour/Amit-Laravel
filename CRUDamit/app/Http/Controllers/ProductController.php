<?php

namespace App\Http\Controllers;


use App\Models\Catgeory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     //////////////////////////////////////////product//////////////////////////////////////////////
    public function indexProduct()
    {
        $categories = Catgeory::all();
        return view('products.create_product',compact('categories'));
    }
    public function createProduct(Request $request)
    {
        // dd('ttt');
        $request->validate([
            'name' => 'required|max:30|unique:catgeories',
        ]);
        $product = $request->all();
        //  dd($request->name);
        $product = new Product();
        $categories = Catgeory::all();

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        // dd($request->name);
        $product->save();
        return redirect('viewProduct')->with('success','category added successfully.',compact('product','categories') );
    }
     public function viewProduct(Request $request)
    {

        $product = new Product();

        $category = new Catgeory();
        $products = $product->get();

        $categories = $category->get();
        // dd( $category->get('name'));
        return view('products.index_product', compact('products','category'));
    }

     public function destroyProduct($id)
    {
        // dd('tesst');
        $product = Product::find($id);
        $product->delete();
        return redirect('indexProduct')->with('success', 'product removed.'); // -> resources/views/stocks/index.blade.php
    }public function editProduct($id)
    {
        $productss = Product::find($id);
        // dd($categories->id);
        $categories = Catgeory::all();
        return view('products.edit_product', compact('categories', 'productss'));
    }
    public function updateProduct(Request $request)
    {
        $product = new Product();
        $products = $product->get();
        $categories = Catgeory::all();
        $productss = Product::find($request->id);
        // dd($categories);
        $productss->name = $request->get('name');
        $productss->category_id = $request->get('category_id');
        $productss->update();
        return view('products.edit_product', compact('categories', 'productss','products'))->with('sucess', 'product updated successfully.');;
    }
    public function displayProduct($id)
    {
        // $category = new Catgeory();
        $products = Product::find($id);
        //   dd($categories);
        return view('products.display_product', compact('products'));
    }

}
