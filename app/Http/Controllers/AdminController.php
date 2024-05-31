<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {	
    	$data =Category::all();
    	return view('admin.category', compact('data'));
    }


    public function add_category(Request $request)
    {
    	$category = new Category;

    	$category->category_name = $request->category;

    	$category->save();

    	toastr()->timeout(5000)->closeButton()->addSuccess('Category has been uploaded.');

    	return redirect()->back();
    }


    public function delete_category($id)
    {
    	$data = Category::find($id);

    	$data->delete();

    	toastr()->timeout(5000)->closeButton()->addSuccess('Category has been deleted.');

    	return redirect()->back();
    }


    public function edit_category($id)
    {
    	$data = Category::find($id);

    	return view('admin.edit_category', compact('data'));
    }


    public function update_category(Request $request, $id)
    {
    	$data = Category::find($id);

    	$data->category_name = $request->category;

    	$data->save();

    	toastr()->timeout(5000)->closeButton()->addSuccess('Category has been updated.');

 		return redirect('/view_category');
    }

    public function add_product()
    {
        $category = Category::all();

        return view('admin.add_product', compact('category'));
    }


    public function upload_product(Request $request)
    {
        $data = new Product;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $data->description = $request->description;
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products', $imagename);

            $data->image = $imagename;
        }

        $data->save();

        toastr()->timeout(5000)->closeButton()->addSuccess('Product has been added!');

        return redirect()->back();
    }


    public function view_product()
    {   
        $product = Product::paginate(5);
        return view('admin.view_product', compact('product'));
    }


    public function edit_product($id)
    {
        $product = Product::find($id);
        $category_id = Category::find($id);
        $category = Category::all();
        return view('admin.edit_product', compact('product', 'category', 'category_id'));
    }


    public function update_product(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->description = $request->description;
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products', $imagename);

            $product->image = $imagename;
        }

        $product->save();

        toastr()->timeout(5000)->closeButton()->addSuccess('Product has been updated.');

        return redirect('view_product');
    }

    public function delete_product($id)
    {
        $product = Product::find($id);

        $image_path = public_path('products'. $product->image);

        if(is_file($image_path))
        {
            unlink($image_path);
        }

        $product->delete();

        toastr()->timeout(5000)->closeButton()->addSuccess('Product has been deleted.');

        return redirect()->back();
    }

    public function product_search(Request $request)
    {
        $search = $request->search;

        $product = Product::where('title', 'LIKE', '$'.$search.'%')->orWhere('category', 'LIKE', '$'.$search.'%')->paginate(3);

        return view('admin.view_product', compact('product'));
    }

}
