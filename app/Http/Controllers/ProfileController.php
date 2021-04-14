<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\profile;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProfileForm;

class ProfileController extends Controller
{
    

    public function index(){


        if (Auth::user() === null){
        return redirect('login');
        }

        
        $user = Auth::user();
        $profile = $user->profile;
        $profiles = DB::table('profiles')
        ->whereNotIn('id', [$profile->id])
        ->select('nickname', 'age','comment','work', 'height', 'age', 'interest', 'gender','id')
        ->paginate(40);
        // dd($profiles[0]);
        // $profile = DB::table('profiles')->where('user_id', $user->id)->first();
        // dd($profiles->where('gender',1));
        return view('profiles.index',compact('profile','profiles'));

    }



    public function create(){
        $user = Auth::user();

        if(!empty(DB::table('profiles')->where('user_id', $user->id)->first())){
            return redirect('profiles');
        }

        return view('profiles.create',compact('user'));
    }

    

    public function store(StoreProfileForm $request){

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
        
        $user = Auth::user();
        $profile = Profile::find($id);
        // dd($profile);
        return view('profiles.show',compact('profile', 'user'));

    }


    public function edit($id){
        $profile = Profile::find($id);
        // dd($profile);
        return view('profiles.edit', compact('profile'));
    }

    public function update(StoreProfileForm $request, $id){

        // dd($request->method());
        // dd($id);

        $profile = Profile::find($id);
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
        return redirect("profiles/{$profile->id}");
        
    }
    
    public function search(Request $request){
        $profile_search = new Profile;
        // dd($request);
        
        $profile_search->age_top = $request->input('age-top');
        $profile_search->age_bottom = $request->input('age-bottom');
        $profile_search->height_top = $request->input('height-top');
        $profile_search->height_bottom = $request->input('height-bottom');
        $profile_search->key_nickname = $request->input('key-nickname');
        $profile_search->key_work = $request->input('key-work');
        $profile_search->key_interest = $request->input('key-interest');
       
        
        if(empty($profile_search->age_top)){
            $profile_search->age_top = 120;
        }
        if(empty($profile_search->age_bottom)){
            $profile_search->age_bottom = 18;
        }
        if(empty($profile_search->height_top)){
            $profile_search->height_top = 250;
        }
        if(empty($profile_search->height_bottom)){
            $profile_search->height_bottom = 50;
        }
        

        $user = Auth::user();
        $profile = $user->profile;
        // dd('%' . $profile_search->search . '%');

        $profiles = DB::table('profiles')
                    ->whereNotIn('id', [$profile->id])
                    ->select('nickname', 'age','comment','work', 'height', 'age', 'interest', 'gender','id')
                    ->whereBetween('age', [$profile_search->age_bottom, $profile_search->age_top])
                    ->whereBetween('height', [$profile_search->height_bottom, $profile_search->height_top])
                    ->where('nickname', 'like', '%' . $profile_search->key_nickname . '%')
                    ->where('work', 'like', '%' . $profile_search->key_work . '%')
                    ->where('interest', 'like', '%' . $profile_search->key_interest . '%')
                    ->paginate(40);

                    // dd($profiles);

                    return view('profiles.index',compact('profile','profiles'));
    }



}
