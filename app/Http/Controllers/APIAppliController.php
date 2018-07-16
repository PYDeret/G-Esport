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
use App\Quotation;

class APIAppliController extends Controller
{

	public function __construct()
	{
    }
    
    public function connect(Request $request){

        $data = file_get_contents("php://input");
        if($data) {
            $data = $this->manage_post($data);
        }


        if (Auth::attempt($data)) {

            return Auth::id();
        }
    }

    public function getName(){

        $data = file_get_contents("php://input");
        /*if($data) {
            $data = $this->manage_post($data);
        }

        $data = User::where('id', '=', $data['id'])->first();*/

        return $data;
    }

    public function getMsg(Request $request){

        $id = $request->input('id');

        $data = file_get_contents("php://input");
        if($data) {
            $data = $this->manage_post($data);
        }

        $threads = Thread::ForUserLimited($data['id'])->latest('updated_at')->get();

        return $threads;

    }

    public function getOtherUsers(Request $request){

        $id = $request->input('id');
        $users = User::where('id', '!=', $id)->get();

        return $users;
    }

    public function sendMessage(Request $request){

        $data = file_get_contents("php://input");
        if($data) {
            $data = $this->manage_post($data);
        }

        $thread = Thread::create([
            'subject' => $data['subject'],
        ]);
        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => $data['id'],
            'body' => $data['message'],
        ]);
        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => $data['id'],
            'last_read' => new Carbon,
        ]);
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant($data['otherid']);
        }
        return "done";
    }

    public function setDoubleAuth(Request $request){

        $data = file_get_contents("php://input");
        if($data) {
            $data = $this->manage_post($data);
        }

        $user = User::where('id', '=', $data['id'])->first();

        $user->doubleAuth = $data['check'];
        $user->numTel = $data['numTel'];

        if($user->doubleAuth == "off" || empty($user->numTel)){
            $user->doubleAuth = "";
            $user->numTel = "";
        }
        else if($user->doubleAuth == "on"){
            $user->doubleAuth = "Activated";
        }

        $user->save();

        return $user;
    }

    public function manage_post($data) {
		$data = str_replace('"', '', $data);
		$data = str_replace(':', ',', $data);
		$data = substr($data, 1, -1);
		$data = explode( ",", $data );
		$array = array();
		for ($i=0; $i < sizeof($data); $i++) { 
			if($i%2 == 0) {
				continue;
			} else {
				$array[$data[$i-1]] = $data[$i];
			}
		}
		return $array;
	}
}
