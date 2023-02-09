<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function viewImage()
    {
        $products = Product::all();

        // $images = Product::with('img')->get();

        return view('image.index', ['products' => $products]);
    }
    public function storeImage(Request $request)
    {
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
                // $ext = \strtolower($file->getClientOriginalExtension());
                // $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'public/images/';
                // $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_name);
                $image[] = [
                    'product_id' => $product->id,
                    'image_name' => $image_name,
                ];
            }
        }
        // Image::insert([
        //     'image' =>   implode('|', $image),
        //     'product_id' => $request->product_name,
        // ]);
        // return back();
        $product->img()->createMany($image);
        return redirect('view-image')->with('success', 'The Image has been uploaded successfully');
    }
    public function destroy($id)
    {
        Image::destroy($id);
        // return redirect('view-image');
        return redirect(url('view-image/' . $id));
    }
    public function image($id)
    {

        // dd($id);
        $image = ImageProduct::where('product_id', $id)->paginate(5);
        // dd($image);

        return view('image.view', ['image' => $image]);
    }
}
