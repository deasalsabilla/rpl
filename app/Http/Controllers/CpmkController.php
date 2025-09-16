<?php

namespace App\Http\Controllers;

use App\Models\Cpmk;
use App\Models\Makul;
use App\Models\Prodi;
use Illuminate\Http\Request;

class CpmkController extends Controller
{
    public function index(Request $request)
    {
        $query = Cpmk::with(['makul.prodi']);

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_cpmk', 'LIKE', "%{$search}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$search}%")
                  ->orWhereHas('makul', function($q) use ($search) {
                      $q->where('nama_mk', 'LIKE', "%{$search}%")
                        ->orWhere('kode_mk', 'LIKE', "%{$search}%");
                  });
            });
        }

        // Filter by Mata Kuliah
        if ($request->filled('makuls_id')) {
            $query->where('makuls_id', $request->makuls_id);
        }

        // Filter by Prodi (melalui relasi makul)
        if ($request->filled('prodis_id')) {
            $query->whereHas('makul', function($q) use ($request) {
                $q->where('prodis_id', $request->prodis_id);
            });
        }

        // Sorting
        $sort = $request->sort ?? 'kode_cpmk';
        $direction = $request->direction ?? 'asc';
        
        switch($sort) {
            case 'makul':
                $query->join('makuls', 'cpmks.makuls_id', '=', 'makuls.id')
                      ->orderBy('makuls.nama_mk', $direction)
                      ->select('cpmks.*');
                break;
            case 'prodi':
                $query->join('makuls', 'cpmks.makuls_id', '=', 'makuls.id')
                      ->join('prodis', 'makuls.prodis_id', '=', 'prodis.id')
                      ->orderBy('prodis.namaprodi', $direction)
                      ->select('cpmks.*');
                break;
            default:
                $query->orderBy($sort, $direction);
        }

        $cpmks = $query->paginate(10);
        $makuls = Makul::all();
        $prodis = Prodi::all();

        return view('cpmk.index', compact('cpmks', 'makuls', 'prodis'));
    }

    public function create()
    {
        $makuls = Makul::all();
        return view('cpmk.create', compact('makuls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_cpmk' => 'required|string|max:20',
            'deskripsi' => 'required|string|max:255',
            'makuls_id' => 'required|exists:makuls,id',
        ]);

        Cpmk::create($request->all());
        return redirect()->route('cpmks.index')->with('success', 'CPMK berhasil ditambahkan'); // Perbaiki sintaks
    }

    public function show(Cpmk $cpmk)
    {
        return view('cpmk.show', compact('cpmk'));
    }

    public function edit($id)
    {
        $cpmk = Cpmk::findOrFail($id);
        $makuls = Makul::all();
        return view('cpmk.edit', compact('cpmk', 'makuls'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_cpmk' => 'required|string|max:20',
            'deskripsi' => 'required|string|max:255',
            'makuls_id' => 'required|exists:makuls,id',
        ]);

        $cpmk = Cpmk::findOrFail($id);
        $cpmk->update($request->all());
        return redirect()->route('cpmks.index')->with('success', 'CPMK berhasil diperbarui'); // Perbaiki sintaks
    }

    public function destroy(Cpmk $cpmk)
    {
        $cpmk->delete();
        return redirect()->route('cpmks.index')->with('success', 'CPMK berhasil dihapus'); // Perbaiki sintaks
    }
}
