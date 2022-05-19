<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class CourseController extends Controller
{
    
      ///////////////////////get
      public function getCourse()
      {
        return response()->json(Course::all(), 200);
      }
    
  /////////////////////////////////////////////update
  
      public function updateCourse(Request $request,$id)
      {
    
        $course = Course::find($id);
        if(is_null($course)){
          return response()->json(['message'=>'Course Not Found'],404);
        }
        $course->update($request->all());
        return response($course,200);
      }
    //////////////////////////////delete
    public function deleteCourse(Request $request,$id)
    {   
       $course = Course::find($id);
       if(is_null($course)){
        return response()->json(['message'=>'Course Not Found'],404);
    }
  
    $course->delete();
    return response()->json(null,204);
  }
  ////////////////////////////////////////////byid
  public function getCourseById($id)
  {
    $course = Course::find($id);
    if (is_null($course)) {
      return response()->json(['message' => 'Course Not Found'], 404);
    }
  
    return response()->json($course, 200);
  }
}
