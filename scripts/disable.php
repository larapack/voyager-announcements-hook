<?php

use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

$prefix = route('voyager.dashboard', [], false);

MenuItem::where('url', $prefix.'/announcements')
    ->delete();

Permission::where('table_name', 'admin')
    ->where('key', 'browse_announcements')
    ->delete();
