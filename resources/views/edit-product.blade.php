

@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>

    <form method="post" action="{{ route('update.product', ['id' => $product->id]) }}">
        @csrf
        <label for="price">Product Price:</label>
        <input type="number" step="0.01" id="price" name="price" value="{{ $product->price }}" required>

        <label for="quantity">Product Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="{{ $product->quantity }}" required>

        <button type="submit">Update Product</button>
    </form>
@endsection

<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
</div>
