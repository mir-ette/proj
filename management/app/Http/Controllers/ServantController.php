<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servant;
class ServantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }
    public function getServant()
    {
      return response()->json(Servant::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }
    public function getServantById($id)
    {
      $servant = Servant::find($id);
      if (is_null($servant)) {
        return response()->json(['message' => 'Servant Not Found'], 404);
      }
  
      return response()->json($servant, 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }
 public function addServant(Request $request)
   {
 
     $servant = Servant::create($request->all());
      return response($servant,201);
 
   }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    // public function update(Request $request, $id)
    // {
    //     //
    // }
    public function updateServant(Request $request,$id)
    {
  
      $servant = Servant::find($id);
      if(is_null($servant)){
        return response()->json(['message'=>'Servant Not Found'],404);
      }
      $servant->update($request->all());
      return response($servant,200);
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
    public function deleteServant(Request $request,$id)
    {   
       $servant = Servant::find($id);
       if(is_null($servant)){
        return response()->json(['message'=>'Servant Not Found'],404);
    }
  
    $servant->delete();
    return response()->json(null,204);
  }
}
