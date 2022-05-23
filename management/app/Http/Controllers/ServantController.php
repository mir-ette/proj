<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Hash;
use App\Models\Servant;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\UserNotDefinedException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facedes\Auth;
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
  /////////////////////////////////register



  public function register(Request $request)
  {
      $servant = Servant ::where('email',$request['email'])->first();
      if($servant)
          
    {  
      $response['status']=0;
      $response['message']='email already exists';
      $response['code']=409;
     }
     //if not exists 
      else{
          $servant = Servant ::create([
              'name' =>$request-> name,
              'email'=>$request-> email,
              'password'=>bcrypt($request->password),
              'national_id'=>$request-> national_id,
              'wsp'=>$request->wsp,
              'phone_no'=>$request->phone_no,
              'church_name'=>$request->church_name,
              //'street'=>$request->street,
              'role'=>$request->role
             
          ]);
  
          $response['status']=1;
          $response['message']='done';
          $response['code']=200;
      }
     
      return response()->json($response);
      
  }
  /////////////////////////////////////////////////login

  public function login(Request $request)
  {
   $credentials = $request->only('email','password');
      try{
          // if email & pass incoreect
          if(!JWTAuth::attempt($credentials))
     
          {
              $response['status']=0;
              $response['code']=401;
              $response['data']=null;
              $response['message']='email or password is incorrect';
              return response()->json($response);
          }


      } catch(JWTExceptions $e){
          $response['data']=null;
          $response['code']=500;
          $response['message']='could Not create Token';
          return response()->json($response);
      }


      
  //    if email & pass successfully
      $servant = auth()->servant();
      $data['token']=auth()->claims([
          'national_id' => $servant->national_id,               // 
          'servant_id' => $servant-> id,
          'wsp' => $servant-> wsp,
          'phone_no' => $servant-> phone_no,
          'email' => $servant-> email,
          'role'=>$servant-> role,
          'church_name'=>$servant-> church_name
      // $servant = auth()->user();
      // $data['token']=auth()->claims([
      //             // 
      //     'user_id' => $servant-> id,
      //     'email' => $servant-> email,
      //     'role'=>$servant-> role
      ])->attempt($credentials);

      $response['data']= $data;
      $response['status']=1;
      $response['code']=200;
      $response['message']='login successfully';
      return response()->json($response);
  }









}
