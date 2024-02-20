<?php

namespace App\Http\Controllers\Skill;

use App\Http\Controllers\Controller;
use App\Http\Resources\Skill\SkillResource;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skill = Skill::all();
        $skill = SkillResource::collection($skill);
        return $skill;
    }
    public function store(Request $request)
    {
        try {
            $skill = new Skill();
            $skill->title = $request->title;
            $skill->save();
            return $skill;
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function show($id)
    {
        try {
            $skill = Skill::findOrFail($id);
            return new SkillResource($skill);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        ;
    }
    public function update(Request $request, $id)
    {
        try{
            $skill = Skill::findOrFail($id);

        if ($request->has('title')) {
            $skill->title=$request->title;
        }
        $skill->save();
        return new SkillResource($skill);
    }catch(\Exception $e){

        return response()->json(['message' => $e->getMessage()], 500);
    }
}
public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return 'Skill deleted successfully';
    }
}
