<?php namespace App\Http\Controllers;

use App\Person, Validator, Input, Redirect, Auth; 

class PersonController extends Controller {

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
        return view('persons.index')->with('persons', Person::all());
    }
    
    public function getNew()
    {
        return view('persons.new')->with('persons', Person::all());;
    }
    
    public function postNew()
    {
        $validator = Person::validateAll(Input::all());

        if ($validator->fails()) {
            Input::flash();
            return redirect()->route('person.new')->withErrors($validator->messages()->all());
        }

        $person = new Person;

        $person->firstname = Input::get('firstname');
        $person->lastname = Input::get('lastname');
        $person->gender = Input::get('gender');
        $person->birthdate = Input::get('birthdate');

        $person->save();

        return redirect()->route('person.new')->with('success', trans('app.newPersonSuccess'));
    }
    
    public function getEdit($id)
    {
        $person = Person::find($id);

        if ($person === null) return $this->personNotExistsRedirect($id);

        return view('persons.edit')->with('person', $person);
    }
    
    public function postEditField($id, $field)
    {
        if (!array_key_exists($field, Person::$rulesAll)) \App::abort(403, 'Unauthorized action.');

        $person = Person::find($id);
        
        if ($person === null) return $this->personNotExistsRedirect($id);

        $validator = Person::validate(Input::all(), $field);

        if ($validator->fails()) {
            return redirect()->route('person.edit', $person->id)->withErrors($validator->messages()->all());
        }
        
        $person->$field = Input::get($field);
        
        $person->save();

        return redirect()->route('person.edit', $person->id)->with('success', trans('app.updateSuccessful'));
    }
    
    public function remove($id)
    {
        $person = Person::find($id);
        
        if ($person === null) return $this->personNotExistsRedirect($id);
        
        $person->teams()->detach();
        $person->delete();

        return redirect('persons')->with('success', trans('app.removePersonSuccess'));
    }
    
    public function removeTeam($id, $team_id)
    {
        $person = Person::find($id);
        
        if ($person === null) return $this->personNotExistsRedirect($id);

        $person->teams()->detach($team_id);

        return redirect()->route('person.edit', $person->id);
    }
    
    public function addTeam($id)
    {
        $person = Person::find($id);
        
        if ($person === null) return $this->personNotExistsRedirect($id);
        
        $team_id = (int) Input::get('team');
        
        if(! $person->teams()->where('team_id', $team_id)->exists()) {
            $person->teams()->attach($team_id);
        }

        return redirect()->route('person.edit', $person->id);
    }
    
    private function personNotExistsRedirect($id) {
        return redirect('persons')->withError(trans('app.personNotExists', ['id' => $id]));
    }

}
