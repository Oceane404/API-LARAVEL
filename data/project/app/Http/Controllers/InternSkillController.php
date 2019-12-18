<?php

namespace App\Http\Controllers;

use app\InternSkill
use Illuminate\Http\Request;


class InternSkillController extends Controller
{
    public function attach() {
        $intern = Intern::find($intern_id);
        $intern->skills()->attach($skill_id);
    }


    public function index() {
        $skills=Skill::All();
            return response()->json([
            'state'=>'success',
            'description'=> $skills
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

if ($validator->fails()){

    return response()->json([
        'state'=>'error',
        'message'=> $validator->errors()
    ]);

        }else{
            $skill = new Skill([
                'name' => $request->name,
            ]);
            $skill->save();
                return response()->json([
                'state'=> 'success',
                'description'=> $skill
            ]);
        }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //transformation des résultats en Json
        $intskill = Skill::find($skill);
            return response()->json([
                'state'=> 'success',
                'description'=> $intskill
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
  
    
    public function update(Request $request, Skill $skill)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

if ($validator->fails()){
    //return redirect('post/create')
    //->withErrors($validator);
    //->withInput();

    return response()->json([
        'state'=>'error',
        'message'=> $validator->errors()
    ]);

        }else{
        $skills = Skill::find($skill);
       
        $skill->name = $request->name;
        

        $skill->save();
    }
    
        return response()->json([
        'state' => 'success',
        'message' => 'compétence modifiée',

    ]);

}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skills = Skill::find($skill);
        $skills->delete();

        //
        return response()->json([
            'state' => 'success',
            'message' => 'compétence annulée'
  
        ]);    
    }
}
