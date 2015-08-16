<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Lang, Form;

class Person extends Model {

    protected $table = 'persons';
    
    protected $guarded = ['id'];
    
    public static $rulesAll = array(
        'firstname' => 'required',
        'lastname' => 'required',
        'gender' => 'required|in:male,female,unknown',
        'birthdate' => 'date',
    );
    
    public function teams()
    {
        return $this->belongsToMany('App\Team', 'persons_teams', 'person_id', 'team_id');
    }
    
    public static function validateAll($input)
    {
        return \Validator::make($input, self::$rulesAll);
    }
    
    public static function validate($input, $field)
    {
        $rule = array_only(self::$rulesAll, array($field));
        
        return \Validator::make($input, $rule);
    }
    
    public function tranlateGender($gender = null)
    {
        switch ($gender) {
            case "male": return Lang::get('app.male');
            case "female": return Lang::get('app.female');
            case "unknown": return '-';
            default: return '-';
        }
    }
    
    public function gender()
    {
        return $this->tranlateGender($this->gender);
    }
    
    public static function createFormGender($default = 'unknown')
    {
        $values = array(
            'unknown' => '-',
            'male' => Lang::get('app.male'),
            'female' => Lang::get('app.female')
        );

        return Form::select('gender', $values, $default, array('class' => 'form-control'));
    }
    
    public static function createSelectbox($team_id)
    {
        $excludePersons = \DB::table('persons_teams')->where('persons_teams.team_id', '=', $team_id)->lists('person_id');
        
        $persons = array();
        foreach(\DB::table('persons')->orderBy('lastname', 'asc')->get() as $person) {
            if(! in_array($person->id, $excludePersons))
                $persons[$person->id] = $person->lastname.', '.$person->firstname;
        }
        
        //if (empty($teams)) return '';

        return Form::select('person', $persons, '', array('class' => 'form-control'));
    }
    
    public function birthdate_formatted() {
        
        if ($this->birthdate === '0000-00-00') return "-";
        
        return date("m.d.Y", strtotime($this->birthdate));
    }

}
