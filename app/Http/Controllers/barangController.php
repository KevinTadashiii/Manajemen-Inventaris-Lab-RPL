<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function dashboard()
    {
        //
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $kategoris = Kategori::all();

        return view('barang.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required|exists:kategoris,id',
            'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang',
            'nama_barang' => 'required|string|min:3|max:150',
            'spesifikasi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status' => 'required|in:Tersedia,Dipinjam,Maintenance',
        ]);

        if ($validator->fails()) {
            return redirect()->route('barang.create')
                ->withInput()
                ->withErrors($validator);
        }

        Barang::create($request->all());

        return redirect()->route('barang.index')
            ->with('success', 'Barang "'.$request->input('kode_barang').'" successfully saved.');
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
