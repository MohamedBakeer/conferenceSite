<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;

class apiWritingandparticipating extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($subdomain)
    {

        $basePath = public_path('asset/image/'. $subdomain . '/');
        $folders = [
            'pdfwritingtemplate' => 'Writingandparticipating/pdfwritingtemplate',
            'Paperwritingtemplate_ar' => 'Writingandparticipating/Paperwritingtemplate(ar)',
            'Paperwritingtemplate_en' => 'Writingandparticipating/Paperwritingtemplate(en)',
        ];

        $files_inside = [];

        foreach ($folders as $key => $relativePath) {
            $fullPath = $basePath . $relativePath;
            
            $files = File::files($fullPath); // يجيب فقط الملفات داخل المجلد بدون المجلدات الفرعية
            $files_inside[$key] = [];

            foreach ($files as $file) {
                $files_inside[$key][] = $file->getFilename(); // اسم الملف فقط
            }
        }

        return response()->json($files_inside);
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
