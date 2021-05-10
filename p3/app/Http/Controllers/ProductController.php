<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productObject = new Product;
        $products = $productObject::orderBy('id', 'asc')->get();
        return view('products.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
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
        $name  = $request->input('product_name');
        $price  = $request->input('unit_price');
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'unit_price' => 'required|numeric|min:0'
        ]);
        
        if ($validator->fails()) {           
            return redirect('/products/create')->withInput($request->all)->withErrors($validator);
        } 
        $productsObject = new Product;
        $productsObject->product_name = $name;
        $productsObject->unit_price = $price;
        $productsObject->save();

        return redirect('/products');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $productsObject = new Product;
        $product = $productsObject::where('id', $id)->first();
        return view('products.edit',['product' => $product]);
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
        $name  = $request->input('product_name');
        $price  = $request->input('unit_price');
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'unit_price' => 'required|numeric|min:0'
        ]);
        
        if ($validator->fails()) {           
            return redirect('/products/'.$id.'/edit')->withInput($request->all)->withErrors($validator);
        } 
        $productsObject = new Product;
        $product = $productsObject::find($id);
        $product->product_name = $name;
        $product->unit_price = $price;
        $product->save();

        return redirect('/products');
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
        try{
            $productsObject = new Product;
            $product = $productsObject::find($id);
            $product->delete();
            
        }catch(Exception $e){
            
        }
        return redirect('/products');
    }
}
