<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\user;
class UserController extends Controller
{
    //
    function login(Request $req)
    {
        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $result = user::where('email', $req->input('email'))
            ->get();

        $res = json_decode($result, true);

        if (sizeof($res) == 0) {
            $req->session()->flash('error', 'Email Id does not exist. Please register yourself first');
            echo "Email Id Does not Exist.";
            return redirect()->back()->with('alertLogin','Incorret 1Username or Password!');
        } else {
            $encrypted_password = $result[0]->password;
            $decrypted_password =  Hash::make($req->input('password'));

            if (password_verify($req->input('password'),$result[0]->password))
            {
                $req->session()->put('userid', $result[0]->id);
                $req->session()->put('useremail', $result[0]->email);
                $req->session()->put('userfirstname', $result[0]->firstName);
                $req->session()->put('userlastname', $result[0]->lastName);
                $req->session()->put('role',$result[0]->RoleId);
                if($result[0]->RoleId==1){
                    return redirect('/Admin/Dashboard');
                }

            } else {
                $req->session()->flash('error', 'Password Incorrect!!!');
                echo "Email Id Does not Exist.";
                return redirect()->back()->with('alertLogin','Incorret Username or Password!');
            }
        }
    }

    public function Logout(Request $req){
        $req->session()->flush();
        return redirect('/');
    }
}
