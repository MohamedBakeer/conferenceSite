<?php

namespace App\Http\Controllers;

use App\Models\conferenceData;
use App\Models\hyper_links;
use App\Models\objectives;
use App\Models\SubTopic;
use App\Models\Topic;
use File;
use Illuminate\Http\Request;

class Objectivesandthemes extends Controller
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

                // جلب المحاور والمواضيع الفرعية
                $topics = Topic::where('SubDomainConference', $primaryKey)->get();

                // تنسيق البيانات بحيث تكون كل محور يحتوي على المواضيع الفرعية الخاصة به
                $formattedTopics = $topics->map(function ($topic) {
                    return [
                        'id' => $topic->id,
                        'title' => $topic->title, // اسم المحور
                        'sub_topics' => SubTopic::where('topic_id', $topic->id)->pluck('title') // جلب المواضيع الفرعية
                    ];
                });

                $objectives = objectives::where('SubDomainConference', $primaryKey)->pluck('title');


                $ConferenceName = conferenceData::where('SubDomainConference', $primaryKey)->value('nameConference');
                $logoimages = $this->logoimages($subdomain);
                $backgroundimages = $this->backgroundimages($subdomain);

                $arrPass = [
                    'kaydomain' => $subdomain,
                    'ConferenceName' => $ConferenceName,
                    'logoimages' => $logoimages,
                    'backgroundimages' => $backgroundimages,
                    'topics' => $formattedTopics, // هنا البيانات الجديدة
                    'objectives' => $objectives ,

                    ...$hyper_LINKS
                ];

                return view('pages.objectivesandthemes', $arrPass);
                // return response()->json($arrPass);

            }
        }
    }
}
