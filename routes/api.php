<?php


use App\Http\Controllers\api\apiconferenceData;
use App\Http\Controllers\api\apiFolders;
use App\Http\Controllers\api\apihomePageDetails;
use App\Http\Controllers\api\apiobjectivesAndThemes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::domain('{subdomain}.beko.com')->group(function () {
    // Route::domain('{subdomain}.leaboz.org.ly')->group(function () {
    Route::get('/', function () {
        return "hello Api " . request()->route('subdomain');
    });



    Route::controller(apiFolders::class)->prefix("folders")->group(function () {
        Route::post('/ConfigurationFolder', 'ConfigurationFolder');
    });

    Route::controller(apiconferenceData::class)->prefix("conferenceData")->group(function () {
        Route::post('/index', 'index');
        Route::post('/store', 'store');
        Route::post('/update', 'update');
    });
    
    Route::controller(apihomePageDetails::class)->prefix("homePageDetails")->group(function () {
        Route::post('/index', 'index');
        Route::post('/store', 'store');
        Route::post('/update', 'update');

        // important_dates  -  ⌛ مواعيد مهمة : 
        Route::post('/importantDates/index', 'important_dates_index');
        Route::post('/importantDates/store', 'important_dates_store');
        Route::post('/importantDates/update', 'important_dates_update');
        Route::post('/importantDates/delete', 'important_dates_delete');
    });

    Route::controller(apiobjectivesAndThemes::class)->prefix("ObjectivesAndThemes")->group(function () {

        // Objectives  -  ⌛ أهداف المؤتمر :
        Route::post('/Objectives/index', 'indexObjectives');
        Route::post('/Objectives/store', 'storeObjectives');
        Route::post('/Objectives/update', 'updateObjectives');
        Route::post('/Objectives/delete', 'deleteObjectives');

        // Themes  -  ⌛ محاور المؤتمر :
        Route::post('/Themes/index', 'indexThemes');
        Route::post('/Themes/store', 'storeThemes');
        Route::post('/Themes/update', 'updateThemes');
        Route::post('/Themes/delete', 'deleteThemes');

        // Themes  -  ⌛ محاور المؤتمر :
        Route::post('/Themes/subtopic/index', 'index_sub_dopic');
        Route::post('/Themes/subtopic/store', 'store_sub_dopic');
        Route::post('/Themes/subtopic/update', 'update_sub_dopic');
        Route::post('/Themes/subtopic/delete', 'delete_sub_dopic');

    });

});
