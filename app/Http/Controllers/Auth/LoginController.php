<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\ActivationService;
use App\User;
use Auth;
use Redirect;

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

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest', ['except' => 'logout']);
        $this->activationService = $activationService;
    }

    /**
     * Get a validator for an incoming login request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
        	'email'    => 'required|email',
    		'password' => 'required|min:6',
        ]);
    }

    /**
     * Login function for auth.
     *
     * @param  Request  $request
     */
     public function login(Request $request)
     {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('/login')
                        ->withErrors($validator)
                        ->withInput();
        }

        $userdata = array(
			'email'     => $request->input('email'),
			'password'  => $request->input('password')
		);

		if (Auth::attempt($userdata, $request->has('remember'))){
            if(!Auth::user()->activated){
                $this->activationService->sendActivationMail(Auth::user());
                Auth::logout();
                return redirect('/login')
    	     		->with('success-status', 'An activation email has been sent to your mail, Visit your mail and click on the activation link to access your account.');
            }
		    return redirect()->intended($this->redirectPath());
		}else {
			return redirect('/login')
	     		->with('error-status', 'Incorrect email or password.');
		}

     }

     public function logout(Request $request) {
         Auth::logout();
         return redirect('/login');
    }

     public function resendActivation(){
     	if(!Auth::user()->activated)
     		$this->activationService->sendActivationMail(Auth::user());
		return redirect()->back();
     }

    public function activateUser($token)
	{
		//dd($token);
    	if ($user = $this->activationService->activateUser($token)) {
        	Auth::loginUsingId($user->id);
        	return redirect($this->redirectPath());
    	}
    	abort(404);
	}
}
