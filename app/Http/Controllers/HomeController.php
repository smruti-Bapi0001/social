<?php

namespace App\Http\Controllers;

use App\Friend;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friendLists = Friend::where('status', 1)->get();

        $friendRequests = Friend::where('status', '3');
        return view('home',[
            'friendLists' => $friendLists,
            'friendRequests' => $friendRequests
        ]);
    }

    public function search(Request $request){
        $search = $request->search;


        $users = User::where('name','like','%'.$search.'%')->where('id','!=', Auth::user()->id)->get();

        return view('search', [
           'users' => $users
        ]);
    }

    public function addFriend(Request $request){
        if(isset($request->id)){
            $user = User::whereId($request->user)->first();
            Friend::create([
                'from_id' => $user->id,
                'to_id' => $request->id,
                'status' => 3
            ]);

            return response()->json([
                'status' => 'success'
            ],200);
        }
        return response()->json([
            'status' => 'error'
        ],500);
    }
}
