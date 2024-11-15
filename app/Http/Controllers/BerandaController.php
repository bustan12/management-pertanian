<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanaman;

class BerandaController extends Controller
{
    //

    public function index()
    {
        $tanaman = Tanaman::all();
        return view('welcome', compact('tanaman'));
    }

    public function detail()
    {
        $tanaman = Tanaman::all();
        return view('detail', compact('tanaman'));
    }
}
