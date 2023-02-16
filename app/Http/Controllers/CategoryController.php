<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    //category view page
    public function viewCatagory()
    {
        $category = Category::simplePaginate(3);
        return view('category.index', ['category' => $category]);
    }
    public function createCatagory(Request $request)
    {
        //category validation
        $request->validate(
            [
                'name'    => 'required',
            ]
        );
        //create category with(request->only)
        $category = new Category;
        $category->name = $request->name;
        $uploadPath = 'uploads/category/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/category/', $filename);
            $category->image = $uploadPath . $filename;
        }
        $category->save();

        return redirect('view-category')
            ->with('success', 'The Category has been Added successfully');
    }
    //category edit form
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', ['category' => $category]);
    }
    //category updation
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'  => 'required',
                'image' => 'required',
            ]
        );
        $category       = Category::findOrFail($id);
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/category/';
            $path = 'uploads/category/' . $category->image;
            if (File::exist($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/category/', $filename);
            $category->image = $uploadPath . $filename;
        }
        $category->update();
        return redirect('view-category')
            ->with('success', 'The Category has been Updated successfully');
    }
    //destroy category
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('view-category')->with('success', 'The Image has been deleted successfully');
    }
    //listing category
    public function listCategory()
    {
        $category = Category::get();
        return view('category.list', ['category' => $category]);
    }
}
