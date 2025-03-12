<?php

namespace App\Http\Controllers;

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
        $directoryPath = public_path('asset/image/' . $subdomain . '//Sponserimg/');

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
                $dateConference = conferenceData::where('SubDomainConference', $primaryKey)->value('dateConference');
                
                $themeConference = home_page_details::where('SubDomainConference', $primaryKey)->value('themeConference');
                $introductionConference = home_page_details::where('SubDomainConference', $primaryKey)->value('introductionConference');
                $partnersConference = home_page_details::where('SubDomainConference', $primaryKey)->value('partnersConference');

                $ImportantDates = important_dates::where('SubDomainConference', $primaryKey)
                ->pluck('event')
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
                
                $Thebrochureimages = $this->Thebrochureimages($subdomain);
                if ($Thebrochureimages == null) {
                    $Thebrochureimages = "0";
                }

                $details = [
                    'ConferenceName' => $ConferenceName,
                    'ConferenceTo' => "لنقابة المهن الهندسية بالزاوية",
                    'Syndicatetext' => $themeConference,
                    'ConferenceDate' => $dateConference,
                    'ConferenceIntroduction' => $introductionConference,
                    'PartnersConference' => $partnersConference    
                ];

                $files_public = [
                    'Conferenceimages' => $Conferenceimages,    
                    'Sponserimages' => $Sponserimages,
                    'ImportantDates' => $ImportantDates,
                    'Thebrochureimages' => $Thebrochureimages,
                ];

                $facebookurl = hyper_links::where('SubDomainConference', $primaryKey)->value('facebookurl');
                $whatsAppurl = hyper_links::where('SubDomainConference', $primaryKey)->value('whatsAppurl');
                $phoneNUMBER = hyper_links::where('SubDomainConference', $primaryKey)->value('phoneNUMBER');
                $hyper_LINKS  = [
                    'facebookurl' => $facebookurl,
                    'whatsAppurl' => $whatsAppurl,
                    'phoneNUMBER' => $phoneNUMBER
                ];

                $arrPass = [
                    'kaydomain' => $subdomain,
                    'backgroundimages' => $backgroundimages,
                    'logoimages' => $logoimages,
                    ...$details ,
                    ...$files_public,
                    ...$hyper_LINKS
                ];

                return view('pages.home', $arrPass);
            }
        }


    }
}
