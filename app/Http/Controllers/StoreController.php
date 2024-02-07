<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    /**
     * Display a listing of the stores.
     *
     * @return Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new store.
     *
     * @return Response
     */
    public function create()
    {
        return view('stores.create');
    }

    /**
     * Store a newly created store in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'storeName' => 'required|string|max:255',
        ]);

        Store::create($request->only('storeName'));

        return redirect()->route('stores.index')->with('success', 'Store created successfully.');
    }

    /**
     * Display the specified store.
     *
     * @param  Store  $store
     * @return Response
     */
    public function show(Store $store)
    {
        $items = $store->items; // Assuming you have defined the relationship in the Store model
        
        return view('stores.show', compact('store', 'items'));
    }
    
    /**
     * Show the form for editing the specified store.
     *
     * @param  Store  $store
     * @return Response
     */
    public function edit(Store $store)
    {
        return view('stores.edit', compact('store'));
    }

    /**
     * Update the specified store in storage.
     *
     * @param  Request  $request
     * @param  Store  $store
     * @return RedirectResponse
     */
    public function update(Request $request, Store $store)
    {
        $request->validate([
            'storeName' => 'required|string|max:255',
        ]);

        $store->update($request->only('storeName'));

        return redirect()->route('stores.index')->with('success', 'Store updated successfully.');
    }

    /**
     * Remove the specified store from storage.
     *
     * @param  int  $storeId
     * @return RedirectResponse
     */
    public function destroy($storeId)
    {
        $store = Store::find($storeId);

        if (!$store) {
            return redirect()->route('stores.index')->with('error', 'Store not found.');
        }

        $store->delete();

        return redirect()->route('stores.index')->with('success', 'Store deleted successfully.');
    }
}
