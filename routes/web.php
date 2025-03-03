<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

Route::domain('{subdomain}.leaboz.org.ly')->group(function () {

    // قائمة الدومينات الفرعية المسموح بها
    $allowedSubdomains = ['b1', 'fifth'];

    function backgroundimages($subdomain) {
        $directoryPath = public_path('asset/image/background/'.$subdomain);

        if (!File::isDirectory($directoryPath)) {
            abort(404, "Directory not found");
        }

        return collect(File::allFiles($directoryPath))->map(function ($file) use ($directoryPath) {
            return str_replace($directoryPath . '/', '', $file->getRelativePathname());
        })->toArray();
    }
    function logoimages($subdomain) {
        $directoryPath = public_path('asset/image/logo/'.$subdomain);

        if (!File::isDirectory($directoryPath)) {
            abort(404, "Directory not found");
        }

        return collect(File::allFiles($directoryPath))->map(function ($file) use ($directoryPath) {
            return str_replace($directoryPath . '/', '', $file->getRelativePathname());
        })->toArray();
    }
    
    

    Route::get('/', function ($subdomain) use ($allowedSubdomains) {
        Log::info('Subdomain accessed: ' . $subdomain);

        // التحقق من صحة الدومين الفرعي
        if (!in_array($subdomain, $allowedSubdomains)) {
            abort(404, "Subdomain not allowed");
        }

        // جلب الصور الخاصة بالدومين الفرعي
        $backgroundimages = backgroundimages($subdomain);
        $logoimages = logoimages($subdomain);

        $details = [
            'ConferenceName' => "المؤتمر الهندسي الخامس",
            'ConferenceTo' => "لنقابة المهن الهندسية بالزاوية",
            'Syndicatetext' => "الهندسة والذكاء الإصطناعي في تحقيق التنمية المستدامة لبناء الدولة",
            'ConferenceDate' => "2025-6-1",
            'ConferenceIntroduction' => " في ظل التطورات المتسارعة التي يشهدها العالم في مجالات التكنولوجيا والذكاء الاصطناعي، أصبح من الضروري مواكبة هذه التطورات من خلال الأبحاث الهندسية المبتكرة. يأتي هذا المؤتمر الخامس لنقابة المهن الهندسية تحت عنوان “الهندسة والذكاء الاصطناعي: ابتكارات نحو مستقبل مستدام وذكي” ليكون منبرًا علميًا يتيح للباحثين والمختصين مناقشة أحدث التطبيقات والحلول التقنية والهندسية التي تسهم في بناء مستقبل أكثر استدامة وذكاءً.
      يهدف هذا المؤتمر إلى الجمع بين الخبرات العلمية والهندسية لدراسة التحديات الحالية واستشراف الفرص المستقبلية لتطوير البنى التحتية، الطاقة المتجددة، والصناعات الهندسية باستخدام تقنيات الذكاء الاصطناعي، بما يتوافق مع أهداف التنمية المستدامة. 
",
        ];


        $arrPass = [
            'kaydomain' => $subdomain,
            'backgroundimages' => $backgroundimages,
            'logoimages' => $logoimages,
            ...$details
        ];

        // return view('pages.home', $arrPass); 
        return response()->json($arrPass );

    });

});
