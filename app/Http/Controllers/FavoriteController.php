<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\favorite;
use App\Models\profile;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{

    public function index(){

        $user = Auth::user();
        // dd($user);

        // お気に入りに追加した人
        $favorites_to = DB::table('favorites')
            ->where('from_fav',$user->id)
            ->where('match_flag', 1)
            ->select('from_fav', 'to_fav', 'id')
            ->paginate(40);

            $profiles_to = [];
            foreach( $favorites_to as $favorite_to){
                array_push($profiles_to, \App\Models\profile::find($favorite_to->to_fav));
            }

        // お気に入りに追加してくれた人
        $favorites_from = Db::table('favorites')
            ->where('to_fav', $user->id)
            ->where('match_flag', 1)
            ->paginate(40);

            // dd($profiles_to[0]->user());

        $profiles_from = [];
        foreach( $favorites_from as $favorite_from){
            array_push($profiles_from, \App\Models\profile::find($favorite_from->from_fav));
        }
        
        // お互いにお気に入り登録
        $profiles_both = array_intersect($profiles_from, $profiles_to);


        return view('favorites.index', compact('profiles_to', 'profiles_from', 'profiles_both'));
    }





    public function store(Request $request){
        $favorite = new Favorite();
        $favorite->to_fav = $request->input('id');
        $favorite->from_fav = Auth::id();
        $favorite->match_flag = true;
        $favorite->save();

        return redirect('favorites');
        
    }
}
