<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\home_page_details;
use App\Models\important_dates;
use Illuminate\Http\Request;

class apihomePageDetails extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($subdomain)
    {
        //$subdomain = "fifth";
        $homePageDetails = home_page_details::where("SubDomainConference", $subdomain)->get();
        if ($homePageDetails->isEmpty()) {
            return response()->json('No home Page Details', 404);
        } else {
            return response()->json($homePageDetails, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $subdomain)
    {

        try {
            $validated = $request->validate([
                'SubDomainConference' => 'required|string|max:255|unique:home_page_details,SubDomainConference',
                'themeConference' => 'string',
                'themeConference_en' => 'string',
                'introductionConference' => 'string',
                'introductionConference_en' => 'string'
            ]);

            $data = [
                'SubDomainConference' => $validated['SubDomainConference'],
                'themeConference' => $validated['themeConference'],
                'themeConference_en' => $validated['themeConference_en'],
                'introductionConference' => $validated['introductionConference'],
                'introductionConference_en' => $validated['introductionConference_en'],
                'partnersConference' => $request->input('partnersConference'),
                'partnersConference_en' => $request->input('partnersConference_en')
            ];
            $result = home_page_details::create($data);
            return response()->json("home Page Details Created", 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(), 500);
        }
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
    public function update(Request $request, $subdomain)
    {
        try {
            $homePageDetails = home_page_details::where('SubDomainConference', $subdomain)->first();

            if (!$homePageDetails) {
                return response()->json(['message' => 'Conference not found'], 404);
            }

            $updateData = [];

            if ($request->has('themeConference')) {
                $request->validate([
                    'themeConference' => 'string',
                ]);
                $updateData['themeConference'] = $request->input('themeConference');
            }

            if ($request->has('themeConference_en')) {
                $request->validate([
                    'themeConference_en' => 'string',
                ]);
                $updateData['themeConference_en'] = $request->input('themeConference_en');
            }

            if ($request->has('introductionConference')) {
                $request->validate([
                    'introductionConference' => 'string'
                ]);
                $updateData['introductionConference'] = $request->input('introductionConference');
            }

            if ($request->has('introductionConference_en')) {
                $request->validate([
                    'introductionConference_en' => 'string'
                ]);
                $updateData['introductionConference_en'] = $request->input('introductionConference_en');
            }


            if ($request->has('partnersConference')) {
                $updateData['partnersConference'] = $request->input('partnersConference');
            }

            if ($request->has('partnersConference_en')) {
                $updateData['partnersConference_en'] = $request->input('partnersConference_en');
            }

            if (empty($updateData)) {
                return response()->json(['message' => 'No valid data to update'], 400);
            }

            $homePageDetails->update($updateData);

            return response()->json($homePageDetails, 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // important_dates  -  ⌛ مواعيد مهمة :

    public function important_dates_index($subdomain)
    {
        //
        //$subdomain = "fifth";
        $homePageDetails = important_dates::where("SubDomainConference", $subdomain)->get();
        if ($homePageDetails->isEmpty()) {
            return response()->json('No dates', 404);
        } else {
            return response()->json($homePageDetails, 200);
        }
    }

    public function important_dates_store(Request $request, $subdomain)
    {
        try {
            $data = [
                'SubDomainConference' => $subdomain,
                'event' => $request->input('event'),
                'event_en' => $request->input('event_en')
            ];
            $result = important_dates::create($data);
            return response()->json("important Dates Store Created", 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(), 500);
        }
    }

    public function important_dates_update(Request $request, $subdomain)
{
    try {
        // تحقق من وجود السجل مع الساب دومين
        $importantDate = important_dates::where('id', '=', $request->input('id'))->first();

        if (!$importantDate) {
            return response()->json("Important date not found.", 404);
        }

        // تحديث الحقول المطلوبة فقط
        if ($request->has('event')) {
            $importantDate->event = $request->input('event');
        }

        if ($request->has('event_en')) {
            $importantDate->event_en = $request->input('event_en');
        }

        $importantDate->save();

        return response()->json("Important date updated successfully.", 200);
    } catch (\Throwable $th) {
        return response()->json($th->getMessage(), 500);
    }
}


    public function important_dates_delete(Request $request, $subdomain)
    {
        try {
            $data = [
                'id' => $request->input('id')
            ];
            $result = important_dates::where($data)->delete();

            if ($result) {
                return response()->json("Important date deleted successfully.", 200);
            } else {
                return response()->json("Important date not found.", 404);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }


}
