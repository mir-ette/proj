<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
class ApplicationController extends Controller
{
    ///////////////////////get
    public function getApplication()
    {
      return response()->json(Application::all(), 200);
    }
  
/////////////////////////////////////////////update

    public function updateApplication(Request $request,$id)
    {
  
      $application = Application::find($id);
      if(is_null($application)){
        return response()->json(['message'=>'Application Not Found'],404);
      }
      $application->update($request->all());
      return response($application,200);
    }
  //////////////////////////////delete
  public function deleteApplication(Request $request,$id)
  {   
     $application = Application::find($id);
     if(is_null($application)){
      return response()->json(['message'=>'Application Not Found'],404);
  }

  $application->delete();
  return response()->json(null,204);
}
////////////////////////////////////////////byid
public function getApplicationById($id)
{
  $application = Application::find($id);
  if (is_null($application)) {
    return response()->json(['message' => 'Application Not Found'], 404);
  }

  return response()->json($application, 200);
}
}
