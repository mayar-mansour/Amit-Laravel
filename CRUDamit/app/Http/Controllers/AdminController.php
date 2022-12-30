<?php

namespace App\Http\Controllers;

use App\Models\Catgeory;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('create_category');
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30|unique:catgeories',
        ]);

        // post create for each input ,then stored into input variable and request all
        $category = $request->all();
        //  dd($request->name);
        $category = new Catgeory();
        $category->name = $request->name;
        // dd($request->name);
        $category->save();
        return redirect('view')->with(
            'success',
            'category added successfully.',
            compact('category')
        );
    }
    public function view(Request $request)
    {
        $category = new Catgeory();
        $categories = $category->get();
        // dd( $category->get('name'));
        return view('index', compact('categories'));
    }
    public function editcategories($id)
    {
        $categories = Catgeory::find($id);
        // dd($categories->id);
        $product = Product::all();
        return view('edit_category', compact('categories', 'product'));
    }
    public function updatecategories(Request $request)
    {
        $products = Product::all();
        $categories = Catgeory::find($request->id);
        // dd($categories);
        $categories->name = $request->get('name');
        $categories->update();
        return view('index', compact('categories', 'products'));
    }
    public function destroycategories($id)
    {
        $category = Catgeory::find($id);
        $category->delete();
        return redirect('view')->with('success', 'Cat removed.'); // -> resources/views/stocks/index.blade.php
    }
    public function display($id)
    {
        // $category = new Catgeory();
        $categories = Catgeory::find($id);
        //   dd($categories);
        return view('display_category', compact('categories'));
    }
    public function indexProduct()
    {
        $categories = Catgeory::all();
        return view('create_product',compact('categories'));
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
        return redirect('product.view')->with('success','category added successfully.',compact('product','categories') );
    }
     public function viewProduct(Request $request)
    {

        $product = new Product();

        $category = new Catgeory();
        $products = $product->get();

        $categories = $category->get();
        // dd( $category->get('name'));
        return view('index_product', compact('products','category'));
    }
    
     public function destroyProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('product.index')->with('success', 'product removed.'); // -> resources/views/stocks/index.blade.php
    }
}
