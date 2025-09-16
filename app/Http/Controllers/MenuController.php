<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Tampilkan semua menu
     */
    public function index()
    {
        // Ambil semua menu (parent maupun child)
        $menus = Menu::with('parent')
                     ->orderBy('urutan')
                     ->get();
    
        return view('menu.index', compact('menus'));
    }


    /**
     * Form tambah menu
     */
    public function create()
    {
        // Ambil menu utama saja untuk pilihan parent
        $parentMenus = Menu::whereNull('parent_id')->get();
    
        // Cari urutan terakhir di database
        $lastOrder = Menu::max('urutan') ?? 0;
        $nextOrder = $lastOrder + 1;
    
        return view('menu.create', compact('parentMenus', 'nextOrder'));
    }

    /**
     * Simpan menu baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'url'       => 'nullable|string|max:255',
            'ikon'      => 'nullable|string|max:100',
            'parent_id' => 'nullable|exists:menus,id',
            'urutan'    => 'nullable|integer',
            'status'    => 'required|in:aktif,nonaktif',
        ]);

        Menu::create($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    /**
     * Form edit menu
     */
    public function edit(Menu $menu)
    {
        $parentMenus = Menu::whereNull('parent_id')
                           ->where('id', '!=', $menu->id) // jangan jadi parent untuk dirinya sendiri
                           ->get();

        return view('menu.edit', compact('menu', 'parentMenus'));
    }

    /**
     * Update menu
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'url'       => 'nullable|string|max:255',
            'ikon'      => 'nullable|string|max:100',
            'parent_id' => 'nullable|exists:menus,id',
            'urutan'    => 'nullable|integer',
            'status'    => 'required|in:aktif,nonaktif',
        ]);

        $menu->update($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Hapus menu
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.');
    }
}
