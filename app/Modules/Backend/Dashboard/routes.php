<?php
$namespace = 'App\Modules\Backend\Dashboard\Controllers';
Route::group(
    ['module' => 'Dashboard', 'prefix' => 'dashboard', 'namespace' => $namespace, 'middleware' => ['web', 'auth', 'permission:dashboard.access']],
    function () {
        Route::get('/dataTable/language', [
            'as' => 'dashboard.dataTable.language',
            'uses' => 'DashboardController@dataTable_language',
        ]);
        
        Route::get('/', [
            // 'middleware' => ['permission:access-dashboard'],
            'as' => 'dashboard.index',
            'uses' => 'DashboardController@index',
        ]);
    }
);