<?php

use Illuminate\Support\Facades\Route;

Route::group(['module'=>'EliteDealer', 'middleware'=>'check'], function(){
    Route::resource('elite-dealer', 'EliteDealerController');
});


