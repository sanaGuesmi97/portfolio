<?php

namespace App\Http\Controllers\Data_Base;

use App\Http\Controllers\Controller;
use App\Http\Resources\Data_Base\DataBaseResource;
use App\Http\Resources\Framework\FrameworkResource;
use App\Models\Data_Base;
use Illuminate\Http\Request;

class DataBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataBase = Data_Base::all();
        $dataBase =DataBaseResource::collection($dataBase);
        return $dataBase;
    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $dataBase = new Data_Base();
            $dataBase->sql = $request->sql;
            $dataBase->nosql = $request->nosql;
            $dataBase->save();
            return $dataBase;

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
            $dataBase = Data_Base::findOrFail($id);
            return new DataBaseResource($dataBase);
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
        try {
            $dataBase = Data_Base::findOrFail($id);

            if ($request->has('sql')) {
                $dataBase->sql = $request->sql;
            }
            if ($request->has('nosql')) {
                $dataBase->nosql = $request->nosql;
            }
            $dataBase->save();
            return new DataBaseResource($dataBase);

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
        $dataBase = Data_Base::find($id);
        $dataBase->delete();
        return 'dataBase deleted successfully';
    }
}
