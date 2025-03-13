<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Objectivesandthemes;
use App\Http\Controllers\writingandparticipating;
use App\Models\conferenceData;
use App\Models\home_page_details;
use App\Models\hyper_links;
use App\Models\important_dates;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;




// Route::domain('{subdomain}.'.$domain)->group(function () {
Route::domain('{subdomain}.beko.com')->group(function () {
    // Route::domain('{subdomain}.leaboz.org.ly')->group(function () {

    
    Route::controller(HomePageController::class)->group(function () {
        Route::get('', 'index')->name('homePage');
    });

    Route::controller(Objectivesandthemes::class)->group(function () {
        Route::get('/Objectivesandthemes', 'index')->name('Objectivesandthemes');
    });
    
    Route::controller(writingandparticipating::class)->group(function () {
        Route::get('/writingandparticipating', 'index')->name('writingandparticipating');
    });

});
