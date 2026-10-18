<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BarangController extends Controller
{
    public function dashboard()
    {
        //
    }

    public function index()
    {
        $barangs = Barang::with('kategori')->latest()->paginate(10);

        return view('barang.index', compact('barangs'));
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

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::all();

        return view('barang.edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, Barang $barang)
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required|exists:kategoris,id',
            'kode_barang' => ['required', 'string', 'max:20', Rule::unique('barangs', 'kode_barang')->ignore($barang->id)],
            'nama_barang' => 'required|string|min:3|max:150',
            'spesifikasi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status' => 'required|in:Tersedia,Dipinjam,Maintenance',
        ]);

        if ($validator->fails()) {
            return redirect()->route('barang.edit', $barang)
                ->withInput()
                ->withErrors($validator);
        }

        $barang->update($request->all());

        return redirect()->route('barang.index')
            ->with('success', 'Barang "'.$barang->kode_barang.'" berhasil diperbarui.');
    }

    public function destroy()
    {
        //
    }
}
