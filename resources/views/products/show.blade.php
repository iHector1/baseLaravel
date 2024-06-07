@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Product Details</h1>
        <table class="table">
            <tr>
                <th>Name</th>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>{{ $product->quantity }}</td>
            </tr>
        </table>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
