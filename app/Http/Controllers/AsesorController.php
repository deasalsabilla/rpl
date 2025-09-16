<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Cpmk;
use App\Models\Prodi;
use Illuminate\Http\Request;

class AsesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asesors = Asesor::latest()->paginate(10);
        return view('asesor.index', compact('asesors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = prodi::all();
        return view('asesor.create', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kode_asesor' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:asesors',
            'no_hp' => 'required|string|max:50',
            'password' => 'required|string|max:50',
            'prodis_id' => 'required|exists:prodis,id',
            // 'role' => 'required|string|max:50',
        ]);

        Asesor::create($request->all());
        return redirect()->route('asesors.index')->with('success', 'Program Studi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asesor $asesor)
    {
        return view('asesor.show', compact('asesor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $asesors = Asesor::findOrFail($id);
        $prodis = Prodi::all();
        return view('asesor.edit', compact('asesors','prodis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asesor $asesor)
    {
        //
        $request->validate([
            'kode_asesor' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:asesors,email' . $asesor->id,
            'no_hp' => 'required|string|max:50',
            'password' => 'required|string|max:50',
            'prodis_id' => 'required|exists:prodis,id',
            // 'role' => 'required|string|max:50',
        ]);

        $asesor->update($request->except('password')); // Exclude password if not updating
        return redirect()->route('asesors.index')->with('success', 'Data asesor berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asesor $asesor)
    {
        $asesor->delete();
        return redirect()->route('asesors.index')->with('success', 'Data asesor berhasil dihapus.');
    }
}
