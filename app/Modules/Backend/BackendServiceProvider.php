<?php

namespace App\Modules\Backend;

use App\Modules\Backend\Showcase\Repositories\ShowcaseRepository;
use App\Modules\Backend\Showcase\Repositories\ShowcaseRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $listModule = array_map('basename', File::directories(__DIR__));
        foreach ($listModule as $module) {
            // boot route
            if (file_exists(__DIR__ . '/' . $module . '/routes.php')) {
                include __DIR__ . '/' . $module . '/routes.php';
            }
            // boot view
            if (is_dir(__DIR__ . '/' . $module . '/Views')) {
                $this->loadViewsFrom(__DIR__ . '/' . $module . '/Views', $module);
            }
            // boot migration
            if (is_dir(__DIR__ . '/' . $module . '/Migrations')) {
                $this->loadMigrationsFrom(__DIR__ . '/' . $module . "/Migrations");
            }
        }
    }
    public function register()
    {
        $this->app->bind(ShowcaseRepositoryInterface::class, ShowcaseRepository::class);
    }
}
