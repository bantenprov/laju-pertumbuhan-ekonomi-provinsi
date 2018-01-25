<?php

Route::group(['prefix' => 'lpe-provinsi', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\LpePprovinsi\Http\Controllers\LpePprovinsiController@index',
        'create'     => 'Bantenprov\LpePprovinsi\Http\Controllers\LpePprovinsiController@create',
        'store'     => 'Bantenprov\LpePprovinsi\Http\Controllers\LpePprovinsiController@store',
        'show'      => 'Bantenprov\LpePprovinsi\Http\Controllers\LpePprovinsiController@show',
        'update'    => 'Bantenprov\LpePprovinsi\Http\Controllers\LpePprovinsiController@update',
        'destroy'   => 'Bantenprov\LpePprovinsi\Http\Controllers\LpePprovinsiController@destroy',
    ];

    Route::get('/',$controllers->index)->name('lpe-provinsi.index');
    Route::get('/create',$controllers->create)->name('lpe-provinsi.create');
    Route::post('/store',$controllers->store)->name('lpe-provinsi.store');
    Route::get('/{id}',$controllers->show)->name('lpe-provinsi.show');
    Route::put('/{id}/update',$controllers->update)->name('lpe-provinsi.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('lpe-provinsi.destroy');

});

