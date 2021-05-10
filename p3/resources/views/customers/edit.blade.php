@extends('layouts.app')
@section('content')
    
<h1>Product Edit</h1> 
<div class="product-container">  
    <form method="post" action="/customers/{{$customer->id}}">
    {{ csrf_field() }}
    {{ method_field('PUT') }} 
    <div class="form-field-container">
            <label>Customer Name</label>
            <input type="text" name="customer_name" value="{{ old('customer_name') ?? $customer->customer_name }}">
            @if($errors->get('customer_name'))
                <div class='error'>{{ $errors->first('customer_name') }}</div>
            @endif
        </div>
        <div class="form-field-container">
            <label>Customer Address</label>
            <input type="text" name="address" value="{{ old('address') ?? $customer->address }}">
            @if($errors->get('address'))
                <div class='error'>{{ $errors->first('address') }}</div>
            @endif
        </div>
        <div class="form-field-container">
            <label>Phone #</label>
            <input type="text" name="phone_no" value="{{ old('phone_no') ?? $customer->phone_no }}">
            @if($errors->get('phone_no'))
                <div class='error'>{{ $errors->first('phone_no') }}</div>
            @endif
        </div>
        <div>
            
            <input type="submit" name="btnSubmit" value="Update">
            
        </div>
    </form>
    
</div>
<a class="back" href="/customers">Back</a>
@endsection