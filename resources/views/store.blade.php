
@extends('layouts.app')

@section('content')

    <div>
    <p class="text-[48px] text-center ">Products</p>
    </div>
    

    @if(count($products) > 0)
    
        <table class="table-auto border-collapse border-separate border-spacing-14 gap-18 columns-5 ">
            <thead>
                <tr >
                    <th class="bg-indigo-300 border border-slate-500 text-center px-4 py-4">Name</th>
                    <th class="bg-indigo-300 border border-slate-500 text-center px-4 py-4">Price</th>
                    <th class=" bg-indigo-300 border border-slate-500 text-center px-4 py-4">Quantity</th>
                    <th class=" bg-indigo-300 border border-slate-500 text-center px-4 py-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr >
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <a href="{{ route('sale.product', ['id' => $product->id]) }}" class="btn btn-success px-2 py-2 outline outline-offset-1 outline-1 bg-blue-500 md:bg-green-500 font-bold">Sale</a>
                            <a href="{{ route('edit.product', ['id' => $product->id]) }}" class="btn btn-warning px-2 py-2 outline outline-offset-1 outline-1 bg-blue-500 md:bg-yellow-500 font-bold">Edit</a>
                            <a href="{{ route('delete.product', ['id' => $product->id]) }}" class="btn btn-danger px-2 py-2 outline outline-offset-1 outline-1 bg-blue-500 md:bg-red-500 font-bold">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No products available.</p>
    @endif
@endsection

