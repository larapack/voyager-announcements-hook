<?php

use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

$prefix = route('voyager.dashboard', [], false);
$menu = Menu::where('name', 'admin')->first();

if (!is_null($menu)) {
    $menuItem = MenuItem::firstOrNew([
        'menu_id' => $menu->id,
        'url' => $prefix.'/announcements',
    ]);

    if (!$menuItem->exists) {
        $menuItem->fill([
            'title' => 'Announcements',
            'target' => '_self',
            'icon_class' => 'voyager-megaphone',
            'color' => null,
            'parent_id' => null,
            'order' => 2,
        ])->save();
    }
}

$permission = Permission::firstOrCreate([
    'key' => 'browse_announcements',
    'table_name' => 'admin',
]);

$role = Role::where('name', 'admin')->first();

if (!is_null($role)) {
    $role->permissions()->attach($permission);
}