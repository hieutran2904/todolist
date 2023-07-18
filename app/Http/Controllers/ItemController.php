<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Item::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->name = $request->item['name'];
        $newItem->save();
        return $newItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $existringItem = Item::find($id);
        if ($existringItem) {
            $existringItem->completed = $request->item['completed'] ? true : false;
            $existringItem->completed_at =  Carbon::now('Asia/Ho_Chi_Minh');
            $existringItem->save();
            return $existringItem;
        }
        return "Item not found";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $existringItem = Item::find($id);
        if ($existringItem){    
            $existringItem->delete();
            return "Item successfully deleted.";
        }
        return "Item not found.";
    }
}
