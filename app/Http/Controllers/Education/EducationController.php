<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Controller;
use App\Http\Requests\Education\StoreEducationRequest;
use App\Http\Resources\Education\EducationResource;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education = Education::all();
        $education = EducationResource::collection($education);
        return $education;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEducationRequest $request)
    {
        try {
            $education = new Education();
            $education->date = $request->date;
            $education->address = $request->address;
            $education->title = $request->title;
            $education->address = $request->address;
            $education->technologies = $request->technologies;
            $education->save();
            return $education;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $education = Education::findOrFail($id);
            return new EducationResource($education);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       try{
            $education = Education::findOrFail($id);

        if ($request->has('date')) {
            $education->date=$request->date;

        } if ($request->has('address')){
            $education->address=$request->address;

        } if ($request->has('title')) {
            $education->title=$request->title;

        } if ($request->has('technologies')) {
            $education->technologies=$request->technologies;

        }
        $education->save();
        return new EducationResource($education);
    }catch(\Exception $e){

        return response()->json(['message' => $e->getMessage()], 500);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Education::find($id);
        $education->delete();
        return 'education deleted successfully';
    }
}
