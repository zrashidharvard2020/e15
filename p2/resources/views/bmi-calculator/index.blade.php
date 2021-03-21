<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <style>
        .bmi-container{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 10%;
            font-size: 20px;
        }
        .bmi-row{
            display: flex;
            justify-content: center;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="bmi-container">
    
        @if(isset($bmi))
            <div>Your BMI is : {{$bmi}}
        @endif
        <form method="post" action="/bmi/calculate">
        {{ csrf_field() }}
        @php
        //dd($errors);
        @endphp
            <div class="bmi-row">
                <label >Units:</label>
                <div>
                    <label ><input type="radio" name="selectedUnitType" value="imperial" checked="">U.S. (Imperial)</label>
                    <label ><input type="radio" name="selectedUnitType" value="metric">Metric</label>
                </div>
            </div>
            <div class="bmi-row" data-testid="height-row" >
                <label for="heightFeet" class="css-1mhag1r">Height:</label>
                <div >
                    <div >Feet</div>
                    <input type="number" placeholder="Feet" step="1" inputmode="numeric"  name="heightFeet" aria-label="Feet" value="{{old('heightFeet')}}">
                    @if($errors->get('heightFeet'))
                        <div class='error'>{{ $errors->first('heightFeet') }}</div>
                    @endif
                </div>
                <div >
                    <div >Inches</div>
                    <input type="number" placeholder="Inches" step="1" inputmode="numeric" name="heightIn" aria-label="Inches" value="{{old('heightIn')}}">
                    @if($errors->get('heightIn'))
                        <div class='error'>{{ $errors->first('heightIn') }}</div>
                    @endif
                </div>                   
            </div>
            <div class="bmi-row" data-testid="weight-row" >
                <label for="weight" class="css-1mhag1r">Weight:</label>
                <div >
                    <div>
                        <div >Pounds</div>
                        <input type="number" placeholder="Pounds" step="1" inputmode="numeric" name="weightLb" value="{{old('weightLb')}}">
                        @if($errors->get('weightLb'))
                            <div class='error'>{{ $errors->first('weightLb') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bmi-row" >
                <button type="submit">CALCULATE</button>
            </div>
        </form>
    </div>
    
</body>
</html>