<?php

namespace App\Http\Controllers;

use App\Models\MasterStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MasterStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = MasterStatus::orderBy('id', 'Desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btnEdit = '<a href="' . route('status.edit', encrypt($row->id)) . '" class="btn btn-primary btn-sm btn-edit" title="Edit"><i class="fas fa-edit"></i></a>';
                    $btnDelete = '<a href="javascript:void(0)" data-id="' . encrypt($row->id) . '" class="btn btn-danger btn-sm btn-delete" title="Hapus"><i class="fas fa-trash-alt"></i></a>';
                    return $btnEdit . '  ' . $btnDelete;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('master.status.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Nama' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        MasterStatus::create($request->all());

        return redirect()->route('status.index')->with('success', 'Berhasil Menambahkan Status');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterStatus $masterStatus)
    {
        return view('master.status.show', compact('masterStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data = MasterStatus::find($id);
        // dd($data);
        return view('master.status.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Nama' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $id = Crypt::decrypt($id);
        $data = MasterStatus::find($id);
        $data->update($request->all());
        return redirect()->route('status.index')->with('success', 'Berhasil Memperbarui Unit Kerja');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $data = MasterStatus::find($id);
        return redirect()->route('status.index')->with('success', 'Berhasil Menghapus Status');
    }
}
