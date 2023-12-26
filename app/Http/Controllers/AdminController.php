<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'admin']);
    }

    public function users(){
        $users = User::all();
        return view('users', compact('users'));
    }
    public function delete_user($user_id){
        User::find($user_id)->delete();
        return redirect()->back();
    }

    public function log(){

        

        return view('log');
    }

}
