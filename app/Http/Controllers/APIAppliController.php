<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class APIAppliController extends Controller
{

	public function __construct()
	{
    }
    
    public function connect(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return Auth::id();
        }
        else{
            return "none";
        }
    }

    public function getMsg(Request $request){

        $id = $request->input('id');

        $threads = Thread::ForUserLimited($id)->latest('updated_at')->get();

        return $threads;

    }

    public function getOtherUsers(Request $request){

        $id = $request->input('id');
        $users = User::where('id', '!=', $id)->get();

        return $users;
    }

    public function sendMessage(Request $request){

        $input = Input::all();

        $thread = Thread::create([
            'subject' => $request->input('subject'),
        ]);
        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => $request->input('id'),
            'body' => $request->input('message'),
        ]);
        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => $request->input('id'),
            'last_read' => new Carbon,
        ]);
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant($request->input('otherid'));
        }
        return "done";
    }
}
