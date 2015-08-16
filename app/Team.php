<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Lang, Form;

class Team extends Model {

    protected $table = 'teams';
    
    protected $guarded = ['id'];
    
    public static $rulesAll = array(
        'name' => 'required',
        'description' => 'required'
    );
    
    public function persons()
    {
        return $this->belongsToMany('App\Person', 'persons_teams', 'team_id', 'person_id');
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
    
    public static function createSelectbox($person_id)
    {
        $excludeTeams = \DB::table('persons_teams')->where('persons_teams.person_id', '=', $person_id)->lists('team_id');
        
        $teams = array();
        foreach(\DB::table('teams')->orderBy('name', 'asc')->get() as $team) {
            if(! in_array($team->id, $excludeTeams))
                $teams[$team->id] = $team->name;
        }
        
        //if (empty($teams)) return '';

        return Form::select('team', $teams, '', array('class' => 'form-control'));
    }
    
}
