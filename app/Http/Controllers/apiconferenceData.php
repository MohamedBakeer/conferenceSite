<?php

namespace App\Http\Controllers;

use App\Models\conferenceData;
use Illuminate\Http\Request;

class apiconferenceData extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index($subdomain)
    {
        //
        //$subdomain = "fifth";
        $conferenceData = conferenceData::where("SubDomainConference", $subdomain)->get();
        if ($conferenceData->isEmpty()) {
            return response()->json('No Conference Data', 404);
        } else {
            return response()->json($conferenceData, 200);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $subdomain)
    {
        try {
            $validated = $request->validate([
                'nameConference' => 'required|string|max:255|unique:conference_data,nameConference',
                'SubDomainConference' => 'required|string|max:255|unique:conference_data,SubDomainConference',
            ]);

            $data = [
                'nameConference' => $validated['nameConference'],
                'SubDomainConference' => $validated['SubDomainConference'],
                'dateConference' => $request->input('dateConference'),
                'activationConference' => 'active',
                'Receivingpapers' => 'inactive',
            ];
            $result = conferenceData::create($data);
            return response()->json(['message' => "Conference Created"], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $subdomain)
    {
        try {
            $conference = conferenceData::where('SubDomainConference', $subdomain)->first();

            if (!$conference) {
                return response()->json(['message' => 'Conference not found'], 404);
            }

            $updateData = [];

            if ($request->has('nameConference')) {
                $request->validate([
                    'nameConference' => 'string|max:255|unique:conference_data,nameConference,' . $conference->id,
                ]);
                $updateData['nameConference'] = $request->input('nameConference');
            }

            if ($request->has('activationConference')) {
                $request->validate([
                    'activationConference' => 'in:active,inactive',
                ]);
                $updateData['activationConference'] = $request->input('activationConference');
            }

            if ($request->has('Receivingpapers')) {
                $request->validate([
                    'Receivingpapers' => 'in:active,inactive',
                ]);
                $updateData['Receivingpapers'] = $request->input('Receivingpapers');
            }

            if ($request->has('dateConference')) {
                
                $updateData['dateConference'] = $request->input('dateConference');
            }

            if (empty($updateData)) {
                return response()->json(['message' => 'No valid data to update'], 400);
            }

            $conference->update($updateData);

            return response()->json($conference, 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
