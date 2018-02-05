<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data['user'] = \Auth::User();
        return view('home',$data);
    }

    public function accept(Request $request)
    {
        $user = \App\User::find( $request->id);
        $message = \App\ChatMessage::create([
            'user_id' => $request->id,
            'message' => $request->message
        ]);

        event(new \App\Events\ChatMessageWasReceived($message, $user));
    }
}
