<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/b1', function (Request $request) {
    return  "h1";
});
