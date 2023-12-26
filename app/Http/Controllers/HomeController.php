<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feeder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(auth()->user()->job_number == '' || auth()->user()->center == ''){
            return redirect()->to('defs');
        }

        $feeders = Feeder::all();
        return view('home', compact('feeders'));
    }
    public function defs(){
        return view('defs');
    }
    public function update_defs(Request $request){

        $data = $request->validate([
            'name' => 'max:255',
            'job_number' => 'max:255',
            'center' => 'max:255',
        ]);

        User::find(auth()->id())->update($data);
        
        return redirect()->back();
    }
}
