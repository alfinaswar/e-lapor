<?php

namespace App\Http\Controllers;

use App\Models\LaporanDinas;
use App\Models\MasterStatus;
use App\Models\MasterUnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MasterUnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = MasterUnitKerja::orderBy('id', 'Desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btnEdit = '<a href="' . route('muk.edit', encrypt($row->id)) . '" class="btn btn-primary btn-sm btn-edit" title="Edit"><i class="fas fa-edit"></i></a>';
                    $btnDelete = '<a href="javascript:void(0)" data-id="' . encrypt($row->id) . '" class="btn btn-danger btn-sm btn-delete" title="Hapus"><i class="fas fa-trash-alt"></i></a>';
                    return $btnEdit . '  ' . $btnDelete;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('master.unit-kerja.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.unit-kerja.create');
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
        $data = $request->all();
        $data['UserCreate'] = auth()->user()->name;
        $data['UserId'] = auth()->user()->id;
        MasterUnitKerja::create($data);
        return redirect()->route('muk.index')->with('success', 'Berhasil Menambahkan Unit Kerja');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterUnitKerja $masterUnitKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data = MasterUnitKerja::find($id);
        // dd($data);
        return view('master.unit-kerja.edit', compact('data'));
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
        $data = MasterUnitKerja::find($id);
        $data->update($request->all());
        return redirect()->route('muk.index')->with('success', 'Berhasil Memperbarui Unit Kerja');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        // dd($id);
        $cek = LaporanDinas::where('UnitKerja', $id)->get();
        if (count($cek) <= 0) {
            $data = MasterUnitKerja::find($id);
            if ($data) {
                $data->delete();
                return response()->json(['message' => 'Unit Kerja Berhasil Dihapus'], 200);
            } else {
                return response()->json(['message' => 'Unit Kerja Tidak Ditemukan'], 404);
            }
        } else {
            return response()->json(['message' => 'Unit Kerja Sedang Digunakan'], 409);
        }
    }
}
