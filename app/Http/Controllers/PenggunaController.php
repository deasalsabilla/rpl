<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::all();
        return view('user.index', compact('pengguna'));
    }

    public function create()
    {
        $roles = Role::where('status', 'aktif')->get(); // ambil hanya role aktif
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:penggunas,email',
            'password' => 'required|string|min:6',
            'role' => 'required|exists:roles,id', // role harus ada di tabel roles
        ]);

        Pengguna::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // simpan id role, bukan string lagi
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan');
    }
    
    public function update(Request $request, $id)
    {
        $pengguna = Pengguna::findOrFail($id);
    
        // Validasi data
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:penggunas,email,' . $id,
            'password' => 'nullable|min:6',
            'role' => 'required|exists:roles,id',
        ]);
    
        // Jika password diisi, update dengan hash
        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']); // jangan update password
        }
    
        // Update data
        $pengguna->update($validated);
    
        return redirect()->route('pengguna.index')
                         ->with('success', 'Data pengguna berhasil diperbarui.');
    }
    
    public function edit($id)
{
    $pengguna = Pengguna::findOrFail($id);
    $roles = Role::where('status', 'aktif')->get(); // ambil hanya role aktif
    return view('user.edit', compact('pengguna', 'roles'));
}


    public function show($id)
    {
        $pengguna = Pengguna::findOrFail($id); // cari data berdasarkan id
        return view('user.show', compact('pengguna'));
    }
    
    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();
    
        return redirect()->route('pengguna.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }

}
