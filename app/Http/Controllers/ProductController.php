<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'shop_id' => ['required'],
            'category_id' => ['required', 'min:5'],
            'img_id' => ['required'],
            'prod_name' => ['required'],
            'prod_desc' => ['required'],
            'qty' => ['required', 'numeric', 'min:1', 'max:3'],
            'price' => ['required', 'numeric', 'min:1', 'max:9']
        ]);

        if (Product::where([
            'prod_name', $request->prod_name,
            'prod_desc', $request->prod_desc
        ])->exists()) {
            $result = [
                "errors" => "The product is already exist!"
            ];
            return response()->json($result, 422);
        }
        Product::create([
            'shop_id' => $request->shop_id,
            'category_id' => $request->category_id,
            'img_id' => $request->img_id,
            'prod_name' => $request->prod_name,
            'prod_desc' => $request->prod_desc,
            'qty' => $request->qty,
            'price' => $request->price,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
