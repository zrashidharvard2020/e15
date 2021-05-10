@extends('layouts.app')
@section('content')
    
<h1>Customer Entry</h1> 
<div class="product-container">
      
    <form method="post" action="/customers">
    {{ csrf_field() }} 
        <div class="form-field-container">
            <label>Customer Name</label>
            <input type="text" name="customer_name" value="{{ old('customer_name') }}">
            @if($errors->get('customer_name'))
                <div class='error'>{{ $errors->first('customer_name') }}</div>
            @endif
        </div>
        <div class="form-field-container">
            <label>Customer Address</label>
            <input type="text" name="address" value="{{ old('address') }}">
            @if($errors->get('address'))
                <div class='error'>{{ $errors->first('address') }}</div>
            @endif
        </div>
        <div class="form-field-container">
            <label>Phone #</label>
            <input type="text" name="phone_no" value="{{ old('phone_no') }}">
            @if($errors->get('phone_no'))
                <div class='error'>{{ $errors->first('phone_no') }}</div>
            @endif
        </div>
        <div>
            
            <input type="submit" name="btnSubmit" value="save">
        </div>
    </form>
    
</div>
<a class="back" href="/customer">Back</a>
@endsection