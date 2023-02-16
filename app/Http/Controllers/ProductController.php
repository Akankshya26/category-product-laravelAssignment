<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //product view page
    public function viewProduct()
    {
        $category = Category::get();
        $product = Product::all();
        return view('product.index', ['product' => $product, 'category' => $category]);
    }
    //Store product
    public function createProduct(Request $request)
    {
        $request->validate(
            [
                'name'    => 'required',
                'price' => 'required',
            ]
        );
        $product = new Product;
        $product->category_id = $request->category_name;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        return redirect('view-product')->with('success', 'The product has been Added successfully');
    }
    //edit product
    public function edit($id)
    {
        $category = Category::get();
        $product = Product::findOrFail($id);
        return view('product.edit', ['product' => $product, 'category' => $category]);
    }
    //product updation
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'  => 'required',
                'price' => 'required',
                'description' => 'required',

            ]
        );
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category_name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        return redirect('view-product')->with('success', 'The product has been Updated successfully');
    }
    //product deletion
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('view-product')->with('success', 'The Image has been deleted successfully');
    }

    public function products($category_id)
    {
        $products = Product::with('img')->get();

        $products = Product::where('category_id', $category_id)->with('cat')->get();
        // dd($category);
        if ($products) {
            return view('product.product-list', ['products' => $products]);
        } else {
            return redirect()->back();
        }
    }
    //search bar

    public function serachProduct(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->search_string . '%')
            ->orWhere('price', 'like', '%' . $request->search_string . '%')
            ->orderBy('id', 'desc');

        if ($products->count() >= 1) {
            return view('welcome', compact('products'))->render();
        } else {
            return response()->json([
                'status' => 'nothing_found',
            ]);
        }
    }

    //new arrivals
    public function newArrival()
    {
        $products = Product::latest()->take(3)->get();
        return view('product.new-arrival', ['products' => $products]);
    }
}
