<?php

namespace App\Http\Controllers;

use App\Models\MasterAtasan;
use App\Models\User;
use Illuminate\Http\Request;

class MasterAtasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::get();
        return view('master.atasan.index', compact('user'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterAtasan $masterAtasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterAtasan $masterAtasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterAtasan $masterAtasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterAtasan $masterAtasan)
    {
        //
    }
}
