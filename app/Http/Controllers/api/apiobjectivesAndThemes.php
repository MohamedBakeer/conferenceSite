<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\objectives;
use App\Models\SubTopic;
use App\Models\Topic;
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
                'title' => $request->input('title'),
                'title_en' => $request->input('title_en')
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
    public function updateObjectives(Request $request, string $id)
    {
        try {
            // تحقق من وجود السجل مع الساب دومين
            $objectives = objectives::where('id', '=', $request->input('id'))->first();
    
            if (!$objectives) {
                return response()->json("objectives date not found.", 404);
            }
    
            // تحديث الحقول المطلوبة فقط
            if ($request->has('title')) {
                $objectives->title = $request->input('title');
            }
    
            if ($request->has('title_en')) {
                $objectives->title_en = $request->input('title_en');
            }
    
            $objectives->save();
    
            return response()->json("objectives date updated successfully.", 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
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
    public function indexThemes($subdomain)
    {
        //
        //$subdomain = "fifth";
        $Topic = Topic::where("SubDomainConference", $subdomain)->get();
        if ($Topic->isEmpty()) {
            return response()->json('No dates', 404);
        } else {
            return response()->json($Topic, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeThemes(Request $request , $subdomain)
    {
        //
        try {
            $data = [
                'SubDomainConference' => $subdomain,
                'title' => $request->input('title'),
                'title_en' => $request->input('title_en')
            ];
            $result = Topic::create($data);
            return response()->json("Topic Dates Store Created", 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function updateThemes(Request $request, string $id)
    {
        //
        try {
            // تحقق من وجود السجل مع الساب دومين
            $Topic = Topic::where('id', '=', $request->input('id'))->first();
    
            if (!$Topic) {
                return response()->json("Topic date not found.", 404);
            }
    
            // تحديث الحقول المطلوبة فقط
            if ($request->has('title')) {
                $Topic->title = $request->input('title');
            }
    
            if ($request->has('title_en')) {
                $Topic->title_en = $request->input('title_en');
            }
    
            $Topic->save();
    
            return response()->json("Topic date updated successfully.", 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function deleteThemes(Request $request, string $id)
    {
        //
        try {
            $data = [
                'id' => $request->input('id')
            ];
            $result = Topic::where($data)->delete();
            $result_sub_topic = SubTopic::where($data)->delete();
            if ($result) {
                return response()->json("Topic date deleted successfully.", 200);
            } else {
                return response()->json("Topic date not found.", 404);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }


    // sub_dopic ----------------------------------

    public function index_sub_dopic(Request $request)
    {
        //
        //$subdomain = "fifth";
        $SubTopic = SubTopic::where("topic_id", $request->input("topic_id"))->get();
        if ($SubTopic->isEmpty()) {
            return response()->json('No dates', 404);
        } else {
            return response()->json($SubTopic, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_sub_dopic(Request $request , $subdomain)
    {
        //
        try {
            $data = [
                'topic_id' => $request->input('topic_id'),
                'title' => $request->input('title'),
                'title_en' => $request->input('title_en')
            ];
            $result = SubTopic::create($data);
            return response()->json("SubTopic Dates Store Created", 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function update_sub_dopic(Request $request, string $id)
    {
        //
        try {
            // تحقق من وجود السجل مع الساب دومين
            $SubTopic = SubTopic::where('id', '=', $request->input('id'))->first();
    
            if (!$SubTopic) {
                return response()->json("SubTopic date not found.", 404);
            }
    
            // تحديث الحقول المطلوبة فقط
            if ($request->has('title')) {
                $SubTopic->title = $request->input('title');
            }
    
            if ($request->has('title_en')) {
                $SubTopic->title_en = $request->input('title_en');
            }
    
            $SubTopic->save();
    
            return response()->json("SubTopic date updated successfully.", 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function delete_sub_dopic(Request $request, string $id)
    {
        //
        try {
            $data = [
                'id' => $request->input('id')
            ];
            $result_sub_topic = SubTopic::where($data)->delete();
            if ($result_sub_topic) {
                return response()->json("result_sub_topic date deleted successfully.", 200);
            } else {
                return response()->json("result_sub_topic date not found.", 404);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

}
