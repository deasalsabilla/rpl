<?php

namespace App\Http\Controllers;

use App\Models\Makul;
use App\Models\Prodi;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class MakulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // app/Http/Controllers/MakulController.php
    public function index(Request $request)
{
    $query = Makul::with('prodi');

    // Search
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('kode_mk', 'LIKE', "%{$search}%")
              ->orWhere('nama_mk', 'LIKE', "%{$search}%")
              ->orWhereHas('prodi', function($q) use ($search) {
                  $q->where('namaprodi', 'LIKE', "%{$search}%")
                    ->orWhere('kodeprodi', 'LIKE', "%{$search}%");
              });
        });
    }

    // Filter by Semester
    if ($request->filled('semester')) {
        $query->where('semester', $request->semester);
    }

    // Filter by Prodi
    if ($request->filled('prodis_id')) {
        $query->where('prodis_id', $request->prodis_id);
    }

    // Sorting
    $sort = $request->sort ?? 'kode_mk';
    $direction = $request->direction ?? 'asc';
    
    if ($sort === 'prodis_id') {
        $query->join('prodis', 'makuls.prodis_id', '=', 'prodis.id')
              ->orderBy('prodis.namaprodi', $direction)
              ->select('makuls.*');
    } else {
        $query->orderBy($sort, $direction);
    }

    $makuls = $query->paginate(10);
    $prodis = Prodi::all();

    return view('matakuliah.index', compact('makuls', 'prodis'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $prodis = prodi::all();
        return view('matakuliah.create', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kode_mk' => 'required|string|max:20',
            'nama_mk' => 'required|string|max:255',
            'sks' => 'required|string|max:1',
            'semester' => 'required|string|max:2',
            'prodis_id' => 'required|exists:prodis,id',
            'status' => 'required|in:Iya,Tidak',
        ]);
        Makul::create($request->all());
        return redirect()->route('makuls.index')->with('success', 'Mata kuliah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Makul $makul)
    {
        //
        $prodis = prodi::all();

        return view('matakuliah.show', compact('makul','prodis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $makul = Makul::findOrFail($id);
        $prodis = Prodi::all();

        return view('matakuliah.edit', compact('makul', 'prodis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_mk' => 'required|string|max:10',
            'nama_mk' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8',
            'prodis_id' => 'required|exists:prodis,id',
            'status' => 'required|in:Iya,Tidak',
        ]);

        $makul = Makul::findOrFail($id);
        $makul->update($request->all());

        return redirect()->route('makuls.index')->with('success', 'Mata kuliah berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Makul $makul)
    {
        $makul->delete();
        return redirect()->route('makuls.index')->with('success', 'Mata kuliah berhasil dihapus');
    }

    
}
