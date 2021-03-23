<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <style>
        *{
            font-family: sans-serif;
            color: #4c3636;
        }
        h1{
            background: #2d409c;
            color: #fff;
            text-align: center;
            font-size: 50px;
        }
        .info-div{
            width: 50%;
            margin: auto;
        }
        .content-container {
            display: grid;
            grid-template-columns: 50% 50%;
            width: 50%;
            margin: auto;
            grid-gap: 20px;
        }
        .bmi-container{
            margin: auto;            
            max-width: 350px;           
            font-family: sans-serif;
            color: #4c3636;
            border-radius: 10px;
            background: #f5f5f5;
            padding: 10px 20px;
            box-shadow: 2px 2px #bbb8b8;
        }
        .bmi-info-div {
            max-width: 350px;
            border-radius: 10px;
            background: #f5f5f5;
            padding: 10px 20px;
            box-shadow: 2px 2px #bbb8b8;
        }
        .bmi-row{
            margin: 10px 0;
        }
        .error-input{
            border:1px solid red !important;
        }
        .error{
            color:red;
        }
        .input-container{
            padding-left:30px;
            margin-bottom: 10px;
        }
        .input-container input{
            width:  95%;
            border:1px solid #ddd;
            border-radius: 5px;
        }
        button{
            border: none;
            background: #2d409c;
            color: #fff;
            padding: 5px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .result{
            font-size: 25px;
            text-align: center;
            background: green;
            padding: 5px 10px;
            color: #fff;
        }
        
    </style>
</head>
<body>
    <header>
        <h1>BMI Calculator</h1>        
    </header>
    <div class="info-div">
        <h3>Calculate Your Body Mass Index</h3>
        <p>
            Body mass index (BMI) is a measure of body fat based on height and weight that applies to adult men and women.

            <ol>
                <li>Enter your weight and height using standard measures.</li>
                <li>Click "Calculate BMI" and your BMI will appear below.</li>
            </ol>
        </p>
    </div>
    <div class="content-container">
        <div id="content">
            @yield('page-content')
        </div>
        <div class="bmi-info-div">
            <div style="margin-top: 10px;">BMI Categories:</div>
            <ul>
                <li>Underweight =< 18.5</li>
                <li>Normal weight = 18.5–24.9</li>
                <li>Overweight = 25–29.9</li>
                <li>Obesity = BMI of 30 or greater</li>
            </ul>
        </div>
    </div>
    
</body>
</html>