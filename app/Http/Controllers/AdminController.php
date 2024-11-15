<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanaman;
use App\Models\Pupuk;
use App\Models\Pestisida;

class AdminController extends Controller
{

    //Tanaman
    public function tanamanIndex()
    {
        $dataTanaman = Tanaman::all();
        $pupuk = Pupuk::all();
        $pestisida = Pestisida::all();

        return view('admin.data-tanaman', compact('dataTanaman', 'pupuk', 'pestisida'));
    }


    //Menyimpan Data Tanaman
    public function tanamanStore(Request $request)
    {
        $request->validate([
            'nama_tanaman' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'jenis_pupuk' => 'required',
            'jenis_pestisida' => 'required',
            'cara_penanaman' => 'required',
        ]);


        $dataTanaman = new Tanaman();
        if ($request->file('image')) {
            $image_path = $request->file('image')->store('images', 'public');
            $dataTanaman->image = $image_path;
        }
        $dataTanaman->nama_tanaman = $request->input('nama_tanaman');
        $dataTanaman->deskripsi = $request->input('deskripsi');
        $dataTanaman->image = $image_path;
        $dataTanaman->jenis_pupuk = $request->input('jenis_pupuk');
        $dataTanaman->jenis_pestisida = $request->input('jenis_pestisida');
        $dataTanaman->cara_penanaman = $request->input('cara_penanaman');
        $dataTanaman->save();
        return redirect()->route('data-tanaman')->with('success', 'Data tanaman berhasil disimpan');
    }

    //Mengupdate Data Tanaman
    public function tanamanUpdate(Request $request, Tanaman $dataTanaman, $id)
    {
        $dataTanaman = Tanaman::find($id);
        $dataTanaman->update($request->all());
        return redirect()->route('data-tanaman')->with('success', 'Data tanaman berhasil diupdate');
    }
    //Menghapus Data Tanaman
    public function tanamanDelete(Tanaman $dataTanaman, $id)
    {
        $dataTanaman = Tanaman::find($id);
        $dataTanaman->delete();

        return redirect()->route('data-tanaman')->with('success', 'Data tanaman berhasil dihapus');
    }

    public function detailTanaman()
    {
        $tanaman = Tanaman::all();

        return view('admin.detail-tanaman', compact('tanaman'));
    }

    //PUPUK
    public function pupuk()
    {
        $pupuk = Pupuk::all();
        return view('admin.data-pupuk', compact('pupuk'));
    }

    //Menyimpan Data Pupuk
    public function pupukStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $pupuk = new Pupuk;
        $pupuk->name = $request->input('name');
        if ($request->file('image')) {
            $image_path = $request->file('image')->store('images', 'public');
            $pupuk->image = $image_path;
        }
        $pupuk->save();
        return redirect()->route('data-pestisida')->with('success', 'Data pupuk berhasil disimpan!');
    }

    //Menghapus Data Pupuk
    public function pupukDelete($id)
    {

        $pupuk = Pupuk::find($id);
        $pupuk->delete();

        return redirect()->route('data-pupuk')->with('success', 'Data pupuk berhasil dihapus');
    }

    //Pestisida
    public function pestisida()
    {
        $pestisida = Pestisida::all();
        return view('admin.data-pestisida', compact('pestisida'));
    }

    //Menyimpan Data pestisida
    public function pestisidaStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $pestisida = new Pestisida;
        $pestisida->name = $request->input('name');
        if ($request->file('image')) {
            $image_path = $request->file('image')->store('images', 'public');
            $pestisida->image = $image_path;
        }
        $pestisida->save();
        return redirect()->route('data-pestisida')->with('success', 'Data pestisida berhasil disimpan!');
    }

    //Menghapus Data Pestisida
    public function pestisidaDelete($id)
    {

        $pestisida = Pupuk::find($id);
        $pestisida->delete();

        return redirect()->route('data-pestisida')->with('success', 'Data pestisida berhasil dihapus');
    }
}
