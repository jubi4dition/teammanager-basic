<?php namespace App\Http\Controllers;

use App;

class HomeController extends Controller {

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
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('home')->with('teams', App\Team::all())
                           ->with('persons', App\Person::all());
    }

}
