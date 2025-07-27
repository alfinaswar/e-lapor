<?php

namespace App\Http\Controllers;

use App\Models\LaporanDinas;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LaporanDinasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = LaporanDinas::orderBy('id', 'Desc')->where('UserId', auth()->user()->id);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btnDelete = '<a href="javascript:void(0)" data-id="' . encrypt($row->id) . '" class="btn btn-danger btn-sm btn-delete" title="Hapus"><i class="fas fa-trash-alt"></i></a>';
                    return $btnDelete;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('laporan-dinas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laporan-dinas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanDinas $laporanDinas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanDinas $laporanDinas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaporanDinas $laporanDinas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanDinas $laporanDinas)
    {
        //
    }
}
