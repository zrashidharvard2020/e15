<?php

namespace App\Http\Controllers;
use App\Invoice;
use App\Customer;
use App\Product;
use App\InvoiceItems;
use Illuminate\Http\Request;

class InvoiceController extends Controller
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
        $invoiceObject = new Invoice;
        $invoices = $invoiceObject::orderBy('id', 'desc')->get();
        
        return view('invoices.index',['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get customer list
        $customerObject = new Customer;
        $customers = $customerObject::orderBy('customer_name', 'asc')->get();

        // get product list
        $productObject = new Product;
        $products = $productObject::orderBy('product_name', 'asc')->get();

        return view('invoices.create',['customers'=>$customers,'products'=>$products]);
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
        //
        $customerId  = $request->input('customer_id');
        $invoiceDate  = $request->input('invoice_date');
        $invoiceAmount  = $request->input('invoice_amount');
        $products = $request->input('product_id');
        $unitPrice = $request->input('unit_price');
        $productsQuantity = $request->input('quantity');
        // $validator = Validator::make($request->all(), [
        //     'customer_id' => 'required',
        //     'invoice_date' => 'required',
        //     'invoice_amount' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        // ]);
        
        // if ($validator->fails()) {           
        //     return redirect('/customers/create')->withInput($request->all)->withErrors($validator);
        // } 
        //dd(date('Y-m-d',strtotime($invoiceDate)));
        $invoiceObject = new Invoice;
        $invoiceObject->customer_id = $customerId;
        $invoiceObject->invoice_date = date('Y-m-d',strtotime($invoiceDate));
        $invoiceObject->invoice_amount = $invoiceAmount;
        if($invoiceObject->save()){
            $invoiceId = $invoiceObject->id;
            $invoiceItems = [];
            foreach($products as $index => $item){
                $invoiceItems[$index] = [
                    'invoice_id' => $invoiceId,
                    'product_id' => $item,
                    'unit_price' => $unitPrice[$index],
                    'quantity' => $productsQuantity[$index],
                ];
            }
            if(count($invoiceItems)){
                InvoiceItems::insert($invoiceItems);
            }
        }
        

        return redirect('/invoices');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get invoice
        $invoiceObject = new Invoice;
        $invoice = $invoiceObject::find($id);
        //get customer list
        $customerObject = new Customer;
        $customers = $customerObject::orderBy('customer_name', 'asc')->get();

        // get product list
        $productObject = new Product;
        $products = $productObject::orderBy('product_name', 'asc')->get();

        return view('invoices.view',['invoice' => $invoice,'customers'=>$customers,'products'=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get invoice
        $invoiceObject = new Invoice;
        $invoice = $invoiceObject::find($id);
        //get customer list
        $customerObject = new Customer;
        $customers = $customerObject::orderBy('customer_name', 'asc')->get();

        // get product list
        $productObject = new Product;
        $products = $productObject::orderBy('product_name', 'asc')->get();

        return view('invoices.edit',['invoice' => $invoice,'customers'=>$customers,'products'=>$products]);
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
        $customerId  = $request->input('customer_id');
        $invoiceDate  = $request->input('invoice_date');
        $invoiceAmount  = $request->input('invoice_amount');
        $products = $request->input('product_id');
        $unitPrice = $request->input('unit_price');
        $productsQuantity = $request->input('quantity');
        // $validator = Validator::make($request->all(), [
        //     'customer_id' => 'required',
        //     'invoice_date' => 'required',
        //     'invoice_amount' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        // ]);
        
        // if ($validator->fails()) {           
        //     return redirect('/customers/create')->withInput($request->all)->withErrors($validator);
        // } 
        //dd(date('Y-m-d',strtotime($invoiceDate)));
        $invoiceObject = new Invoice;
        $invoice = $invoiceObject::find($id);
        
        $invoice->customer_id = $customerId;
        $invoice->invoice_date = date('Y-m-d',strtotime($invoiceDate));
        $invoice->invoice_amount = $invoiceAmount;
        if($invoice->save()){
            $invoice->items()->delete();
            
            $invoiceItems = [];
            foreach($products as $index => $item){
                $invoiceItems[$index] = [
                    'invoice_id' => $id,
                    'product_id' => $item,
                    'unit_price' => $unitPrice[$index],
                    'quantity' => $productsQuantity[$index],
                ];
            }
            if(count($invoiceItems)){
                InvoiceItems::insert($invoiceItems);
            }
        }
        

        return redirect('/invoices');
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
        //
        try{
            $invoiceObject = new Invoice;
            $invoice = $invoiceObject::find($id);
            $invoice->items()->delete();
            $invoice->delete();
            
        }catch(Exception $e){
            
        }
        return redirect('/invoices');
    }
}
