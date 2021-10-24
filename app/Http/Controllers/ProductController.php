<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param integer $department_id
     * @return \Illuminate\Http\Response
     */
    public function index(int $department_id)
    {
        $department = Departments::where('id', $department_id)->first();
        $products = Product::where('department_id', $department_id)->paginate(10);
        return \view('products/index', \compact('products', 'department'));
    }

    /**
     * Display the specified resource.
     *
     * @param integer $department_id
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(int $department_id, Product $product)
    {
        $department = Departments::where('id', $department_id)->first();
        return view('products/show', compact('product', 'department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(int $department_id, Product $product)
    {
        $departments = Departments::all();
        $department = Departments::where('id', $department_id)->first();
        return view('products/edit', compact('product', 'departments', 'department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $department_id, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index', $department_id)->with('info', 'Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param integer $department_id
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $department_id, Product $product)
    {
        $product->delete();
        return redirect()->route('products.index', $department_id)->with('info', 'Product has been deleted!');
    }
}
