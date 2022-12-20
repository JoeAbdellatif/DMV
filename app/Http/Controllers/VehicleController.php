<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Category;
use App\Models\Horsepowers;
use App\Models\ModelsYear;
use App\Models\VehiclesCode;
class VehicleController extends Controller
{
    //
    public function index(){
        $Vehicle = Vehicle::join('vehicles_codes', 'VehicleCode', '=', 'vehicles_codes.id')
        ->join('models_years', 'ModelYear', '=', 'models_years.id')
        ->join('horsepowers', 'Horsepower', '=', 'horsepowers.id')
        ->join('categories', 'Category', '=', 'categories.id')
        ->select('horsepowers.powers as powers','categories.CategoryName as CategoryName','vehicles_codes.CodeName as CodeName','models_years.years as years','Name','FatherName','MotherName','Platenumber','vehicles.id')
        ->where( 'vehicles.isDeleted', '=', 0)
        ->get();
        $categories = Category::all();
        $Horsepowers = Horsepowers::all();
        $ModelsYear = ModelsYear::all();
        $VehiclesCode = VehiclesCode::all();
        return view('Admin/Vehicle',compact('Vehicle','categories','Horsepowers','ModelsYear','VehiclesCode'));
    }

    public function getVehicleById($id){
        $Vehicle = Vehicle::join('vehicles_codes', 'VehicleCode', '=', 'vehicles_codes.id')
        ->join('models_years', 'ModelYear', '=', 'models_years.id')
        ->join('horsepowers', 'Horsepower', '=', 'horsepowers.id')
        ->join('categories', 'Category', '=', 'categories.id')
        ->select('horsepowers.powers as powers','categories.CategoryName as CategoryName','MotorLicense','vehicles_codes.CodeName as CodeName','models_years.years as years','vehicles.id','Name','FatherName','MotherName','PhoneNumber','Address','Platenumber','Model','color','EngineSerialNumber','StructureNo','RegistrationDate','FirstRegistrationDate')
        ->where('vehicles.id','=',$id)
        ->first();
        return view('Admin/VehicleDetails',compact('Vehicle'));
    }

    public function AddVehicle (Request $request)
    {
        $request -> validate([
            'Name'=> 'required',
            'FatherName'=> 'required',
            'MotherName'=> 'required',
            'Address'=> 'required',
            'PhoneNumber' => 'required | max:8 | min :8',
            'Platenumber'=> 'required',
            'codeId'=> 'required',
            'Model'=> 'required',
            'MotorLicense'=> 'required',
            'CatId'=> 'required',
            'powerId'=> 'required',
            'modelId'=> 'required',
            'color'=> 'required',
            'EngineSerialNumber'=> 'required',
            'StructureNo'=> 'required',
            'RegistrationDate'=> 'required',
            'RegistrationDate'=> 'required'
        ]);
     $verify = Vehicle::where('Platenumber','=',$request->input('Platenumber'))->first();

     if($verify ==null)
     {
       $Vehicle=new Vehicle();
       $Vehicle->Name=$request->input('Name');
       $Vehicle->FatherName=$request->input('FatherName');
       $Vehicle->MotherName=$request->input('MotherName');
       $Vehicle->PhoneNumber=$request->input('PhoneNumber');
       $Vehicle->Address=$request->input('Address');
       $Vehicle->Platenumber= $request->input('Platenumber');
       $Vehicle->Model=$request->input('Model');
       $Vehicle->VehicleCode=$request->input('codeId');
       $Vehicle->ModelYear= $request->input('modelId');
       $Vehicle->Horsepower=$request->input('powerId');
       $Vehicle->Category=$request->input('CatId');
       $Vehicle->color= $request->input('color');
       $Vehicle->EngineSerialNumber=$request->input('EngineSerialNumber');
       $Vehicle->StructureNo=$request->input('StructureNo');
       $Vehicle->RegistrationDate= $request->input('RegistrationDate');
       $Vehicle->FirstRegistrationDate= $request->input('FirstRegistrationDate');

       if ($request->hasfile('MotorLicense')) {
        $file = $request->file('MotorLicense');
        $extension = $file->getClientOriginalExtension();
        $filename = time()."." .$extension;
        $destinationPath = 'uploads/avatar/';
        $file->move($destinationPath, $filename);
        $Vehicle->MotorLicense=$filename;
        }
        $Vehicle->isDeleted=0;
        $Vehicle->save();
        return redirect()->back()->with('VehAdded','Vehicle added successfuly!');
     }
     else{
        return redirect()->back()->with('VehCancelet','Vehicle not added successfuly');
     }
    }

    public function DeleteVehicle(Request $request)
    {
        $vehicle=Vehicle::where('id','=',$request->input('Id'))->first();
        $vehicle->isDeleted=1;
        $vehicle->save();
        return redirect()->back()->with('VehDeleted','Vehicle deleted successfuly!');
    }
}
