@extends('layouts.app')
@section('content')

<h1>Products</h1> 
<div class="product-container">  
    <a class="add-button" href="/products/create"> Add new product</a>  
    <div class="itme-row">
        <div>Product Id</div>
        <div>Product Name</div>
        <div>Unit Price</div>
        <div>Actions</div>
    </div>
    @foreach($products as $product)
        <div class="itme-row">
            <div>{{$product->id}}</div>
            <div>{{$product->product_name}}</div>
            <div>{{$product->unit_price}}</div>
            <div class="action-buttons">
                <a href="/products/{{$product->id}}/edit">
                    <span class="material-icons">edit</span>
                </a>
            
           
                <form action="/products/{{$product->id}}" method="POST">
                    {{ csrf_field() }} 
                    {{ method_field('DELETE') }}
                    <button><span class="material-icons">delete</span></button>
                </form>
            </div>
        </div>
    @endforeach
</div>

@endsection