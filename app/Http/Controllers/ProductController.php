<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add()
    {
        //TODO : Create View

        return view('admin.add_product');
    }

    public function all()
    {
        //Todo Create View

        $products = product::all();

        return view('admin.all_products' , compact('products'));
    }

    public function store(Request $request)
    {
        //TODO : Validation
        //TODO : Store
        //ToDO : Send Email

        return $this->all();
    }

    public function delete(Request $request)
    {
        //TODO : Remove Product

        return $this->all();
    }
}
