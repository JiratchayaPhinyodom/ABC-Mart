<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-white mb-4">Store Management</h3>

                    <div class="flex mb-4">
                        <a href="{{ route('stores.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create Store
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="table-auto border-collapse w-full">
                            <thead>
                                <tr>
                                    <th class="border border-white-400 px-4 py-2 text-white">ID</th>
                                    <th class="border border-white-400 px-4 py-2 text-white">Name</th>
                                    <th class="border border-white-400 px-4 py-2 text-white">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stores as $store)
                                    <tr>
                                        <td class="border border-white-400 px-4 py-2 text-white">{{ $store->storeID }}</td>
                                        <td class="border border-white-400 px-4 py-2 text-white">
                                            <a href="{{ route('stores.show', $store->storeID) }}" class="text-white hover:text-blue-700">{{ $store->storeName }}</a>
                                        </td>
                                        <td class="border border-white-400 px-4 py-2 text-white">
                                            <a href="{{ route('stores.edit', $store->storeID) }}" class="text-white hover:text-yellow-700 mr-2">Edit</a>
                                            <form action="{{ route('stores.destroy', $store->storeID) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-white hover:text-red-700">Delete</button>
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
</x-app-layout>
