<?php

namespace App\Http\Controllers;

use App\Models\conferenceData;
use App\Models\hyper_links;
use App\Models\papers;
use App\Models\summaries;
use App\Models\summary;
use File;
use Illuminate\Http\Request;

class Sendresearch extends Controller
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
                $Receivingpapers = conferenceData::where('SubDomainConference', $primaryKey)->value('Receivingpapers');
                $logoimages = $this->logoimages($subdomain);
                $backgroundimages = $this->backgroundimages($subdomain);

                $arrPass = [
                    'kaydomain' => $subdomain,
                    'ConferenceName' => $ConferenceName,
                    'Receivingpapers' => $Receivingpapers,
                    'logoimages' => $logoimages,
                    'backgroundimages' => $backgroundimages,
                    ...$hyper_LINKS
                ];

                return view('pages.sendresearch', $arrPass);
                // return response()->json($arrPass);

            }
        }
    }


    public function Summary(Request $request , $subdomain){
        // $request->validate([
        //     'engineer_name' => 'required|string|max:255',
        //     'engineer_email' => 'required|email',
        //     'research_title' => 'required|string',
        //     'phone_number' => 'required|string',
        //     'university' => 'required|string',
        //     'research_file' => 'required|file|mimes:pdf,doc,docx|max:2048', 
        // ]);
    
        // حفظ الملف
        $filePath = $request->file('research_file')->move(public_path('asset/image/'.$subdomain.'/Sendresearch/Summary'), $request->file('research_file')->getClientOriginalName());
    
        // حفظ البيانات في قاعدة البيانات
        $ResearchSubmission = [
            'SubDomainConference' => $subdomain,
            'engineer_name' => $request->engineer_name,
            'engineer_email' => $request->engineer_email,
            'phone_number' => $request->phone_number,
            'university' => $request->university,
            'research_title' => $request->research_title,
            'file_path_name' => $filePath->getBasename(),
            'status' => 'pending', // بانتظار الموافقة
        ];
        
        summaries::create($ResearchSubmission);
        
        return back()->with('success', 'تم إرسال البحث بنجاح!');
        // return response()->json($ResearchSubmission);
    }

    public function Thepaper(Request $request , $subdomain){
        // $request->validate([
        //     'engineer_name' => 'required|string|max:255',
        //     'engineer_email' => 'required|email',
        //     'research_title' => 'required|string',
        //     'phone_number' => 'required|string',
        //     'university' => 'required|string',
        //     'research_file' => 'required|file|mimes:pdf,doc,docx|max:2048', 
        // ]);
    
        // حفظ الملف
        $filePath = $request->file('research_file')->move(public_path('asset/image/'.$subdomain.'/Sendresearch/Thepaper'), $request->file('research_file')->getClientOriginalName());
    
        // حفظ البيانات في قاعدة البيانات
        $ResearchSubmission = [
            'SubDomainConference' => $subdomain,
            'engineer_name' => $request->engineer_name,
            'engineer_email' => $request->engineer_email,
            'phone_number' => $request->phone_number,
            'university' => $request->university,
            'research_title' => $request->research_title,
            'file_path_name' => $filePath->getBasename(),
            'status' => 'pending', // بانتظار الموافقة
        ];
        
        papers::create($ResearchSubmission);
        
        return back()->with('success', 'تم إرسال البحث بنجاح!');
        // return response()->json($ResearchSubmission);
    }

}

