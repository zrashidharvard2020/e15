@extends('layouts.app')
@section('content')
    
<h1>Product Entry</h1> 
<div class="product-container">
      
    <form method="post" action="/products">
    {{ csrf_field() }} 
        <div class="form-field-container">
            <label>Product Name</label>
            <input dusk='name-input' type="text" name="product_name" value="{{ old('product_name') }}">
            @if($errors->get('product_name'))
                <div class='error'>{{ $errors->first('product_name') }}</div>
            @endif
        </div>
        <div class="form-field-container">
            <label>Unit Price</label>
            <input dusk='price-input'type="text" name="unit_price" value="{{ old('unit_price') }}">
            @if($errors->get('unit_price'))
                <div class='error'>{{ $errors->first('unit_price') }}</div>
            @endif
        </div>
        
        <div>
            
            <input dusk='save-products' type="submit" name="btnSubmit" value="save">
        </div>
    </form>
    
</div>
<a class="back" href="/products">Back</a>


@endsection