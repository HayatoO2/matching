<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\message;
use App\Models\profile;
use Illuminate\Support\Facades\DB;
use Auth;


class messageController extends Controller
{
    public function create(){
        
        $url = "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
        parse_str(parse_url($url, PHP_URL_QUERY), $query);
        $id = $query['profile'];
        $profile = Profile::find($id);
        $user = Auth::user();

        $messages = DB::table('messages')
                    ->where("to_fav", $profile->id)
                    ->where('from_fav', $user->profile->id)
                    ->orderByRaw('updated_at - created_at DESC')
                    ->get();

        return view('message.create', compact('profile', 'messages','user'));
    }
    
    public function store(Request $request){
        $message = new Message;
        $user = Auth::user();
        
        $message->message = $request->input('message');
        $message->from_fav = $user->profile->id;
        $message->to_fav = (int)$request->input('to_fav');
        // dd($message);
        
        $profile = Profile::find($message->to_fav);
        $message->save();
        return view('message.create', compact('profile'));
    }
}
