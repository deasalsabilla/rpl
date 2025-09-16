<?php

namespace App\Http\Controllers;

use App\Models\HakAkses;
use App\Models\Role;
use App\Models\Menu;
use Illuminate\Http\Request;

class HakAksesController extends Controller
{
    public function index()
    {
        // eager load hakAkses agar di view tidak null
        $roles = Role::with('hakAkses')->orderBy('nama')->get();
        $menus = Menu::orderBy('urutan')->get();
    
        return view('hak_akses.index', compact('roles', 'menus'));
    }


    public function update(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);

        // Format request: akses[menu_id][can_view], akses[menu_id][can_edit], dst
        $aksesData = $request->input('akses', []);

        foreach ($aksesData as $menuId => $permissions) {
            HakAkses::updateOrCreate(
                [
                    'role_id' => $role->id,
                    'menu_id' => $menuId,
                ],
                [
                    'can_view'   => isset($permissions['can_view']) ? 1 : 0,
                    'can_edit'   => isset($permissions['can_edit']) ? 1 : 0,
                    'can_delete' => isset($permissions['can_delete']) ? 1 : 0,
                ]
            );
        }

        return redirect()->route('hak_akses.index')
                         ->with('success', 'Hak akses untuk role ' . $role->nama . ' berhasil diperbarui.');
    }
}
