<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Edit Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                    <form method="POST" action="{{ route('items.update', ['storeId' => $storeId, 'itemId' => $item]) }}">
                        @csrf
                        @method('PUT')

                        <!-- Item Name -->
                        <div class="mb-4">
                            <label for="itemName" class="block text-white font-bold mb-2">Item Name</label>
                            <input type="text" id="itemName" name="itemName" value="{{ $item->itemName }}" class="form-input w-full">
                        </div>

                        <!-- Item Price -->
                        <div class="mb-4">
                            <label for="itemPrice" class="block text-white font-bold mb-2">Item Price</label>
                            <input type="text" id="itemPrice" name="itemPrice" value="{{ $item->itemPrice }}" class="form-input w-full">
                        </div>

                        <!-- Item Description -->
                        <div class="mb-4">
                            <label for="itemDescription" class="block text-white font-bold mb-2">Item Description</label>
                            <textarea id="itemDescription" name="itemDescription" class="form-textarea w-full">{{ $item->itemDescription }}</textarea>
                        </div>

                        <!-- Item Quantity -->
                        <div class="mb-4">
                            <label for="itemQuantity" class="block text-white font-bold mb-2">Item Quantity</label>
                            <input type="text" id="itemQuantity" name="itemQuantity" value="{{ $item->itemQuantity }}" class="form-input w-full">
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
