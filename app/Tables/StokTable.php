<?php

namespace App\Tables;

use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;

class StokTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        if (Auth::user()->role == 'admin') {
            return Stok::query();
        }
        if (Auth::user()->role == 'staf') {
            return Stok::query()
                        ->where('total','>',0)
                        ->get();
        }
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        if (Auth::user()->role == 'admin') {
            $table
                ->withGlobalSearch(columns: ['inventaris.name'])
                // ->column('id', sortable: true)
                ->column('inventaris.name')
                ->column('total', label:"Stok")
                ->column('in', label:"entered")
                ->column('out', label:"released")
                ->column('min', label:"minimum")
                ->column('actions')
                ->paginate(5);
        }
        if (Auth::user()->role == 'staf') {
            $table
                ->withGlobalSearch(columns: ['inventaris.name'])
                // ->column('id', sortable: true)
                ->column('inventaris.name')
                ->column('total', label:"Stok")
                // ->column('in', label:"entered")
                // ->column('out', label:"released")
                ->column('min', label:"minimum");
                // ->column('actions')
                // ->paginate(5);
        }
    }
}
