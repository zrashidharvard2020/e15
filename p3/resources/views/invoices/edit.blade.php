@extends('layouts.app')
@section('content')
    
<h1>Invoice Entry</h1> 
<div class="product-container">
      
    <form method="post" action="/invoices/{{$invoice->id}}">
    {{ csrf_field() }}
    {{ method_field('PUT') }} 
        <div class="form-field-container">
            <label>Customer Name</label>
            <select name="customer_id" >
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                <option value="{{$customer->id}}" {{ $invoice->customer_id == $customer->id ? "selected" : "" }}>{{$customer->customer_name}}
                @endforeach
            </select>
            @if($errors->get('customer_id'))
                <div class='error'>{{ $errors->first('customer_id') }}</div>
            @endif
        </div>
        <div class="form-field-container">
            <label>Invoice Date</label>
            <input type="date" name="invoice_date" value="{{ $invoice->invoice_date ?? old('invoice_date') }}">
            @if($errors->get('invoice_date'))
                <div class='error'>{{ $errors->first('invoice_date') }}</div>
            @endif
        </div>
        <div class="form-field-container">
            <label>Invoice Amount</label>
            <input type="text" name="invoice_amount" id="invoice_amount" value="{{ $invoice->invoice_amount ?? old('invoice_amount') }}">
            @if($errors->get('invoice_amount'))
                <div class='error'>{{ $errors->first('invoice_amount') }}</div>
            @endif
        </div>
        <div id="item-details">
            @if($invoice->items)
                <table>
                <tr class="headerRow">
                    <th>Sl#<th>
                    <th>Product Name<th>
                    <th>Unit Price<th>
                    <th>Quantity<th>
                    <th>Amount<th>
                </tr>
                @foreach($invoice->items as $index => $item)
                    <tr class="bodyRow">
                        <td class="slNo">{{($index+1)}}<td>
                        <td>
                            <select class="invoice-product" name="product_id[]">
                                <option value="">Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}" {{ $item['product_id'] == $product->id ? "selected" : "" }}>{{$product->product_name}}</option>
                                @endforeach
                            </select>
                        <td>
                        <td><input type="number" class="unit_price" step="any"  name="unit_price[]" value="{{$item['unit_price']}}"><td>
                        <td><input type="number" class="quantity" name="quantity[]" value="{{$item['quantity']}}"><td>
                        <td><input type="number" class="product_amount" step="any"  name="product_amount[]" value="{{($item['unit_price']*$item['quantity'])}}" readonly><td>
                        <td><div class="deleted-row custom-button">Remove</div><td>
                    </tr>
                @endforeach
                </table>
            @endif
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
    var mode = 'edit';
</script>
<script type="application/javascript" src = "/js/jquery-3.5.1.min.js"></script>
<script type="application/javascript" src = "/js/additems.js"></script>
@endsection