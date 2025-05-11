<?php

namespace App\Http\Controllers;

use App\Models\conferenceData;
use App\Models\exhibitionincludes;
use App\Models\exhibitionobjectives;
use App\Models\hyper_links;
use App\Models\important_dates;
use App\Models\papers;
use Cookie;
use File;
use Illuminate\Http\Request;

class writingandparticipating extends Controller
{
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

    function pdfwritingtemplate($subdomain)
    {
        $directoryPath = public_path('asset/image/' . $subdomain . '//Writingandparticipating/pdfwritingtemplate');

        if (!File::isDirectory($directoryPath)) {
            abort(404, "Directory not found");
        }

        return collect(File::allFiles($directoryPath))->map(function ($file) use ($directoryPath) {
            return str_replace($directoryPath . '/', '', $file->getRelativePathname());
        })->toArray();
    }

    function Paperwritingtemplate_en($subdomain)
    {
        $directoryPath = public_path('asset/image/' . $subdomain . '//Writingandparticipating/Paperwritingtemplate(en)');

        if (!File::isDirectory($directoryPath)) {
            abort(404, "Directory not found");
        }

        return collect(File::allFiles($directoryPath))->map(function ($file) use ($directoryPath) {
            return str_replace($directoryPath . '/', '', $file->getRelativePathname());
        })->toArray();
    }

    function Paperwritingtemplate_ar($subdomain)
    {
        $directoryPath = public_path('asset/image/' . $subdomain . '//Writingandparticipating/Paperwritingtemplate(ar)');

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

                


                $ConferenceName = conferenceData::where('SubDomainConference', $primaryKey)->value('nameConference');
                $logoimages = $this->logoimages($subdomain);
                $backgroundimages = $this->backgroundimages($subdomain);
                
                $Paperwritingtemplate_en = $this->Paperwritingtemplate_en($subdomain);
                if ($Paperwritingtemplate_en == null) {
                    $Paperwritingtemplate_en = "0";
                }
                $Paperwritingtemplate_ar = $this->Paperwritingtemplate_ar($subdomain);
                if ($Paperwritingtemplate_ar == null) {
                    $Paperwritingtemplate_ar = "0";
                }
                $pdfwritingtemplate = $this->pdfwritingtemplate($subdomain);
                if ($pdfwritingtemplate == null) {
                    $pdfwritingtemplate = "0";
                }

                $folders = [
                    'Paperwritingtemplate_en' => $Paperwritingtemplate_en,
                    'Paperwritingtemplate_ar'=> $Paperwritingtemplate_ar,
                    'pdfwritingtemplate'=> $pdfwritingtemplate,
                    
                ];

                $ImportantDates = important_dates::where('SubDomainConference', $primaryKey)
                ->pluck('event')
                ->toArray();
                $ImportantDates_en = important_dates::where('SubDomainConference', $primaryKey)
                ->pluck('event_en')
                ->toArray();

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
                    'ConferenceName' => $ConferenceName,
                    'logoimages' => $logoimages,
                    'Receivingpapers' => $Receivingpapers,
                    'isResearchApproved' => $isResearchApproved,
                    'backgroundimages' => $backgroundimages,
                    'lang_dom' => Cookie::get('lang_dom'),
                    'exhibitionobjectives_count' => $exhibitionobjectives->count() ,
                    'exhibitionincludes_count' => $exhibitionincludes->count() ,
                    'ImportantDates' => $ImportantDates,
                    'ImportantDates_en' => $ImportantDates_en,
                    ...$hyper_LINKS,
                    ...$folders
                ];

                return view('pages.writingandparticipating', $arrPass);
                // return response()->json($arrPass);

            }
        }
    }
}

