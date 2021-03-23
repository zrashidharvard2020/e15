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
                <select class="{{ $errors->get('heightInInches')?'error-input':'' }}" name="heightInInches" >
                    <option value="-1" >Select Inches</option>
                    <option value="0" {{ old('heightInInches')!==null && old('heightInInches')==0?"selected":"" }}>0 Inches</option>
                    <option value="1" {{ old('heightInInches')==1?"selected":"" }}>1 Inches</option>
                    <option value="2" {{ old('heightInInches')==2?"selected":"" }}>2 Inches</option>
                    <option value="3" {{ old('heightInInches')==3?"selected":"" }}>3 Inches</option>
                    <option value="4" {{ old('heightInInches')==4?"selected":"" }}>4 Inches</option>
                    <option value="5" {{ old('heightInInches')==5?"selected":"" }}>5 Inches</option>
                    <option value="6" {{ old('heightInInches')==6?"selected":"" }}>6 Inches</option>
                    <option value="7" {{ old('heightInInches')==7?"selected":"" }}>7 Inches</option>
                    <option value="8" {{ old('heightInInches')==8?"selected":"" }}>8 Inches</option>
                    <option value="9" {{ old('heightInInches')==9?"selected":"" }}>9 Inches</option>
                    <option value="10" {{ old('heightInInches')==10?"selected":"" }}>10 Inches</option>
                    <option value="11" {{ old('heightInInches')==11?"selected":"" }}>11 Inches</option>
                </select>
                
                @if($errors->get('heightInInches'))
                    <div class='error'>{{ $errors->first('heightInInches') }}</div>
                @endif
            </div>                   
        </div>
        <div class="bmi-row" data-testid="weight-row" >
            <label for="weight" class="css-1mhag1r">Weight:</label>
            <div class="input-container">
                <div >Pounds</div>
                <input type="text" class="{{ $errors->get('weightInPounds')?'error-input':'' }}" placeholder="Pounds" step="1" inputmode="numeric" name="weightInPounds" value="{{ old('weightInPounds') }}">
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