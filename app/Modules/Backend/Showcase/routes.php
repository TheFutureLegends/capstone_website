<?php
$namespace = 'App\Modules\Backend\Showcase\Controllers';
Route::group(
    ['module' => 'Showcase', 'prefix' => 'dashboard', 'namespace' => $namespace, 'middleware' => ['web', 'auth']],
    function () {

        Route::group(['prefix' => 'showcase'], function () {
            Route::post('/dataTable', [
                // 'middleware' => ['permission:access-dashboard'],
                'as' => 'showcase.dataTables',
                'uses' => 'ShowcaseController@dataTables'
            ]);
    
            Route::get('/', [
                // 'middleware' => ['permission:access-dashboard'],
                'as' => 'showcase.index',
                'uses' => 'ShowcaseController@index',
            ]);
    
            Route::get('/create', [
                // 'middleware' => ['permission:access-dashboard'],
                'as' => 'showcase.create',
                'uses' => 'ShowcaseController@create',
            ]);
    
            Route::post('/store', [
                // 'middleware' => ['permission:access-dashboard'],
                'as' => 'showcase.store',
                'uses' => 'ShowcaseController@store',
            ]);

            Route::get('/edit/{slug}', [
                'as' => 'showcase.edit',
                'uses' => 'ShowcaseController@edit'
            ]);

            Route::put('/{slug}/update', [
                'as' => 'showcase.update',
                'uses' => 'ShowcaseController@update'
            ]);
    
            Route::delete('/delete/{slug}', [
                'as' => 'showcase.destroy',
                'uses' => 'ShowcaseController@destroy'
            ]); 
        });

        // Route::resource('showcase', 'ShowcaseController')->except(['show', 'edit', 'destroy']);
    }
);