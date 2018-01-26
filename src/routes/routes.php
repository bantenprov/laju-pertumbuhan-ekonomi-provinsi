<?php

Route::group(['prefix' => 'lpe-provinsi', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\LpeProvinsi\Http\Controllers\LpeProvinsiController@index',
        'create'     => 'Bantenprov\LpeProvinsi\Http\Controllers\LpeProvinsiController@create',
        'store'     => 'Bantenprov\LpeProvinsi\Http\Controllers\LpeProvinsiController@store',
        'show'      => 'Bantenprov\LpeProvinsi\Http\Controllers\LpeProvinsiController@show',
        'update'    => 'Bantenprov\LpeProvinsi\Http\Controllers\LpeProvinsiController@update',
        'destroy'   => 'Bantenprov\LpeProvinsi\Http\Controllers\LpeProvinsiController@destroy',
    ];

    Route::get('/',$controllers->index)->name('lpe-provinsi.index');
    Route::get('/create',$controllers->create)->name('lpe-provinsi.create');
    Route::post('/store',$controllers->store)->name('lpe-provinsi.store');
    Route::get('/{id}',$controllers->show)->name('lpe-provinsi.show');
    Route::put('/{id}/update',$controllers->update)->name('lpe-provinsi.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('lpe-provinsi.destroy');

});

