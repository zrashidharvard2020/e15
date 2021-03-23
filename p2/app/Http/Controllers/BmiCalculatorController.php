<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return redirect("/bmi");
    }

    public function bmiHome()
    {
        return view('bmi-calculator.bmi');
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

    public function bmiCalculate(Request $request)
    {
        $heightInFeet = $request->input('heightInFeet');
        $heightInInches = $request->input('heightInInches');
        $weight = $request->input('weightInPounds');
       
        // $validator = $request->validate([
            
        // ]);
        $validator = Validator::make($request->all(), [
            'heightInFeet' => 'required|numeric|min:2|max:8',
            'heightInInches' => 'required|numeric|min:0|max:11',
            'weightInPounds' => 'required|numeric|min:3|max:500'
        ]);
        
        if ($validator->fails()) {           
            return redirect('/bmi')->withInput($request->all)->withErrors($validator);
        } 
        
        $height = ($heightInFeet*12)+$heightInInches;
        $bmi = ($weight/($height*$height))*703;
        
		
        return redirect('/bmi')->with('bmi',$bmi);
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
