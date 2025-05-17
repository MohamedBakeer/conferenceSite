<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class apiFolders extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function ConfigurationFolder($subdomain)
    {
        // التحقق مما إذا كان المجلد موجودًا أم لا
        $subdomainPath = public_path('asset/image/' . $subdomain);
        $originalPath = public_path('asset/image/origenal');

        if (file_exists($subdomainPath)) {
            return response()->json(['message' => 'Already initialized'], 200);
        } else {
            // إذا لم يكن المجلد موجودًا، نقوم بإنشائه
            if (!file_exists($subdomainPath)) {
                // إنشاء المجلدات الضرورية
                $directories = [
                    '/background',
                    '/Conferenceimg',
                    '/logo',
                    '/organizersandsponsors',
                    '/organizersandsponsors/organizers',
                    '/organizersandsponsors/sponsors',
                    '/organizersandsponsors/committees',
                    '/Sendresearch',
                    '/Sendresearch/Summary',
                    '/Sendresearch/Thepaper',
                    '/staticSponsors',
                    '/Thebrochure',
                    '/TheExhibitionbrochureimages',
                    '/Writingandparticipating',
                    '/Writingandparticipating/Paperwritingtemplate(ar)',
                    '/Writingandparticipating/Paperwritingtemplate(en)',
                    '/Writingandparticipating/pdfwritingtemplate',
                    '/CMT3',
                    '/CMT3/Conference',
                ];

                // إنشاء جميع المجلدات دفعة واحدة
                foreach ($directories as $directory) {
                    mkdir($subdomainPath . $directory, 0777, true);
                }
            }

            // نسخ محتويات مجلد "origenal" إلى المجلد الذي يحمل اسم الـ subdomain
            $this->copyDirectory($originalPath, $subdomainPath);

            return response()->json(['message' => 'Initialization completed'], 200);
        }

    }

    // دالة لنسخ محتويات مجلد إلى مجلد آخر
    public function copyDirectory($source, $destination)
    {
        // التأكد من وجود المجلد المصدر
        if (!is_dir($source)) {
            return;
        }


        // فتح المجلد المصدر
        $dir = opendir($source);
        // تكرار الملفات داخل المجلد المصدر
        while (($file = readdir($dir)) !== false) {
            if ($file != '.' && $file != '..') {
                $sourceFile = $source . '/' . $file;
                $destFile = $destination . '/' . $file;

                // إذا كان الملف هو مجلد، نقوم باستدعاء الدالة نفسها (التكرار)
                if (is_dir($sourceFile)) {
                    $this->copyDirectory($sourceFile, $destFile);
                } else {
                    // إذا كان الملف، نقوم بنسخه
                    copy($sourceFile, $destFile);
                }
            }
        }

        // غلق المجلد
        closedir($dir);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
