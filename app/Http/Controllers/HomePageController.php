<?php

namespace App\Http\Controllers;

use App\Models\exhibitionincludes;
use App\Models\exhibitionobjectives;
use App\Models\papers;
use App\Models\sponsors;
use Cookie;
use File;
use Illuminate\Http\Request;

use App\Models\conferenceData;
use App\Models\home_page_details;
use App\Models\hyper_links;
use App\Models\important_dates;


class HomePageController extends Controller
{
    //
    function backgroundimages($subdomain)
    {
        $directoryPath = public_path('asset/image/' . $subdomain . '//background/');

        if (!File::isDirectory($directoryPath)) {
            abort(404, "Directory not found");
        }

        return collect(File::allFiles($directoryPath))->map(function ($file) use ($directoryPath) {
            return str_replace($directoryPath . '/', '', $file->getRelativePathname());
        })->toArray();
    }
    function logoimages($subdomain)
    {
        $directoryPath = public_path('asset/image/' . $subdomain . '//logo/');

        if (!File::isDirectory($directoryPath)) {
            abort(404, "Directory not found");
        }

        return collect(File::allFiles($directoryPath))->map(function ($file) use ($directoryPath) {
            return str_replace($directoryPath . '/', '', $file->getRelativePathname());
        })->toArray();
    }

    function Conferenceimages($subdomain)
    {
        $directoryPath = public_path('asset/image/' . $subdomain . '//Conferenceimg/');

        if (!File::isDirectory($directoryPath)) {
            abort(404, "Directory not found");
        }

        return collect(File::allFiles($directoryPath))->map(function ($file) use ($directoryPath) {
            return str_replace($directoryPath . '/', '', $file->getRelativePathname());
        })->toArray();
    }

    function Sponserimages($subdomain)
    {
        $directoryPath = public_path('asset/image/' . $subdomain . '//staticSponsors/');

        if (!File::isDirectory($directoryPath)) {
            abort(404, "Directory not found");
        }

        return collect(File::allFiles($directoryPath))->map(function ($file) use ($directoryPath) {
            return str_replace($directoryPath . '/', '', $file->getRelativePathname());
        })->toArray();
    }

    function Thebrochureimages($subdomain)
    {
        $directoryPath = public_path('asset/image/' . $subdomain . '//Thebrochure/');

        if (!File::isDirectory($directoryPath)) {
            abort(404, "Directory not found");
        }

        return collect(File::allFiles($directoryPath))->map(function ($file) use ($directoryPath) {
            return str_replace($directoryPath . '/', '', $file->getRelativePathname());
        })->toArray();
    }
    
