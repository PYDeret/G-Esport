<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    protected function authenticated(Request $request, $user)
    {
        if ( $user->doubleAuth == "Activated" ) {

            $generateToken = $this->generateRandomString();

            \DB::table('users')
            ->where('id', $user->id)
            ->update(['doubletoken' => $generateToken]);


            // Account details
            $apiKey = urlencode('qWx91MSQKmE-uk5iBORiGqVNSwOOHzx191tXRGtv3h');
            
            // Message details
            $numbers = array($user->numTel);
            $sender = urlencode('G-Esport');
            $message = rawurlencode('Voici votre code de vérification pour votre connexion ! -> ' . $generateToken);
        
            $numbers = implode(',', $numbers);
        
            // Prepare data for POST request
            $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
        
            // Send the POST request with cURL
            $ch = curl_init('https://api.txtlocal.com/send/');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            return redirect('/doubleauth');
        }

        return redirect('/home');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
