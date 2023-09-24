@extends('index')

@section("title", "Add Product Form")

@section("head")
    @vite("resources/ts/product/add-product.ts")
@endsection

@section("content")

    <div class="d-flex my-3">
        <div class="p-4">
            <h1>Add Product Form</h1>
        </div>
        <div class="ms-auto p-4">
            <button class="btn btn-primary" onclick="history.back()">Back</button>
        </div>
    </div>

    <form class="needs-validation" id="add-product-form" novalidate>

      @csrf()

        <div class="my-3">
          <label for="basic-url" class="form-label">Name : </label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
          <div class="invalid-feedback">
            Please enter a product name
          </div>
        </div>

        <div class="mb-3">
          <label for="price" class="form-label">Price (RM) : </label>
          <input type="number" class="form-control" id="price" name="price" placeholder="99.90" required>
          <div class="invalid-feedback">
            Please enter a price for the product
          </div>
        </div>

        <div class="mb-3">
          <label for="details" class="form-label">Detail : </label>
          <textarea class="form-control" id="details" name="details" placeholder="detail" required></textarea>
          <div class="invalid-feedback">
            Please enter product details
          </div>
        </div>

        <label>Publish :</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="publish" id="publish-true" value="Yes" required>
          <label class="form-check-label" for="publish-true">
            Yes
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="publish" id="publish-false" value="No" required>
          <label class="form-check-label" for="publish-false" >
            No
          </label>
          <div class="invalid-feedback">
            Please select a publish status
          </div>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
