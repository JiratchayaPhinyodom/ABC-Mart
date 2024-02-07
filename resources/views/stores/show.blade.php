<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ $store->storeName }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-white mb-4">Items in {{ $store->storeName }}</h3>

                    <!-- Display existing items in a table -->
                    @if ($store->items->isNotEmpty())
                        <div class="overflow-x-auto">
                            <table class="table-auto border-collapse w-full">
                                <thead>
                                    <tr>
                                        <th class="border border-white-400 px-4 py-2 text-white">ID</th>
                                        <th class="border border-white-400 px-4 py-2 text-white">Name</th>
                                        <th class="border border-white-400 px-4 py-2 text-white">Description</th>
                                        <th class="border border-white-400 px-4 py-2 text-white">Price</th>
                                        <th class="border border-white-400 px-4 py-2 text-white">Quantity</th>
                                        <th class="border border-white-400 px-4 py-2 text-white">Actions</th> <!-- Added Actions column -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($store->items as $item)
                                        <tr>
                                            <td class="border border-white-400 px-4 py-2 text-white">{{ $item->itemID }}</td>
                                            <td class="border border-white-400 px-4 py-2 text-white">{{ $item->itemName }}</td>
                                            <td class="border border-white-400 px-4 py-2 text-white">{{ $item->itemDescription }}</td>
                                            <td class="border border-white-400 px-4 py-2 text-white">{{ $item->itemPrice }}</td>
                                            <td class="border border-white-400 px-4 py-2 text-white">{{ $item->itemQuantity }}</td>
                                            <td class="border border-white-400 px-4 py-2 text-white">
                                            <a href="{{ route('items.edit', ['storeId' => $store, 'itemId' => $item]) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                                <form action="{{ route('items.destroy', $item->itemID) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-white">No items found for this store.</p>
                    @endif

                    <!-- Button to navigate to items create page -->
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('items.create', ['storeId' => $store]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create New Item
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
