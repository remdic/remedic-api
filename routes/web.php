<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json([
        'message' => 'Remedic Api con AUTOPULL DI NUOVO!'
    ]);
});


Route::get('/test', function () {
    return response()->json([
        'message' => 'API funzionante!'
    ]);
});


// ciao
