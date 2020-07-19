<?php
$namespace = 'App\Modules\Backend\Showcase\Controllers';
Route::group(
    ['module' => 'Showcase', 'prefix' => 'dashboard', 'namespace' => $namespace, 'middleware' => ['web']],
    function () {
        Route::get('showcase', [
            // 'middleware' => ['permission:access-dashboard'],
            'as' => 'showcase.index',
            'uses' => 'ShowcaseController@index',
        ]);

        Route::get('showcase/create', [
            // 'middleware' => ['permission:access-dashboard'],
            'as' => 'showcase.create',
            'uses' => 'ShowcaseController@create',
        ]);

        Route::post('showcase/store', [
            // 'middleware' => ['permission:access-dashboard'],
            'as' => 'showcase.store',
            'uses' => 'ShowcaseController@store',
        ]);
    }
);