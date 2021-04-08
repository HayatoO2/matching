<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\profile;

class ProfileController extends Controller
{
    

    public function index(){
        $users =  User::all();
        $user = Auth::user();
        
        return view('profiles.index',compact('users','user'));
    }



    public function create(){
        $user = Auth::user();
        return view('profiles.create',compact('user'));
    }

    

    public function store(Request $request){

        $profile = new Profile;
        $profile->gender = $request->input('gender');
        $profile->height = $request->input('height');
        $profile->age = $request->input('age');
        $profile->work = $request->input('work');
        $profile->comment = $request->input('comment');
        $profile->interest = $request->input('interest');
        // $all = $request->all();

        $profile->save();
        return redirect('profiles');

    }


}
