<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\Menu;
use App\Models\HakAkses;

class GenerateHakAksesSeeder extends Seeder
{
    public function run()
    {
        $roles = Role::all();
        $menus = Menu::all();

        foreach ($roles as $role) {
            foreach ($menus as $menu) {
                HakAkses::firstOrCreate([
                    'role_id' => $role->id,
                    'menu_id' => $menu->id,
                ], [
                    'can_view'   => false,
                    'can_edit'   => false,
                    'can_delete' => false,
                ]);
            }
        }
    }
}
