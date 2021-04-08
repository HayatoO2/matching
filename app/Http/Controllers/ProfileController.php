<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\profile;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    

    public function index(){
        // $users =  User::all();
        $user = Auth::user();
        $profile = DB::table('profiles')->where('user_id', $user->id)->first();
        return view('profiles.index',compact('profile'));
    }



    public function create(){
        $user = Auth::user();
        return view('profiles.create',compact('user'));
    }

    

    public function store(Request $request){

        $profile = new Profile;

        $profile->nickname = $request->input('nickname');
        $profile->gender = $request->input('gender');
        $profile->height = $request->input('height');
        $profile->age = $request->input('age');
        $profile->work = $request->input('work');
        $profile->comment = $request->input('comment');
        $profile->interest = $request->input('interest');
        $profile->user_id = Auth::id();
        // dd($profile);
        $profile->save();
        return redirect('profiles');

    }

    public function show($id){
        
        $profile = Profile::find($id);
        // dd($profile);
        return view('profiles.show',compact('profile'));

    }


    public function edit($id){
        $profile = Profile::find($id);
        // dd($profile);
        return view('profiles.edit', compact('profile'));
    }





}
