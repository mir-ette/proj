<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
class ExperienceController extends Controller
{
   
      ///////////////////////get
      public function getExperience()
      {
        return response()->json(Course::all(), 200);
      }
    
  /////////////////////////////////////////////update
  
      public function updateExperience(Request $request,$id)
      {
    
        $experience = Experience::find($id);
        if(is_null($experience )){
          return response()->json(['message'=>'Experience Not Found'],404);
        }
        $experience ->update($request->all());
        return response($experience ,200);
      }
    //////////////////////////////delete
    public function deleteExperience(Request $request,$id)
    {   
       $experience  = Experience::find($id);
       if(is_null($experience )){
        return response()->json(['message'=>'Experience Not Found'],404);
    }
  
    $experience ->delete();
    return response()->json(null,204);
  }
  ////////////////////////////////////////////byid
  public function getExperienceById($id)
  {
    $experience  = Experience::find($id);
    if (is_null($experience )) {
      return response()->json(['message' => 'Experience Not Found'], 404);
    }
  
    return response()->json($experience , 200);
  }
}
