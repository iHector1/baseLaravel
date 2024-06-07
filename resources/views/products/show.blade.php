<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <tr class="border-b">
                        <th class="bg-gray-800 text-white py-2 px-4">Name</th>
                        <td class="py-2 px-4">{{ $product->name }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="bg-gray-800 text-white py-2 px-4">Description</th>
                        <td class="py-2 px-4">{{ $product->description }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="bg-gray-800 text-white py-2 px-4">Price</th>
                        <td class="py-2 px-4">{{ $product->price }}</td>
                    </tr>
                    <tr>
                        <th class="bg-gray-800 text-white py-2 px-4">Quantity</th>
                        <td class="py-2 px-4">{{ $product->quantity }}</td>
                    </tr>
                </table>
                <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>
