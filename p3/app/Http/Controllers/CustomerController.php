<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
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
        $customerObject = new Customer;
        $customers = $customerObject::orderBy('id', 'asc')->get();
        return view('customers.index',['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customers.create');
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
        $name  = $request->input('customer_name');
        $address  = $request->input('address');
        $phone  = $request->input('phone_no');
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',
            'phone_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
        
        if ($validator->fails()) {           
            return redirect('/customers/create')->withInput($request->all)->withErrors($validator);
        } 
        $customerObject = new Customer;
        $customerObject->customer_name = $name;
        $customerObject->address = $address;
        $customerObject->phone_no = $phone;
        $customerObject->save();

        return redirect('/customers');
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
        $customerObject = new Customer;
        $customer = $customerObject::where('id', $id)->first();
        return view('customers.edit',['customer' => $customer]);
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
        $name  = $request->input('customer_name');
        $address  = $request->input('address');
        $phone  = $request->input('phone_no');
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',
            'phone_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
        
        if ($validator->fails()) {           
            return redirect('/customers/'.$id.'/edit')->withInput($request->all)->withErrors($validator);
        } 
        $customerObject = new Customer;
        $customer = $customerObject::find($id);
        $customer->customer_name = $name;
        $customer->address = $address;
        $customer->phone_no = $phone;
        $customer->save();

        return redirect('/customers');
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
            $customerObject = new Customer;
            $customer = $customerObject::find($id);
            $customer->delete();
            
        }catch(Exception $e){
            
        }
        return redirect('/customers');
    }
}
