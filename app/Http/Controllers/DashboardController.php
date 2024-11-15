<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pestisida;
use App\Models\Pupuk;
use App\Models\Tanaman;

class DashboardController extends Controller
{
    public function index()
    {
        $dataTanaman = Tanaman::count();
        $pupuk = Pupuk::count();
        $pestisida = Pestisida::count();
        return view('admin.dashboard', compact('dataTanaman', 'pupuk', 'pestisida'));
    }
}
