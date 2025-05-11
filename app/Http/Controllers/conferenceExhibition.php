<?php

namespace App\Http\Controllers;

use App\Models\conferenceData;
use App\Models\exhibitionincludes;
use App\Models\exhibitionobjectives;
use App\Models\hyper_links;

use App\Models\objectives;

use App\Models\papers;
use Cookie;
use File;
use Illuminate\Http\Request;

class conferenceExhibition extends Controller
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

    function TheExhibitionbrochureimages($subdomain)
    {
        $directoryPath = public_path('asset/image/' . $subdomain . '//TheExhibitionbrochureimages/');

        if (!File::isDirectory($directoryPath)) {
            abort(404, "Directory not found");
        }

        return collect(File::allFiles($directoryPath))->map(function ($file) use ($directoryPath) {
            return str_replace($directoryPath . '/', '', $file->getRelativePathname());
        })->toArray();
    }


    public function index($subdomain)
    {

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

                $facebookurl = hyper_links::where('SubDomainConference', $primaryKey)->value('facebookurl');
                $whatsAppurl = hyper_links::where('SubDomainConference', $primaryKey)->value('whatsAppurl');
                $phoneNUMBER = hyper_links::where('SubDomainConference', $primaryKey)->value('phoneNUMBER');
                $hyper_LINKS = [
                    'facebookurl' => $facebookurl,
                    'whatsAppurl' => $whatsAppurl,
                    'phoneNUMBER' => $phoneNUMBER
                ];

                

                $TheExhibitionbrochureimages = $this->TheExhibitionbrochureimages($subdomain);
                if ($TheExhibitionbrochureimages == null) {
                    $TheExhibitionbrochureimages = "0";
                }

                $exhibitionobjectives = exhibitionobjectives::where('SubDomainConference', $primaryKey)->pluck('title');
                $exhibitionobjectives_en = exhibitionobjectives::where('SubDomainConference', $primaryKey)->pluck('title_en');
                $exhibitionincludes = exhibitionincludes::where('SubDomainConference', $primaryKey)->pluck('title');
                $exhibitionincludes_en = exhibitionincludes::where('SubDomainConference', $primaryKey)->pluck('title_en');


                $ConferenceName = conferenceData::where('SubDomainConference', $primaryKey)->value('nameConference');
                $ConferenceName_en = conferenceData::where('SubDomainConference', $primaryKey)->value('nameConference_en');
                $logoimages = $this->logoimages($subdomain);
                $backgroundimages = $this->backgroundimages($subdomain);


                $Receivingpapers = conferenceData::where('SubDomainConference', $primaryKey)->value('Receivingpapers');

                if (!Cookie::get('lang_dom')) {
                    // إذا لم يوجد كوكيز، قم بإنشائه مع القيمة الافتراضية "Mohamed"
                    $cookie = cookie('lang_dom', 'ar', 60);
                    // إعادة التوجيه إلى الصفحة الرئيسية مع رسالة
                    return redirect('/')->with('message', 'تم إنشاء الكوكيز مع القيمة الافتراضية "Mohamed"')->cookie($cookie);
                }
                $isResearchApproved = papers::where('SubDomainConference', $primaryKey)->where('status', 'approved')->count();

                

                $arrPass = [
                    'kaydomain' => $subdomain,
                    'ConferenceName' => $ConferenceName,
                    'ConferenceName_en' => $ConferenceName_en,
                    'logoimages' => $logoimages,
                    'isResearchApproved' => $isResearchApproved,
                    'Receivingpapers' => $Receivingpapers,
                    'backgroundimages' => $backgroundimages,
                    'exhibitionobjectives' => $exhibitionobjectives ,
                    'exhibitionobjectives_en' => $exhibitionobjectives_en ,
                    'exhibitionincludes' => $exhibitionincludes ,
                    'exhibitionincludes_en' => $exhibitionincludes_en ,
                    'exhibitionobjectives_count' => $exhibitionobjectives->count() ,
                    'exhibitionincludes_count' => $exhibitionincludes->count() ,
                    'TheExhibitionbrochureimages' => $TheExhibitionbrochureimages,
                    'lang_dom' => Cookie::get('lang_dom'),
                    ...$hyper_LINKS
                ];

                return view('pages.conferenceExhibition', $arrPass);
                // return response()->json($arrPass);

            }
        }
    }
}
