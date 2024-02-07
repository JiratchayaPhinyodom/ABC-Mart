<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Store;

class ItemsController extends Controller
{

    /**
     * Show the form for creating a new item.
     *
     * @return \Illuminate\View\View
     */
    public function create($storeId)
    {
        return view('items.create', compact('storeId'));
    }

    /**
     * Store a newly created item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $storeId)
    {
        $request->validate([
            'itemName' => 'required|string|max:255',
            'itemPrice' => 'required|numeric',
            'itemDescription' => 'nullable|string',
            'itemQuantity' => 'required|integer|min:0',
        ]);
    
        // Assign the storeID to the item
        $requestData = $request->all();
        $requestData['storeID'] = $storeId;
    
        // Create the item
        Items::create($requestData);
    
        return redirect()->route('stores.index')->with('success', 'Item created successfully.');
    }
    


    /**
     * Display the specified item.
     *
     * @param  \App\Models\Items  $item
     * @return \Illuminate\View\View
     */
    public function show(Items $item)
    {
        return view('items.show', compact('items'));
    }

    /**
     * Show the form for editing the specified item.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\View\View
     */
    public function edit($storeId, $itemId)
    {
        $item = Items::findOrFail($itemId);
        return view('items.edit', compact('item', 'storeId'));
    }
    

    /**
     * Update the specified item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $storeId, $itemId)
    {
        $request->validate([
            'itemName' => 'required|string|max:255',
            'itemPrice' => 'required|numeric',
            'itemDescription' => 'nullable|string',
            'itemQuantity' => 'required|integer|min:0',
        ]);
    
        $item = Items::where('storeID', $storeId)->findOrFail($itemId);
        $item->update($request->all());
    
        return redirect()->route('stores.index')->with('success', 'Item updated successfully.');
    }
    
    /**
     * Remove the specified item from storage.
     *
     * @param  \App\Models\Items  $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Items $item)
    {
        $item->delete();

        return redirect()->route('stores.index')->with('success', 'Item deleted successfully.');
    }
}
