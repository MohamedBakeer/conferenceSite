<?php

namespace App\Http\Controllers;

use App\Models\conferenceData;
use App\Models\hyper_links;
use App\Models\papers;
use File;
use Illuminate\Http\Request;

class researchpapers extends Controller
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

    public function index(Request $request, $subdomain)
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


                $isResearchApproved = papers::where('SubDomainConference', $primaryKey)->where('status', 'approved')->count();

                // ✅ البحث عن الورقة البحثية 
                $search = $request->input('search');
                $papersQuery = papers::where('SubDomainConference', $primaryKey)
                    ->where('status', 'approved');

                if ($search) {
                    $papersQuery->where('research_title', 'LIKE', "%$search%");
                }

                // ✅ تقسيم الورقات إلى صفحات
                $papers = $papersQuery->paginate(200); // عدد الورقات في الصفحة الواحدة 10


                $ConferenceName = conferenceData::where('SubDomainConference', $primaryKey)->value('nameConference');
                $logoimages = $this->logoimages($subdomain);
                $backgroundimages = $this->backgroundimages($subdomain);

                $Receivingpapers = conferenceData::where('SubDomainConference', $primaryKey)->value('Receivingpapers');

                $arrPass = [
                    'kaydomain' => $subdomain,
                    'ConferenceName' => $ConferenceName,
                    'logoimages' => $logoimages,
                    'Receivingpapers' => $Receivingpapers,
                    'backgroundimages' => $backgroundimages,
                    'isResearchApproved' => $isResearchApproved,
                    'papers' => $papers, // ✅ تمرير الورقات إلى الـ View
                    'search' => $search,  // ✅ تمرير البحث لتحديثه في الـ View            
                    ...$hyper_LINKS
                ];

                return view('pages.researchpapers', $arrPass);
                // return response()->json($arrPass);
            }
        }
    }
}
