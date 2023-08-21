<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Notifications\CustomWelcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\ActivationService;
use App\Bank;
use App\Category;
use Auth;
use Redirect;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

     protected $activationService;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function __construct(ActivationService $activationService)
    {
        $this->middleware('guest');
        $this->activationService = $activationService;
    }
    /**
     * Get a validator for an incoming registration request.
     * |regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'surname' => 'required|max:190',
            'fname' => 'required|max:190',
            'phone' => 'required|min:8|unique:users',
            'email' => 'required|email|max:190|unique:users',
            'password' => 'required|min:6|confirmed',


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        
        return User::create([
            'fname' => $data['fname'],
            'surname' => $data['surname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'referrer_id' => $data['referrer']


        ]);
    }


    /**
     * Register function for auth.
     *
     * @param  Request  $request
     */
     public function register(Request $request)
     {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('/register')->withErrors($validator)->withInput();
        }

        $data = User::where('email', $request->input('email'))->first();
     	if($data != null){
     		return rredirect('/register')
     		->with('error-status', 'User with email already exists in the system')->withInput();
     	}

     	if($request->input('referrer') != ""){
     		$u = User::where('phone', $request->input('referrer'))->first();
     		if($u == null)
     			return redirect('/register')->with('error-status', 'Referrer not found')->withInput();
     		else $request['referrer'] = $u->id;
     	}else{
     		$request['referrer'] = 0;
     	}

     	$user = $this->create($request->all());
        /*try{
            $user->notify(new Custom
            e);
        }catch(\Exception $e){
            //Do Nothing for now
        }*/
       $this->activationService->sendActivationMail($user);
     	//Auth::loginUsingId($user->iphp d);
     	//return redirect()->intended($this->redirectPath());
        return redirect('/login')->with('success-status', 'Registration Successful! Login below to access your account.');
     }


    public function showRegistrationForm(Request $request)
    {
        $referrer = null;
        if($request->has('ref')){
        	$referrer = User::where('phone', $request->input('ref'))->first();
        	//$referrer = $user != null ? $user->email : '';
        }
        return view('auth.register', ['referrer' => $referrer]);
    }
}
