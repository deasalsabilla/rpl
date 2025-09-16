<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::latest()->paginate(10); // Perbaiki variable name dari $pendaftars ke $prodis
        return view('prodi.index', compact('prodis'));
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kodeprodi' => 'required|string|max:10|unique:prodis',
            'namaprodi' => 'required|string|max:255',
            'jenjang' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        Prodi::create($request->all());
        return redirect()->route('prodis.index')->with('success', 'Program Studi berhasil ditambahkan.');
    }

    public function show(Prodi $prodi)
    {
        return view('prodi.show', compact('prodi'));
    }

    public function edit(Prodi $prodi)
    {
        return view('prodi.edit', compact('prodi'));
    }

    public function update(Request $request, Prodi $prodi)
    {
        $request->validate([
            'kodeprodi' => 'required|string|max:10|unique:prodis,kodeprodi,' . $prodi->id,
            'namaprodi' => 'required|string|max:255',
            'jenjang' => 'required|string|max:50',
            'status' => 'required|string|max:50',
        ]);

        $prodi->update($request->all());
        return redirect()->route('prodis.index')->with('success', 'Program Studi berhasil diperbarui.');
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect()->route('prodis.index')->with('success', 'Program Studi berhasil dihapus.');
    }
}
