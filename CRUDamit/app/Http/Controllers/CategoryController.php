<?php

namespace App\Http\Controllers;

use App\Models\Catgeory;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        return view('edit_category', compact('categories', 'products'))->with('sucess', 'category updated successfully.');;
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

}
