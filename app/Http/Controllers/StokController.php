<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Tables\StokTable;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventaries = Inventaris::get();
        $datas       = Stok::get();
        // dd($stoks);

        return view('stok.index', [
            'stok' => StokTable::class,
            'inventaries' => $inventaries,
            'datas' => $datas
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
        Stok::create([
            "inventaris_id"     => $request->inventaris_id,
            "total"             => $request->total,
            "in"                => $request->total,
            "out"               => 0,
            "min"               => $request->min
        ]);

        Toast::title('Stok`s Data Has Been Stored')->success()->autoDismiss(3);

        return to_route('stok.index');
    }

    public function enter(Stok $stok) {
        return view('stok.enter', [
            'stok'  => $stok
        ]);
    }

    public function enterstore(Request $request, Stok $stok)
    {
        $stok->update([
            'total'  => $stok->total + $request->in,
            'in'     => $stok->in + $request->in 
        ]);

        Toast::title('Stok`s Data Has Been Updated')->warning()->autoDismiss(3);

        return to_route('stok.index');
    }

    public function release(Stok $stok) {
        return view('stok.release', [
            'stok'  => $stok
        ]);
    }

    public function releasestore(Request $request, Stok $stok)
    {
        $stok->update([
            'total'  => $stok->total - $request->out,
            'out'     => $stok->out + $request->out 
        ]);

        Toast::title('Stok`s Data Has Been Updated')->warning()->autoDismiss(3);

        return to_route('stok.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        $inventaries = Inventaris::get();

        return view('stok.edit', [
            'stok' => $stok,
            'inventaries' => $inventaries,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stok $stok)
    {
        // dd($request->all());
        $stok->update([
            "inventaris_id"     => $request->inventaris_id,
            "total"             => $request->total,
            "in"                => $request->total,
            "out"               => 0,
            "min"               => $request->min
        ]);

        Toast::title('Stok`s Data Has Been Updated')->warning()->autoDismiss(3);

        return to_route('stok.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok)
    {
        $stok->delete();

        Toast::title('Stok`s Data Has Been Deleted')->danger()->autoDismiss(3);

        return to_route('stok.index');
    }
}
