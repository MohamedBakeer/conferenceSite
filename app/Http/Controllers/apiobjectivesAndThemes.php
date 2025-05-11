<?php

namespace App\Http\Controllers;

use App\Models\objectives;
use Illuminate\Http\Request;

class apiobjectivesAndThemes extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexObjectives($subdomain)
    {
        //
        //$subdomain = "fifth";
        $objectives = objectives::where("SubDomainConference", $subdomain)->get();
        if ($objectives->isEmpty()) {
            return response()->json('No dates', 404);
        } else {
            return response()->json($objectives, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeObjectives(Request $request , $subdomain)
    {
        //
        try {
            $data = [
                'SubDomainConference' => $subdomain,
                'title' => $request->input('title')
            ];
            $result = objectives::create($data);
            return response()->json("important Dates Store Created", 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function updateObjectives(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function deleteObjectives(Request $request, string $id)
    {
        try {
            $data = [
                'id' => $request->input('id')
            ];
            $result = objectives::where($data)->delete();

            if ($result) {
                return response()->json("Important date deleted successfully.", 200);
            } else {
                return response()->json("Important date not found.", 404);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function indexThemes()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeThemes(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function updateThemes(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function deleteThemes(Request $request, string $id)
    {
        //
    }

}
