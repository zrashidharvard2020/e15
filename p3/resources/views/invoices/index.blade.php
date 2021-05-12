@extends('layouts.app')

@section('content')
<h1 dusk='invoice-heading' >Invoice List</h1> 
<div class="product-container">
    
    <a class="add-button" href="/invoices/create"> Add new invoice</a>  
    <div class="invoice-row">
        <div>Invoice Id</div>
        <div>Invoice Date</div>
        <div>Customer Name</div>
        <div>Invoice Amount</div>
        <div>Actions</div>
    </div>
    @foreach($invoices as $invoice)
    @php
        //dd($invoice->customer());
    @endphp
        <div class="invoice-row">
            <div>{{$invoice->id}}</div>
            <div>{{date('m/d/Y',strtotime($invoice->invoice_date))}}</div>
            <div>{{$invoice->customer->customer_name}}</div>
            <div>$ {{$invoice->invoice_amount}}</div>
            <div class="action-buttons">
                <a href="/invoices/{{$invoice->id}}/edit">
                    <span class="material-icons">edit</span>
                </a>
            
                <a href="/invoices/{{$invoice->id}}">
                    <span class="material-icons">visibility</span>
                </a>
                <form action="/invoices/{{$invoice->id}}" method="POST">
                    {{ csrf_field() }} 
                    {{ method_field('DELETE') }}
                    <button><span class="material-icons">delete</span></button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection