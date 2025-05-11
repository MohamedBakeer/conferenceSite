<?php

use App\Http\Controllers\conferenceExhibition;
use App\Http\Controllers\contactus;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Objectivesandthemes;
use App\Http\Controllers\organizersandsponsors;
use App\Http\Controllers\researchpapers;
use App\Http\Controllers\Sendresearch;
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

    Route::controller(Sendresearch::class)->group(function () {
        Route::get('/Sendresearch', 'index')->name('Sendresearch');
        Route::post('/SendSummary', 'Summary')->name('Sendresearch.Summary');
        Route::post('/SendThepaper', 'Thepaper')->name('Sendresearch.Thepaper');
    });

    Route::controller(researchpapers::class)->group(function () {
        Route::get('/researchpapers', 'index')->name('researchpapers');
    });

    Route::controller(contactus::class)->group(function () {
        Route::get('/contactus', 'index')->name('contactus');
    });

    Route::controller(conferenceExhibition::class)->group(function () {
        Route::get('/conferenceExhibition', 'index')->name('conferenceExhibition');
    });

    Route::controller(organizersandsponsors::class)->group(function () {
        Route::get('/organizersandsponsors', 'index')->name('organizersandsponsors');
    });


    Route::get('/get-cookie', function () {
        // قراءة الكوكيز
        $user = Cookie::get('lang_dom');
        return $user ? 'مرحباً، ' . $user : 'لا يوجد كوكيز';
    });
    
    Route::get('/switch-cookie', function () {
        // قراءة الكوكيز
        $user = Cookie::get('lang_dom');
        
        // إذا لم يكن هناك كوكيز
        if (!$user) {
            // إذا لم يوجد كوكيز، قم بإنشائه مع القيمة الافتراضية "Mohamed"
            $cookie = cookie('lang_dom', 'ar', 60);
            // إعادة التوجيه إلى الصفحة الرئيسية مع رسالة
            return redirect('/')->with('message', 'تم إنشاء الكوكيز مع القيمة الافتراضية "Mohamed"')->cookie($cookie);
        }
    
        // إذا كان الكوكيز موجودًا، نقوم بالتبديل بين "Mohamed" و "Ahmed"
        if ($user == 'ar') {
            $cookie = cookie('lang_dom', 'en', 60); // تغيير القيمة إلى "Ahmed"
        } else {
            $cookie = cookie('lang_dom', 'ar', 60); // تغيير القيمة إلى "Mohamed"
        }
    
        // إعادة التوجيه إلى الصفحة الرئيسية مع رسالة
        return redirect('/')->with('message', 'تم تبديل الكوكيز')->cookie($cookie);
    })->name('switch-cookie');
    

});
