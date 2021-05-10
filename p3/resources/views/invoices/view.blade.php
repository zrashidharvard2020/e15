@extends('layouts.app')
@section('content')
    
<h1>Invoice View</h1> 
<div class="product-container">
      
     
        <div class="form-field-container">
            <label>Invoice #:</label> <div>{{$invoice->id}}</div><div></div>
            
        </div>
        <div class="form-field-container">
            <label>Customer Name:</label> <div>{{$invoice->customer->customer_name}}</div><div></div>
            
        </div>
        <div class="form-field-container">
            <label>Invoice Date:</label><div>{{$invoice->invoice_date}}</div><div></div>
        </div>
        <div class="form-field-container">
            <label>Invoice Amount:</label><div>{{$invoice->invoice_amount}}</div><div></div>
            
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
                        <td>{{$item->product['product_name']}}<td>
                        <td>{{$item['unit_price']}}<td>
                        <td>{{$item['quantity']}}<td>
                        <td>{{($item['unit_price']*$item['quantity'])}}<td>
                        
                    </tr>
                @endforeach
                </table>
            @endif
        </div>       
    
</div>
<a class="back" href="/invoices">Back</a>
<script type="application/javascript">
    var products = {!! json_encode($products) !!};
    var mode = 'edit';
</script>
<script type="application/javascript" src = "/js/jquery-3.5.1.min.js"></script>
<script type="application/javascript" src = "/js/additems.js"></script>
@endsection