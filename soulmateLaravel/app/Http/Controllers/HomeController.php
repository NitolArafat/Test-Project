<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Users;
use DB;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $response_id = \App\Likes::all();

        $notice_like_requests = DB::table('likes')
                ->join('users', 'likes.request_person_id', '=', 'users.id')
                ->select('users.*', 'likes.*')
                ->where('likes.response_id', Auth::user()->id)
                ->where('likes.request_status', 1)
                ->get();


        $friend_list = DB::table('likes')
                ->join('users', 'likes.request_person_id', '=', 'users.id')
                ->select('users.*', 'likes.*')
                ->where('likes.request_person_id', Auth::user()->id)
                //->where('likes.response_id', $response_id->response_id)
                ->where('likes.match', 1)
                ->get();

        $persions = Users::all();
        return view('front-end.welcome', ['users' => $persions, 'notice_like_requests' => $notice_like_requests, 'friend_list' => $friend_list]);
        // return view('welcome');
    }






    public function persionDetals($request_id, $response_id) {

        //   echo $request_id, $response_id;
        $check_like = \App\Likes::where('request_person_id', $request_id)
                ->where('response_id', $response_id)
                ->first();

        $person = Users::find($response_id);

        if ($check_like == null) {


            return view('front-end.persion_view_details', ['person' => $person, 'check_like' => null]);
        } else {
            return view('front-end.persion_view_details', ['person' => $person, 'check_like' => 1, $check_like = 2]);
        }
    }

}
