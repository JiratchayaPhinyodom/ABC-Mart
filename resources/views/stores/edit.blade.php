<!-- resources/views/stores/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Edit Store') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                    <form method="POST" action="{{ route('stores.update', $store->storeID) }}">
                        @csrf
                        @method('PUT')

                        <!-- Store Name -->
                        <div class="mb-4">
                            <label for="storeName" class="block text-white font-bold mb-2">Store Name</label>
                            <input type="text" id="storeName" name="storeName" value="{{ $store->storeName }}" class="form-input w-full">
                        </div>

                        <!-- Other fields (if any) -->
                        <!-- Example: -->
                        <!-- <div class="mb-4">
                            <label for="quantity" class="block text-white font-bold mb-2">Quantity</label>
                            <input type="text" id="quantity" name="quantity" value="{{ $store->quantity }}" class="form-input w-full">
                        </div> -->

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
