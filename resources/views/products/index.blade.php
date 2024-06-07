<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto p-6 bg-gray-200 rounded-lg shadow-lg">
                    <h1 class="text-2xl font-bold mb-6">Products</h1>
                    <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add Product</a>
                    <div class="mb-4 flex">
                        <input type="text" id="searchInput" placeholder="Search by name" class="bg-white shadow-md rounded-lg py-2 px-4 mr-2">
                        <select id="priceFilter" class="bg-white shadow-md rounded-lg py-2 px-4 mr-2">
                            <option value="">Filter by price</option>
                            <option value="low-high">Low to High</option>
                            <option value="high-low">High to Low</option>
                        </select>
                        <select id="quantityFilter" class="bg-white shadow-md rounded-lg py-2 px-4">
                            <option value="">Filter by quantity</option>
                            <option value="in-stock">In Stock</option>
                            <option value="out-of-stock">Out of Stock</option>
                        </select>
                    </div>
                    <div class="overflow-x-auto">
                        <table id="productsTable" class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                            <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-2 px-4">Name</th>
                                <th class="py-2 px-4">Description</th>
                                <th class="py-2 px-4">Price</th>
                                <th class="py-2 px-4">Quantity</th>
                                <th class="py-2 px-4">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr class="border-b">
                                    <td class="py-2 px-4">{{ $product->name }}</td>
                                    <td class="py-2 px-4">{{ $product->description }}</td>
                                    <td class="py-2 px-4">{{ $product->price }}</td>
                                    <td class="py-2 px-4">{{ $product->quantity }}</td>
                                    <td class="py-2 px-4 flex space-x-2">
                                        <a href="{{ route('products.show', $product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Show</a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const priceFilter = document.getElementById('priceFilter');
            const quantityFilter = document.getElementById('quantityFilter');
            const productsTable = document.getElementById('productsTable');
            const rows = productsTable.querySelectorAll('tbody tr');

            const filterTable = () => {
                const searchTerm = searchInput.value.toLowerCase();
                const priceValue = priceFilter.value;
                const quantityValue = quantityFilter.value;

                rows.forEach(row => {
                    const name = row.cells[0].textContent.toLowerCase();
                    const price = parseFloat(row.cells[2].textContent);
                    const quantity = parseInt(row.cells[3].textContent);

                    let isVisible = true;

                    if (searchTerm && !name.includes(searchTerm)) {
                        isVisible = false;
                    }

                    if (priceValue === 'low-high' && price > 100) {  // Example threshold
                        isVisible = false;
                    } else if (priceValue === 'high-low' && price < 100) {  // Example threshold
                        isVisible = false;
                    }

                    if (quantityValue === 'in-stock' && quantity === 0) {
                        isVisible = false;
                    } else if (quantityValue === 'out-of-stock' && quantity > 0) {
                        isVisible = false;
                    }

                    row.style.display = isVisible ? '' : 'none';
                });
            };

            searchInput.addEventListener('input', filterTable);
            priceFilter.addEventListener('change', filterTable);
            quantityFilter.addEventListener('change', filterTable);
        });
    </script>
</x-app-layout>
