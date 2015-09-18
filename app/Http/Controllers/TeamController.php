<?php namespace App\Http\Controllers;

use App\Team, Validator, Input, Redirect, Auth, Session; 

class TeamController extends Controller {

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
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('teams.index')->with('teams', Team::all());
    }
    
    public function getNew()
    {
        return view('teams.new')->with('teams', Team::all());;
    }
    
    public function postNew()
    {
        $validator = Team::validateAll(Input::all());

        if ($validator->fails()) {
            Input::flash();
            return redirect()->route('team.new')->withErrors($validator->messages()->all());
        }

        $team = new Team;

        $team->name = Input::get('name');
        $team->description = Input::get('description');

        $team->save();

        return redirect()->route('team.new');
    }
    
    public function getEdit($id)
    {
        $team = Team::find($id);

        if ($team === null) return redirect('teams');

        return view('teams.edit')->with('team', $team);
    }
    
    public function postEditField($id, $field)
    {
        if (!array_key_exists($field, Team::$rulesAll)) \App::abort(403, 'Unauthorized action.');

        $team = Team::find($id);
        
        if ($team === null) return redirect('teams');

        $validator = Team::validate(Input::all(), $field);

        if ($validator->fails()) {
            return redirect()->route('team.edit', $team->id)->withErrors($validator->messages()->all());
        }

        $team->$field = Input::get($field);
        
        $team->save();

        return redirect()->route('team.edit', $team->id)->with('success', trans('app.updateSuccessful'));
    }
    
    public function remove($id)
    {
        $team = Team::find($id);
        
        if ($team === null) return redirect('teams');

        $team->delete();

        return redirect('teams');
    }
    
    public function removePerson($id, $person_id)
    {
        $team = Team::find($id);
        
        if ($team === null) return redirect('teams');

        $team->persons()->detach($person_id);

        return redirect()->route('team.edit', $team->id);
    }
    
    public function addPerson($id)
    {
        $team = Team::find($id);
        
        if ($team === null) return redirect('teams');
        
        $person_id = (int) Input::get('person');
        
        if(! $team->persons()->where('person_id', $person_id)->exists()) {
            $team->persons()->attach($person_id);
        }

        return redirect()->route('team.edit', $team->id);
    }

}
