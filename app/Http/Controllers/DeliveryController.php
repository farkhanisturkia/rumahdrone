<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Delivery;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use App\Tables\DeliveryTable;
use ProtoneMedia\Splade\Facades\Toast;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventaris = Inventaris::get();
        
        return view('delivery.index', [
            'delivery'      => DeliveryTable::class,
            'inventaris'    => $inventaris
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $stok = Stok::where('inventaris_id', $request->inventaris_id)->first();
        // dd($stok);
        Delivery::create([
            'order_number' => $request->order_number,
            'date'         => $request->date,
            'inventaris_id'=> $request->inventaris_id,
            'order_total'  => $request->order_total,
            'address'      => $request->address,
            'status'       => $request->status
        ]);

        $stok->update([
            'total'        => $stok->total - $request->order_total,
            'out'           => $stok->out + $request->order_total
        ]);

        Toast::title('Delivery`s Data Has Been Stored')->success()->autoDismiss(3);

        return to_route('staf.delivery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        return view('delivery.edit', [
            'delivery' => $delivery
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delivery $delivery)
    {
        $delivery->update([
            'status'    => $request->status
        ]);

        Toast::title('Delivery`s Status Has Been Updated')->warning()->autoDismiss(3);

        return to_route('staf.delivery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        //
    }
}
