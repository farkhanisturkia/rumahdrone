<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use App\Tables\InventarisTable;
use ProtoneMedia\Splade\Facades\Toast;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $inventaris = Inventaris::get();
        // dd($inventaris);
        return view('inventaris.index',[
            'inventaries' => InventarisTable::class
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
        // dd($request->all());
        Inventaris::create([
            'name'  => $request->name
        ]);

        Toast::title('Inventaris`s Data Has Been Stored')->success()->autoDismiss(3);

        return to_route('inventaris.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventaris $inventaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventaris $inventaris)
    {
        return view('inventaris.edit', [
            'inventaries'    => $inventaris
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventaris $inventaris)
    {
        $inventaris->update([
            'name'  => $request->name
        ]);

        Toast::title('Inventaris`s Data Has Been Updated')->warning()->autoDismiss(3);

        return to_route('inventaris.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventaris $inventaris)
    {
        // dd($inventaris->id);
        $stok = Stok::where('inventaris_id', $inventaris->id)->first();
        
        $inventaris->delete();
        if ($stok) {
            $stok->delete();
        }

        Toast::title('Inventaris`s Data Has Been Deleted')->danger()->autoDismiss(3);

        return to_route('inventaris.index');
    }
}
