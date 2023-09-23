@extends('index')

@section("title", "Show Product")

@section("content")
    
    <div class="d-flex">
        <div class="p-4">
            <h1>Show Product</h1>
        </div>
        <div class="ms-auto pt-4">
            <button type="button" class="btn btn-primary" onclick="history.back()">Back</button>
        </div>
    </div>

    <div class="d-flex flex-column mt-3">
        <div class="d-flex gap-2">
            <span><b>Name: </b></span> 
            <span>{{ $product->name }}</span>
        </div>
        <div class="d-flex gap-2">
            <span><b>Price: </b></span>
            <span>RM {{ $product->price }}</span> 
        </div>
        <div class="d-flex gap-2">
            <span><b>Details: </b></span>
            <span>{{ $product->details }}</span> 
        </div>
        <div class="d-flex gap-2">
            <span><b>Publish: </b></span> 
            <span>{{ $product->publish }}</span>
        </div>
    </div>

@endsection