@extends('index')

@section("title", "Product List")

@section("content")

    <div class="d-flex">
        <div class="p-4">
            <h1>Laravel</h1>
        </div>
        <div class="ms-auto d-flex align-items-center">
            <a type="button" class="btn btn-success" href="{{ url("product/create") }}">Create New Product</a>
        </div>
    </div>

    <div class="d-flex my-3">
        <form class="ms-auto d-flex" action="">
            <input type="text" class="form-control mx-2" placeholder="Search" name="search">
            <button type="submit" class="btn btn-secondary">Search</button>
        </form>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Price (RM)</th>
                <th>Details</th>
                <th>Publish</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->details }}</td>
                    <td>{{ $product->publish }}</td>
                    <td>
                        <a type="button" class="btn btn-info" href="{{ url("product/$product->id") }}">Show</a>
                        <a type="button" class="btn btn-primary"  href="{{ url("product/$product->id/edit") }}">Edit</a>
                        <button type="button"class="btn btn-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal"
                            data-bs-product-id="{{ $product->id }}"
                            data-bs-product-name="{{ $product->name }}"
                        >Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include("delete-modal")

    @vite('resources/ts/product/delete-product.ts')
@endsection