    public function index($subdomain){

        // Log::info('Subdomain accessed: ' . $subdomain);

        $isExistsConference = conferenceData::where('SubDomainConference', $subdomain)->exists();
        if (!$isExistsConference) {
            abort(404, "لا توجد هذه الوجهة !");
        } else {
            $primaryKey = $subdomain;
            $isActiveConference = conferenceData::where('SubDomainConference', $primaryKey)->value('activationConference');
            if ($isActiveConference != 'active') {
                return view('handlingPage.inactive');
            } else {

                $ConferenceName = conferenceData::where('SubDomainConference', $primaryKey)->value('nameConference');
                $ConferenceName_en = conferenceData::where('SubDomainConference', $primaryKey)->value('nameConference_en');
                $dateConference = conferenceData::where('SubDomainConference', $primaryKey)->value('dateConference');
                
                $themeConference = home_page_details::where('SubDomainConference', $primaryKey)->value('themeConference');
                $themeConference_en = home_page_details::where('SubDomainConference', $primaryKey)->value('themeConference_en');
                $introductionConference = home_page_details::where('SubDomainConference', $primaryKey)->value('introductionConference');
                $introductionConference_en = home_page_details::where('SubDomainConference', $primaryKey)->value('introductionConference_en');
                $partnersConference = home_page_details::where('SubDomainConference', $primaryKey)->value('partnersConference');
                $partnersConference_en = home_page_details::where('SubDomainConference', $primaryKey)->value('partnersConference_en');

                $ImportantDates = important_dates::where('SubDomainConference', $primaryKey)
                ->pluck('event')
                ->toArray();
                $ImportantDates_en = important_dates::where('SubDomainConference', $primaryKey)
                ->pluck('event_en')
                ->toArray(); // الحصول على التواريخ أو الأحداث في مصفوفة

/*                 // تحويل القيم لتنسيق كما في المثال المطلوب
                $ImportantDatesFormatted = array_map(function($event) {
                    return ' ' . $event; // يمكنك تعديل التنسيق هنا إذا لزم الأمر
                }, $ImportantDates);

                // مثال للإظهار
                dd($ImportantDatesFormatted); */
                // $ImportantDates = [
                //     ' بداية اعلام المؤتمر 15 / 05 / 2021 .',
                //     ' آخر موعد لإستلام الملخصات 01 / 07 / 2021 .',
                //     ' الاخطار بقبول الملخصات 15 / 07 / 2021 .',
                //     ' آخر موعد لإستلام البحوث الكاملة 15 / 10 / 2021 .',
                //     ' اشعار الباحثين بالقبول النهائي 15 / 11 / 2021 .',
                //     ' استلام النسخة النهائية 30 / 11 / 2021 .',
                //     ' موعد إنعقاد المؤتمر 14-15 / 12 / 2021 .'
                // ];

                $backgroundimages =  $this->backgroundimages($subdomain);
                $logoimages = $this->logoimages($subdomain);

                $Conferenceimages = $this->Conferenceimages($subdomain);
                if ($Conferenceimages == null) {
                    $Conferenceimages = "0";
                }

                $Sponserimages = $this->Sponserimages($subdomain);
                if ($Sponserimages == null) {
                    $Sponserimages = "0";
                }
                // $Sponserimages = sponsors::where('SubDomainConference', $primaryKey)->get();


                $Thebrochureimages = $this->Thebrochureimages($subdomain);
                if ($Thebrochureimages == null) {
                    $Thebrochureimages = "0";
                }

                $details = [
                    'ConferenceName' => $ConferenceName,
                    'ConferenceName_en' => $ConferenceName_en,
                    'ConferenceTo' => "لنقابة المهن الهندسية بالزاوية",
                    'ConferenceTo_en' => "To the Engineering Syndicate in Al-Zawiya",
                    'Syndicatetext' => $themeConference,
                    'Syndicatetext_en' => $themeConference_en,
                    'ConferenceDate' => $dateConference,
                    'ConferenceIntroduction' => $introductionConference,
                    'ConferenceIntroduction_en' => $introductionConference_en,
                    'PartnersConference' => $partnersConference    ,
                    'PartnersConference_en' => $partnersConference_en,
                ];

                $files_public = [
                    'Conferenceimages' => $Conferenceimages,    
                    'Sponserimages' => $Sponserimages,
                    'ImportantDates' => $ImportantDates,
                    'ImportantDates_en' => $ImportantDates_en,
                    'Thebrochureimages' => $Thebrochureimages,
                ];

                $facebookurl = hyper_links::where('SubDomainConference', $primaryKey)->value('facebookurl');
                $whatsAppurl = hyper_links::where('SubDomainConference', $primaryKey)->value('whatsAppurl');
                $phoneNUMBER = hyper_links::where('SubDomainConference', $primaryKey)->value('phoneNUMBER');
                $CMT3url = hyper_links::where('SubDomainConference', $primaryKey)->value('CMT3url');

                $hyper_LINKS  = [
                    'facebookurl' => $facebookurl,
                    'whatsAppurl' => $whatsAppurl,
                    'CMT3url' => $CMT3url,

                    'phoneNUMBER' => $phoneNUMBER
                ];

                $Receivingpapers = conferenceData::where('SubDomainConference', $primaryKey)->value('Receivingpapers');

                if (!Cookie::get('lang_dom')) {
                    // إذا لم يوجد كوكيز، قم بإنشائه مع القيمة الافتراضية "Mohamed"
                    $cookie = cookie('lang_dom', 'ar', 60);
                    // إعادة التوجيه إلى الصفحة الرئيسية مع رسالة
                    return redirect('/')->with('message', 'تم إنشاء الكوكيز مع القيمة الافتراضية "Mohamed"')->cookie($cookie);
                }

                $isResearchApproved = papers::where('SubDomainConference', $primaryKey)->where('status', 'approved')->count();

                $exhibitionobjectives = exhibitionobjectives::where('SubDomainConference', $primaryKey)->pluck('title');
                $exhibitionincludes = exhibitionincludes::where('SubDomainConference', $primaryKey)->pluck('title');

                $arrPass = [
                    'kaydomain' => $subdomain,
                    'backgroundimages' => $backgroundimages,
                    'logoimages' => $logoimages,
                    'Receivingpapers' => $Receivingpapers,
                    'isResearchApproved' => $isResearchApproved,
                    'exhibitionobjectives_count' => $exhibitionobjectives->count() ,
                    'exhibitionincludes_count' => $exhibitionincludes->count() ,

                    'lang_dom' => Cookie::get('lang_dom'),
                    ...$details ,
                    ...$files_public,
                    ...$hyper_LINKS

                ];



                return view('pages.home', $arrPass);
                // return response()->json($arrPass);
            }
        }


    }
}
