@extends('layouts.app')
@section('content')
    
<h1>Product Edit</h1> 
<div class="product-container">  
    <form method="post" action="/products/{{$product->id}}">
    {{ csrf_field() }}
    {{ method_field('PUT') }} 
        <div class="form-field-container">
            <label>Product Name</label>
            <input type="text" name="product_name" value="{{ old('product_name') ??  $product->product_name}}">
            @if($errors->get('product_name'))
                <div class='error'>{{ $errors->first('product_name') }}</div>
            @endif
        </div>
        <div class="form-field-container">
            <label>Unit Price</label>
            <input type="text" name="unit_price" value="{{ old('unit_price') ?? $product->unit_price }}">
            @if($errors->get('unit_price'))
                <div class='error'>{{ $errors->first('unit_price') }}</div>
            @endif
        </div>
        <div>
            
            <input type="submit" name="btnSubmit" value="Update">
            
        </div>
    </form>
    
</div>
<a class="back" href="/products">Back</a>
@endsection