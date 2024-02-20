<?php

namespace App\Http\Controllers\Passion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Passion\StorePassionRequest;
use App\Http\Requests\Passion\UpdatePassionRequest;
use App\Http\Resources\Passion\PassionResource;
use App\Models\Passion;
use Illuminate\Http\Request;

class PassionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passion = Passion::all();
        $passion = PassionResource::collection($passion);
        return $passion;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePassionRequest $request)
    {
        try {
            $passion = new Passion();
            $passion->title = $request->title;
            $passion->save();
            return $passion;
        }catch (\Exception $e) {
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
            $passion = Passion::findOrFail($id);
            return new PassionResource($passion);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePassionRequest $request, $id)
    {
        try{
            $passion = Passion::findOrFail($id);

        if ($request->has('title')) {
            $passion->title=$request->title;
        }
        $passion->save();
        return new PassionResource($passion);
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
        $passion = Passion::find($id);
        $passion->delete();
        return 'passion deleted successfully';
    }
    public function redirection(){
        $passion = Passion::find(1);
        return view("first-test",["passion"=>$passion]);

    }
}
