<?php

namespace Larapack\VoyagerAnnouncements;

use Illuminate\Routing\Router;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;

class VoyagerAnnouncementsHookServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'voyager-announcements');
    }

    public function boot(Dispatcher $events)
    {
        if (config('voyager-announcements.add-routes', true)) {
            $events->listen('voyager.admin.routing', [$this, 'addRoutes']);
        }
    }

    public function addRoutes(Router $router)
    {
        $router->get('announcements', [
            'uses' => '\\'.Controllers\AnnouncementController::class.'@index',
            'as' => 'announcements',
        ]);
    }
}