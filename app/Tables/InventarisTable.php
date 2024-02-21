<?php

namespace App\Tables;

use App\Models\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;

class InventarisTable extends AbstractTable
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
        return Inventaris::query();
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
                ->withGlobalSearch(columns: ['name'])
                ->column('id', sortable: true)
                ->column('name')
                ->column('actions')
                ->paginate(5);
        }
        if (Auth::user()->role == 'staf') {
            $table
                ->withGlobalSearch(columns: ['name'])
                ->column('name')
                ->column('stok.total', label:"Stok")
                ->column('stok.in', label:"entered")
                ->column('stok.out', label:"released")
                ->column('stok.min', label:"minimum")
                ->paginate(5);
        }
    }
}
