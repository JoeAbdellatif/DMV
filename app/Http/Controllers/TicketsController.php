<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\TicketInfo;
use App\Models\Vehicle;
use App\Models\TicketType;
use App\Models\Contact;
use App\Models\VehiclesCode;

class TicketsController extends Controller
{
    //
    public function index(){
        $Ticket = TicketInfo::join('vehicles', 'VehicleNo', '=', 'vehicles.id')
        ->join('ticket_types', 'Type', '=', 'ticket_types.id')
        ->join('vehicles_codes', 'vehicles.VehicleCode', '=', 'vehicles_codes.id')
        ->select('ticket_types.TypeName as TypeName','vehicles.Platenumber as Platenumber','vehicles_codes.CodeName as CodeName','Amount','ExpiryDate','ticket_infos.id')
        ->where( 'vehicles.isDeleted', '=', 0)
        ->get();
        $TicketType = TicketType::all();
        $Vehicle = Vehicle::join('vehicles_codes', 'VehicleCode', '=', 'vehicles_codes.id')
        ->join('models_years', 'ModelYear', '=', 'models_years.id')
        ->join('horsepowers', 'Horsepower', '=', 'horsepowers.id')
        ->join('categories', 'Category', '=', 'categories.id')
        ->select('horsepowers.powers as powers','categories.CategoryName as CategoryName','vehicles_codes.CodeName as CodeName','models_years.years as years','Name','FatherName','MotherName','Platenumber','vehicles.id')
        ->where( 'vehicles.isDeleted', '=', 0)
        ->get();
        return view('Admin/Tickets',compact('Ticket','TicketType','Vehicle'));
    }

    public function indexUser(){
        $Ticket = TicketInfo::join('vehicles', 'VehicleNo', '=', 'vehicles.id')
        ->join('ticket_types', 'Type', '=', 'ticket_types.id')
        ->join('vehicles_codes', 'vehicles.VehicleCode', '=', 'vehicles_codes.id')
        ->select('ticket_types.TypeName as TypeName','vehicles.Platenumber as Platenumber','vehicles_codes.CodeName as CodeName','Amount','ExpiryDate','ticket_infos.id')
        ->where( 'vehicles.isDeleted', '=', 0)
        ->get();
        $TicketType = TicketType::all();
        $Vehicle = Vehicle::join('vehicles_codes', 'VehicleCode', '=', 'vehicles_codes.id')
        ->join('models_years', 'ModelYear', '=', 'models_years.id')
        ->join('horsepowers', 'Horsepower', '=', 'horsepowers.id')
        ->join('categories', 'Category', '=', 'categories.id')
        ->select('horsepowers.powers as powers','categories.CategoryName as CategoryName','vehicles_codes.CodeName as CodeName','models_years.years as years','Name','FatherName','MotherName','Platenumber','vehicles.id')
        ->where( 'vehicles.isDeleted', '=', 0)
        ->get();
        $VehiclesCode = VehiclesCode::all();
        return view('checkTicket',compact('Ticket','TicketType','Vehicle','VehiclesCode'));
    }

    public function SubmitForm (Request $request){
        $request -> validate([
            'name'=> 'required',
            'email'=> 'required',
            'subject'=> 'required',
            'message'=> 'required'
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        $contact=new Contact();
        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->subject=$request->input('subject');
        $contact->message=$request->input('message');
        $contact->save();
        return redirect()->back()->with('ContactAdded','Thank you for contacting us!');
    }
    public function indexContact (){
        $Contact = Contact::all();
        return view('Admin/AdminDashboard',compact('Contact'));
    }

    public function CheckForTickets (Request $request){
        $request -> validate([
            'VehiclesCode'=> 'required',
            'Platenumber'=> 'required'
        ]);
        $Platenumber = $request->input('Platenumber');
        $VehicleCode = $request->input('VehiclesCode');

            $Vehicle = Vehicle::join('vehicles_codes', 'vehicles.VehicleCode', '=', 'vehicles_codes.id')
            ->select('vehicles.Platenumber','vehicles.id','vehicles.VehicleCode','vehicles_codes.CodeName as CodeName')
            ->where('vehicles.Platenumber', '=', $Platenumber)
            ->where('vehicles.VehicleCode', '=', $VehicleCode)
            ->where( 'vehicles.isDeleted', '=', 0)
            ->get();
            $VehiclesCode = VehiclesCode::all();
            if ($Vehicle->count() > 0) {

                foreach($Vehicle as $v){
                    $VehId = $v->id ;
                }
                $Ticket = TicketInfo::join('vehicles', 'VehicleNo', '=', 'vehicles.id')
                    ->join('ticket_types', 'Type', '=', 'ticket_types.id')
                    ->join('vehicles_codes', 'vehicles.VehicleCode', '=', 'vehicles_codes.id')
                    ->select('ticket_types.TypeName as TypeName','vehicles.Platenumber as Platenumber','vehicles_codes.CodeName as CodeName','Amount','ExpiryDate','ticket_infos.id')
                    ->where( 'vehicles.isDeleted', '=', 0)
                    ->where( 'vehicles.id', '=', $VehId)
                    ->get();

                $TicketCount= $Ticket->count();
                if ($TicketCount > 0) {
                    $VehFound = 'We found the following ticket for this vehicle.';
                    return view('checkTicket',compact('Vehicle','VehiclesCode','VehFound','Ticket','TicketCount'));
                }else{
                    $VehFoundNoTicket = 'There is no Ticket for this vehicle :';
                    return view('checkTicket',compact('VehiclesCode','VehFoundNoTicket','Vehicle'));

                }

            } else {
                $VehNotFound = 'Vehicle not Found!';
                return view('checkTicket',compact('VehiclesCode','VehNotFound'));
            }



    }

    public function AddTicket (Request $request)
    {
        $request -> validate([
            'VehicleNo'=> 'required',
            'TicketType'=> 'required',
            'Amount'=> 'required',
            'ExpiryDate'=> 'required',
            'Reason'=> 'required',
        ]);



       $Ticket=new TicketInfo();
       $Ticket->VehicleNo=$request->input('VehicleNo');
       $Ticket->Type=$request->input('TicketType');
       $Ticket->Amount=$request->input('Amount');
       $Ticket->ExpiryDate=$request->input('ExpiryDate');
       $Ticket->Reason=$request->input('Reason');
        $Ticket->isDeleted=0;
        $Ticket->save();
        return redirect()->back()->with('TicketAdded','Ticket added successfuly!');

    }


}
