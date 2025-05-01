<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json([
        'message' => 'Remedic Api!'
    ]);
});


Route::get('/test', function () {
    return response()->json([
        'message' => 'API funzionante!'
    ]);
});
