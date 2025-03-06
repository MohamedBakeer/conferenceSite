<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;


function domainn() {
    $host = request()->getHost();
    $host_names = explode(".", $host);

    // تحقق من أن المصفوفة تحتوي على نطاقين على الأقل
    if (count($host_names) < 2) {
        return $host; // أعد النطاق كما هو بدلاً من حدوث خطأ
    }

    $bottom_host_name = $host_names[count($host_names)-2] . "." . $host_names[count($host_names)-1];

    return $bottom_host_name;
}

$domain = domainn();

// Route::domain('{subdomain}.'.$domain)->group(function () {
Route::domain('{subdomain}.beko.com')->group(function () {
// Route::domain('{subdomain}.leaboz.org.ly')->group(function () {
    

    // قائمة الدومينات الفرعية المسموح بها
    $allowedSubdomains = [
        'b1','sec','third','fourth','fifth','sixth','seventh','eighth',
        'ninth','tenth','eleventh','twelfth','thirteenth','fourteenth','fifteenth',
        'sixteenth','seventeenth','eighteenth','nineteenth','twentieth',
    ];

    function backgroundimages($subdomain) {
        $directoryPath = public_path('asset/image/'.$subdomain.'//background/');

        if (!File::isDirectory($directoryPath)) {
            abort(404, "Directory not found");
        }

        return collect(File::allFiles($directoryPath))->map(function ($file) use ($directoryPath) {
            return str_replace($directoryPath . '/', '', $file->getRelativePathname());
        })->toArray();
    }
    function logoimages($subdomain) {
        $directoryPath = public_path('asset/image/'.$subdomain.'//logo/');

        if (!File::isDirectory($directoryPath)) {
            abort(404, "Directory not found");
        }

        return collect(File::allFiles($directoryPath))->map(function ($file) use ($directoryPath) {
            return str_replace($directoryPath . '/', '', $file->getRelativePathname());
        })->toArray();
    }
    
    function Conferenceimages($subdomain) {
        $directoryPath = public_path('asset/image/'.$subdomain.'//Conferenceimg/');

        if (!File::isDirectory($directoryPath)) {
            abort(404, "Directory not found");
        }
        
        return collect(File::allFiles($directoryPath))->map(function ($file) use ($directoryPath) {
            return str_replace($directoryPath . '/', '', $file->getRelativePathname());
        })->toArray();
    }

    function Sponserimages($subdomain) {
        $directoryPath = public_path('asset/image/'.$subdomain.'//Sponserimg/');

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
        $Conferenceimages = Conferenceimages($subdomain);
        if($Conferenceimages == null){
            $Conferenceimages = "0";
        }
        $Sponserimages = Sponserimages($subdomain);
        if($Sponserimages == null){
            $Sponserimages = "0";
        }

        $details = [
            'ConferenceName' => "المؤتمر الهندسي الخامس",
            'ConferenceTo' => "لنقابة المهن الهندسية بالزاوية",
            'Syndicatetext' => "الهندسة والذكاء الإصطناعي في تحقيق التنمية المستدامة لبناء الدولة",
            'ConferenceDate' => "2025-12-14",
            'ConferenceIntroduction' => "في ظل التطورات المتسارعة التي يشهدها العالم في مجالات التكنولوجيا والذكاء الاصطناعي، أصبح من الضروري مواكبة هذه التطورات من خلال الأبحاث الهندسية المبتكرة. يأتي هذا المؤتمر الخامس لنقابة المهن الهندسية تحت عنوان “الهندسة والذكاء الاصطناعي: ابتكارات نحو مستقبل مستدام وذكي” ليكون منبرًا علميًا يتيح للباحثين والمختصين مناقشة أحدث التطبيقات والحلول التقنية والهندسية التي تسهم في بناء مستقبل أكثر استدامة وذكاءً.
      يهدف هذا المؤتمر إلى الجمع بين الخبرات العلمية والهندسية لدراسة التحديات الحالية واستشراف الفرص المستقبلية لتطوير البنى التحتية، الطاقة المتجددة، والصناعات الهندسية باستخدام تقنيات الذكاء الاصطناعي، بما يتوافق مع أهداف التنمية المستدامة.",
            'Conferenceimages' => $Conferenceimages,
            'Sponserimages' => $Sponserimages
        ];


        $arrPass = [
            'kaydomain' => $subdomain,
            'backgroundimages' => $backgroundimages,
            'logoimages' => $logoimages,
            ...$details
        ];

        return view('pages.home', $arrPass); 
        // return response()->json($arrPass );
        // return response()->json('dw');

    });

});
