<?php

namespace App\Http\Controllers;

use App\Models\MasterStatus;
use App\Models\MasterUnitKerja;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $units = MasterUnitKerja::get();
        $status = MasterStatus::get();
        return view('home', compact('units', 'status'));
    }
}
