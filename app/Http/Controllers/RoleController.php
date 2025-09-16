<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Tampilkan semua role
     */
    public function index()
    {
        $roles = Role::orderBy('id')->get();
        return view('role.index', compact('roles'));
    }

    /**
     * Form tambah role
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Simpan role baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100|unique:roles,nama',
            'deskripsi' => 'nullable|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        Role::create($validated);

        return redirect()->route('role.index')->with('success', 'Role berhasil ditambahkan.');
    }

    /**
     * Form edit role
     */
    public function edit(Role $role)
    {
        return view('role.edit', compact('role'));
    }

    /**
     * Update role
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100|unique:roles,nama,' . $role->id,
            'deskripsi' => 'nullable|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $role->update($validated);

        return redirect()->route('role.index')->with('success', 'Role berhasil diperbarui.');
    }

    /**
     * Hapus role
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('role.index')->with('success', 'Role berhasil dihapus.');
    }
}
