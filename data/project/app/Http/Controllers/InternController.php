<?php

namespace App\Http\Controllers;

use App\Intern;
use Validator;
use Illuminate\Http\Request;

class InternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interns=Intern::All();
        return response()->json([
            'state'=>'success',
            'description'=> $interns
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer|max:255',
            'phone_number' => 'required|unique:interns|max:255',
            'email' => 'required|email|max:255'
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
            $intern = new Intern([
                'firstname' => $request->lastname,
                'lastname' => $request->firstname,
                'age' => $request->age,
                'phone_number' => $request->phone_number,
                'email' => $request->email
            ]);
            $intern->save();
                return response()->json([
                'state'=> 'success',
                'description'=> $intern
            ]);
        }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Intern  $intern
     * @return \Illuminate\Http\Response
     */
    public function show(Intern $intern)
    {
        //transformation des résultats en Json
        $apprenant = Intern::find($intern);
            return response()->json([
                'state'=> 'success',
                'description'=> $apprenant
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Intern  $intern
     * @return \Illuminate\Http\Response
     */
  
    
    public function update(Request $request, Intern $intern)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer|max:255',
            'phone_number' => 'required|unique:interns|max:255',
            'email' => 'required|email|max:255'
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
        $interns = Intern::find($intern);
       
        $intern->firstname = $request->firstname;
        $intern->lastname = $request->lastname;
        $intern->age = $request->age;
        $intern->phone_number = $request->phone_number;
        $intern->email = $request->email;

        $intern->save();
    }
    
        return response()->json([
        'state' => 'success',
        'message' => 'apprenant modifié',

    ]);

}

   /* function update($empData){ 		
        if($empData["id"]) {
            $empFirstName=$empData["empFirstName"];
            $empLastName=$empData["empLastName"];
            $empAge=$empData["empAge"];
            $empPhone=$empData["empPhone"];
            $empEmail=$empData["empEmail"];		
            
            $empQuery="
                UPDATE ".$this->empTable." 
                SET firstname='".$empFirstName."', lastname='".$empLastName."',age='".$empAge."', phone_number='".$empPhone."', email='".$empEmail."' 
                WHERE id = '".$empData["id"]."'";
                echo $empQuery;
            if( mysqli_query($this->dbConnect, $empQuery)) {
                $message = "Apprenant updated successfully.";
                $status = 1;			
            } else {
                $message = "Apprenant update failed.";
                $status = 0;			
            }
        } else {
            $message = "Invalid request.";
            $status = 0;
        }
        $empResponse = array(
            'status' => $status,
            'status_message' => $message
        );
        header('Content-Type: application/json');
        echo json_encode($empResponse);
    }
    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Intern  $intern
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intern $intern)
    {
        $interns = Intern::find($intern);
        $intern->delete();

        //
        return response()->json([
            'state' => 'success',
            'message' => 'apprenant effacé',

            /* si erreur integrity constraint violation : Dans create_intern_skill_table.php :
            dans public function up() ajouter ->onDelete :::
    {
        Schema::create('intern_skill', function (Blueprint $table) {
            $table->unsignedBigInteger('intern_id');
            $table->foreign('intern_id')->references('id')->on('interns')->onDelete('cascade');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
        });

        PUIS DANS TERMINAL : PHP ARTISAN MIGRATE:FRESH --SEED
    
    }
*/    
        ]);    
    }
}
