<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                
                @section('content')
    
    <div class=" w-screen px-8 py-8 md:py-8 ">
    <p class="text-[34px]" >Sales Report</p>
    <table class="table-auto border-collapse border-separate border-spacing-4 border border-slate-400">
        <thead>
            <tr>
                <th class="border border-slate-300">Today's Sales</th>
                <th class="border border-slate-300">Yesterday's Sales</th>
                <th class="border border-slate-300">This Month's Sales</th>
                <th class="border border-slate-300">Last Month's Sales</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td class="border border-slate-300">${{ $salesToday }}</td>
                    <td class="border border-slate-300">${{ $salesYesterday }}</td>
                    <td class="border border-slate-300">${{ $salesThisMonth }}</td>
                    <td class="border border-slate-300">${{ $salesLastMonth }}</td>
                </tr>
        </tbody>
    </table>
    </div>

    <div class="mx-15 px-8 flex flex-col space-x-4">
        <p class="text-[34px]" >Add Product</p>


        <form class="mx-15 px-8 space-x-4" method="post" action="{{ route('store.product') }}">
    @csrf

    <label for="name">Product Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="price">Product Price:</label>
    <input type="number"  id="price" name="price" required>

    <label for="quantity">Product Quantity:</label>
    <input type="number" id="quantity" name="quantity" required>

    <button class="outline px-2 py-2 outline-offset-2 outline-4 bg-sky-500/100 font-bold" type="submit">Add Product</button>
</form>
        </div>
                @endsection

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
