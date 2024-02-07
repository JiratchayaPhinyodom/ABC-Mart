<!-- resources/views/items/update.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Update Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-white mb-4">Edit Item</h3>

                    <!-- Item update form -->
                    <form action="{{ route('items.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Item Name -->
                        <div class="mb-4">
                            <label for="itemName" class="block text-white font-bold mb-2">Item Name</label>
                            <input type="text" id="itemName" name="itemName" value="{{ $item->itemName }}" class="form-input w-full" required>
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label for="itemPrice" class="block text-white font-bold mb-2">Price</label>
                            <input type="text" id="itemPrice" name="itemPrice" value="{{ $item->itemPrice }}" class="form-input w-full" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="itemDescription" class="block text-white font-bold mb-2">Description</label>
                            <textarea id="itemDescription" name="itemDescription" class="form-textarea w-full" required>{{ $item->itemDescription }}</textarea>
                        </div>

                        <!-- Quantity -->
                        <div class="mb-4">
                            <label for="itemQuantity" class="block text-white font-bold mb-2">Quantity</label>
                            <input type="number" id="itemQuantity" name="itemQuantity" value="{{ $item->itemQuantity }}" class="form-input w-full" required>
                        </div>

                        <!-- Submit button -->
                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Item
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
