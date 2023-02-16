<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Image;
use App\Models\Product;
use App\Models\ImageProduct;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    // image view page
    public function viewImage()
    {
        $products = Product::with('img')->get();
        return view('image.index', ['products' => $products]);
    }
    //store image
    public function storeImage(Request $request)
    {
        // single image upload

        // dd($request->id);
        // $this->validate($request, [
        //     'image' => 'required|mimes:jpg,jpeg,png,pdf'
        // ]);

        // $image = $request->image;
        // $name = time() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('image'), $name);
        // $inputs['image'] = $name;
        // // $image->product_id = $request->product_name;
        // // Image::create($inputs);
        // $image = new Image;
        // $image->image =  $name;
        // $image->product_id = $request->product_name;
        // $image->save();

        // return redirect()->back()->with('success', 'Image Uploaded successfully');
        $product = Product::findOrFail($request->id);
        $image = array();
        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $image_name =  str_replace(".", "", (string)microtime(true)) . '.' . $file->getClientOriginalExtension();
                $upload_path = 'public/images/';
                $file->move($upload_path, $image_name);
                $image[] = [
                    'product_id' => $product->id,
                    'image_name' => $image_name,
                ];
            }
        }
        $product->img()->createMany($image);
        return redirect('view-image')
            ->with('success', 'The Image has been uploaded successfully');
    }
    public function destroy($id)
    {
        Image::destroy($id);
        return redirect(url('view-image/' . $id));
    }
    //view slide image of products
    public function image($id)
    {
        $product = Product::where('id', $id)->get();
        $image = ImageProduct::where('product_id', $id)->get();
        return view('image.view', ['image' => $image, 'product' => $product]);
    }
    //edit form
    public function edit($id)
    {
        $products = Product::get();
        $images = ImageProduct::where('product_id', $id)->get();
        return view('image.edit', ['products' => $products, 'images' => $images]);
    }
    //image updation
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            $image[] = [
                'product_id' => $product->id,
                'image_name' => $image_name,
            ]
        ]);
        if ($request->hasFile('image_name')) {
            $images = [];
            foreach ($data['image_name'] as $image) {
                Storage::delete($product->images);
                $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image_path =  $image->storeAs('images', $fileName, 'public');
                array_push($images, $image_path);
                $data['image_name'] = $images;
                $product->update($data);
            }
        }
        $product->update($data);
        return redirect(url('view-image'));
    }
}
