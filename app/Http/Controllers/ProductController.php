<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add()
    {
        return view('admin.product.add');
    }

    public function all()
    {
        $products = product::all();
        return view('admin.product.all' , compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
           'name' => 'required' ,
           'count' => 'required|numeric|min:0',
           'price' => 'required|numeric|min:0',
           'description' => 'required'
        ]);

        product::create($data);

        //ToDO : Send Email

        return redirect(route('admin.product.all'));
    }

    public function delete(Request $request , $id)
    {
        product::where('id' , $id)->delete();
        return redirect(route('admin.product.all'));
    }
}
