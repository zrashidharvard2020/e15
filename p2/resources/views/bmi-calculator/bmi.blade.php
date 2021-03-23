@extends('bmi-calculator.layouts')

@section('page-content')
<div class="bmi-container">    
    @if(session('bmi'))
        <div class="result">Your BMI is : {{ number_format(session('bmi'),2) }}</div>
    @endif
    <form method="post" action="/bmi/calculate">
    {{ csrf_field() }}   
        <div class="bmi-row" data-testid="height-row" >
            <label for="height" class="css-1mhag1r">Height:</label>
            <div class="input-container">
                <div >Feet</div>
                <input type="number" class="{{ $errors->get('heightInFeet')?'error-input':'' }}" placeholder="Feet" step="1" inputmode="numeric"  name="heightInFeet" aria-label="Feet" value="{{ old('heightInFeet') }}">
                @if($errors->get('heightInFeet'))
                    <div class='error'>{{ $errors->first('heightInFeet') }}</div>
                @endif
            </div>
            <div class="input-container">
                <div >Inches</div>
                <input type="number" class="{{ $errors->get('heightInInches')?'error-input':'' }}" placeholder="Inches" step="1" inputmode="numeric" name="heightInInches" aria-label="Inches" value="{{ old('heightInInches') }}">
                @if($errors->get('heightInInches'))
                    <div class='error'>{{ $errors->first('heightInInches') }}</div>
                @endif
            </div>                   
        </div>
        <div class="bmi-row" data-testid="weight-row" >
            <label for="weight" class="css-1mhag1r">Weight:</label>
            <div class="input-container">
                <div >Pounds</div>
                <input type="number" class="{{ $errors->get('weightInPounds')?'error-input':'' }}" placeholder="Pounds" step="1" inputmode="numeric" name="weightInPounds" value="{{ old('weightInPounds') }}">
                @if($errors->get('weightInPounds'))
                    <div class='error'>{{ $errors->first('weightInPounds') }}</div>
                @endif
            </div>
        </div>
        <div class="bmi-row" style="text-align:center">            
            <button type="submit">Calculate BMI</button>
        </div>
    </form>
</div>
@endsection