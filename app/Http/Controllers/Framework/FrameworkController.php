<?php

namespace App\Http\Controllers\Framework;

use App\Http\Controllers\Controller;
use App\Http\Requests\Framework\StoreFrameworkRequest;
use App\Http\Requests\Framework\UpdateFrameworkRequest;
use App\Http\Resources\Framework\FrameworkResource;
use App\Models\Framework;
use Illuminate\Http\Request;

class FrameworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $framework = Framework::all();
        $framework =FrameworkResource::collection($framework);
        return $framework;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFrameworkRequest $request)
    {
        try {
            $framework = new Framework();
            $framework->front_end = $request->frontEnd;
            $framework->back_end = $request->backEnd;
            $framework->save();
            return $framework;

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
            $framework = Framework::findOrFail($id);
            return new FrameworkResource($framework);
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
    public function update(UpdateFrameworkRequest $request, $id)
    {
        try {
            $framework = Framework::findOrFail($id);

            if ($request->has('frontEnd')) {
                $framework->front_end = $request->frontEnd;
            }
            if ($request->has('backEnd')) {
                $framework->front_end = $request->backEnd;
            }
            $framework->save();
            return new FrameworkResource($framework);

        } catch (\Exception $e) {

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
        $framework = Framework::find($id);
        $framework->delete();
        return 'framework deleted successfully';
    }
}
