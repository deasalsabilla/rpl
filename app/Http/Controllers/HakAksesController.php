<?php

namespace App\Http\Controllers;

use App\Models\HakAkses;
use App\Models\Role;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HakAksesController extends Controller
{
    public function index()
    {
        $roles = Role::with('hakAkses')->orderBy('id')->get();
        $menus = Menu::orderBy('urutan')->get();

        return view('hak_akses.index', compact('roles', 'menus'));
    }

    public function update(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);
        $aksesData = $request->input('akses', []);
        $menuIds = Menu::pluck('id')->toArray();

        DB::transaction(function () use ($menuIds, $aksesData, $role) {
            foreach ($menuIds as $menuId) {
                $perm = $aksesData[$menuId] ?? [];

                $can_view   = isset($perm['can_view']) && (int)$perm['can_view'] === 1 ? 1 : 0;
                $can_create = isset($perm['can_create']) && (int)$perm['can_create'] === 1 ? 1 : 0;
                $can_edit   = isset($perm['can_edit']) && (int)$perm['can_edit'] === 1 ? 1 : 0;
                $can_delete = isset($perm['can_delete']) && (int)$perm['can_delete'] === 1 ? 1 : 0;

                HakAkses::updateOrCreate(
                    ['role_id' => $role->id, 'menu_id' => $menuId],
                    [
                        'can_view'   => $can_view,
                        'can_create' => $can_create,
                        'can_edit'   => $can_edit,
                        'can_delete' => $can_delete,
                    ]
                );
            }
        });

        return redirect()->route('hak_akses.index')
            ->with('success', 'Hak akses untuk role ' . $role->nama . ' berhasil diperbarui.');
    }
}
