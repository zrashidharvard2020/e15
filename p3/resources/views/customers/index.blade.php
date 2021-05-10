@extends('layouts.app')
@section('content')

<h1>Customers</h1> 
<div class="product-container">  
    <a class="add-button" href="/customers/create"> Add new customer</a>  
    <div class="customer-row">
        <div>Customer Id</div>
        <div>Customer Name</div>
        <div>Address</div>
        <div>Phone#</div>
        <div>Actions</div>
    </div>
    @foreach($customers as $customer)
        <div class="customer-row">
            <div>{{$customer->id}}</div>
            <div>{{$customer->customer_name}}</div>
            <div>{{$customer->address}}</div>
            <div>{{$customer->phone_no}}</div>
            <div class="action-buttons">
                <a href="/customers/{{$customer->id}}/edit">
                    <span class="material-icons">edit</span>
                </a>
            
           
                <form action="/customers/{{$customer->id}}" method="POST">
                    {{ csrf_field() }} 
                    {{ method_field('DELETE') }}
                    <button><span class="material-icons">delete</span></button>
                </form>
            </div>
        </div>
    @endforeach
</div>

@endsection