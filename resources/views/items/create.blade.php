<!-- resources/views/items/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            Create New Item
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                <form action="{{ route('items.store', ['storeId' => $storeId]) }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="itemName" class="block text-white font-bold mb-2">Item Name</label>
                            <input type="text" id="itemName" name="itemName" class="form-input w-full">
                        </div>

                        <div class="mb-4">
                            <label for="itemPrice" class="block text-white font-bold mb-2">Item Price</label>
                            <input type="number" id="itemPrice" name="itemPrice" class="form-input w-full">
                        </div>

                        <div class="mb-4">
                            <label for="itemDescription" class="block text-white font-bold mb-2">Item Description</label>
                            <textarea id="itemDescription" name="itemDescription" rows="3" class="form-textarea w-full"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="itemQuantity" class="block text-white font-bold mb-2">Item Quantity</label>
                            <textarea id="itemQuantity" name="itemQuantity" rows="3" class="form-textarea w-full"></textarea>
                        </div>

                        <!-- Add more fields for the item as needed -->

                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Item
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
