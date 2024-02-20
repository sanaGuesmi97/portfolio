<?php

namespace App\Http\Controllers;

use App\Http\Requests\Experience\StoreExperienceRequest;
use App\Http\Requests\Experience\UpdateExperienceRequest;
use App\Http\Resources\Experience\ExperienceResource;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experience = Experience::all();
        $experience = ExperienceResource::collection($experience);
        return $experience;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExperienceRequest $request)
    {
        try {
            $experience = new Experience();
            $experience->date = $request->date;
            $experience->title = $request->title;
            $experience->small_description = $request->smallDescription;
            $experience->address = $request->address;
            $experience->description = $request->description;
            $experience->technologies = $request->technologies;
            $experience->link = $request->link;
           
            $experience->save();
            return $experience;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $experience = Experience::findOrFail($id);
            return new ExperienceResource($experience);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        ;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExperienceRequest $request, $id)
    {
        try{
            $experience = Experience::findOrFail($id);

        if ($request->has('date')) {
            $experience->date=$request->date;

        } if ($request->has('title')){
            $experience->title=$request->title;

        } if ($request->has('smallDescription')) {
            $experience->small_description=$request->smallDescription;

        } if ($request->has('address')) {
            $experience->address=$request->address;

        } if ($request->has('description')) {
            $experience->description=$request->description;

        } if ($request->has('technologies')) {
            $experience->technologies=$request->technologies;

        }if ($request->has('link')) {
            $experience->link=$request->link;
        }
        $experience->save();
        return new ExperienceResource($experience);
    }catch(\Exception $e){

        return response()->json(['message' => $e->getMessage()], 500);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience = Experience::find($id);
        $experience->delete();
        return 'experience deleted successfully';
    }
}
