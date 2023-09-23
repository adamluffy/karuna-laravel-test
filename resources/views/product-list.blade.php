@extends('index')

@section("title", "Product List")

@section("head")
    @vite('resources/js/modal.js')
@endsection

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
                        <a type="button" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal-dialog ">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title">Confirm Delete</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <p>Are you sure u want to delete this item?</p>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" id="delete-product">Delete</button>
            </div>

          </div>

        </div>
    </div>
@endsection