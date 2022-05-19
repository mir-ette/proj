<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
     ///////////////////////get
     public function getCompany()
     {
       return response()->json(Company::all(), 200);
     }
   
 /////////////////////////////////////////////update
 
     public function updateCompany(Request $request,$id)
     {
   
       $company = Company::find($id);
       if(is_null($company)){
         return response()->json(['message'=>'Company Not Found'],404);
       }
       $company->update($request->all());
       return response($company,200);
     }
   //////////////////////////////delete
   public function deleteCompany(Request $request,$id)
   {   
      $company = Company::find($id);
      if(is_null($company)){
       return response()->json(['message'=>'Company Not Found'],404);
   }
 
   $company->delete();
   return response()->json(null,204);
 }
 ////////////////////////////////////////////byid
 public function getCompanyById($id)
 {
   $company = Company::find($id);
   if (is_null($company)) {
     return response()->json(['message' => 'Company Not Found'], 404);
   }
 
   return response()->json($company, 200);
 }
}
