<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\favorite;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{

    public function index(){

        $user = Auth::user();

        $favorites_to = DB::table('favorites')
            ->where('from_fav',$user->id)
            ->where('match_flag', 1)
            ->select('from_fav', 'to_fav')
            ->paginate(40);

        $favorites_from = Db::table('favorites')
            ->where('to_fav', $user->id)
            ->where('match_flag', 1)
            ->paginate(40);

        
        return view('favorites.index', compact('favorites_to', 'favorites_from'));
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
