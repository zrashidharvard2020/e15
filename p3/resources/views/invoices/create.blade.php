@extends('layouts.app')
@section('content')
    
<h1>Invoice Entry</h1> 
<div class="product-container">
      
    <form method="post" action="/invoices">
    {{ csrf_field() }} 
        <div class="form-field-container">
            <label>Customer Name</label>
            <select name="customer_id" >
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                <option value="{{$customer->id}}" >{{$customer->customer_name}}
                @endforeach
            </select>
            @if($errors->get('customer_id'))
                <div class='error'>{{ $errors->first('customer_id') }}</div>
            @endif
        </div>
        <div class="form-field-container">
            <label>Invoice Date</label>
            <input type="date" name="invoice_date" value="{{ old('invoice_date') }}">
            @if($errors->get('invoice_date'))
                <div class='error'>{{ $errors->first('invoice_date') }}</div>
            @endif
        </div>
        <div class="form-field-container">
            <label>Invoice Amount ($)</label>
            <input type="text" name="invoice_amount" id="invoice_amount" value="{{ old('invoice_amount') }}" readonly>
            @if($errors->get('invoice_amount'))
                <div class='error'>{{ $errors->first('invoice_amount') }}</div>
            @endif
        </div>
        <div id="item-details">
        </div>
        <div id="add-more" class="custom-button">
            Add Invoice Item
        </div>
        <div>
            
            <input type="submit" name="btnSubmit" value="save">
        </div>
    </form>
    
</div>
<a class="back" href="/invoices">Back</a>
<script type="application/javascript">
    var products = {!! json_encode($products) !!};
    var mode = 'create';
</script>
<script type="application/javascript" src = "/js/jquery-3.5.1.min.js"></script>
<script type="application/javascript" src = "/js/additems.js"></script>
@endsection