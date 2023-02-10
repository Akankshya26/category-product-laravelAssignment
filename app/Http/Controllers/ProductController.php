<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function viewProduct()
    {
        $category = Category::get();
        $product = Product::all();
        return view('product.index', ['product' => $product, 'category' => $category]);
    }
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
    public function edit($id)
    {
        $category = Category::all();
        $product = Product::findOrFail($id);
        return view('product.edit', ['product' => $product, 'category' => $category]);
    }
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
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('view-product')->with('success', 'The Image has been deleted successfully');
    }
}
