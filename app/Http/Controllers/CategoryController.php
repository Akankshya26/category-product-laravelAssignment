<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewCatagory()
    {
        $category = Category::all();
        return view('category.index', ['category' => $category]);
    }
    public function createCatagory(Request $request)
    {
        $request->validate(
            [
                'name'    => 'required',
            ]
        );
        $category = Category::create($request->only('name'));
        return redirect('view-category')
            ->with('success', 'The Category has been Added successfully');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', ['category' => $category]);
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'  => 'required',
            ]
        );
        $category       = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect('view-category')
            ->with('success', 'The Category has been Updated successfully');
    }
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('view-category');
    }
}
