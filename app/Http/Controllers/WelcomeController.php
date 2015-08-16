<?php namespace App\Http\Controllers;

use Validator, Input, Redirect, Auth; 

class WelcomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('welcome');
    }
    
    public function postLogin()
    {
        $validator = Validator::make(Input::all(), 
                        ['username' => 'required', 'password' => 'required']);
        
        if ($validator->fails()) {
            return view('welcome')->with('error', true);
        }

        if (Auth::attempt(array(
            'username' => Input::get('username'), 
            'password' => Input::get('password'))
        )) {
            return redirect('home');
        } else {
            return view('welcome')->with('error', true);
        }
    }

}
