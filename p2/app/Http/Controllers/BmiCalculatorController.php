<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BmiCalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('bmi-calculator.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    }

    /**
     * calculate BMI
     * @param  \Illuminate\Http\Request  $request
     * @return BMI value and 
     */

    public function mbiCalculate(Request $request)
    {
        $heightInFeet = $request->input('heightFeet');
        $heightInInches = $request->input('heightIn');
        $weight = $request->input('weightLb');
       
        $request->validate([
            'heightFeet' => 'required|numeric',
            'heightIn' => 'required|numeric',
            'weightLb' => 'required|numeric'
        ]);
        dd($request->all());
        $height = ($heightInFeet*12)+$heightInInches;
        $bmi = ($weight/($height*$height))*703;
             
        return view('bmi-calculator.index',[
            'bmi' => $bmi]);
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
