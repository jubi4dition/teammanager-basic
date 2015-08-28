<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');
        
        $this->call('PersonTableSeeder');
        $this->command->info('Person table seeded!');
        
        $this->call('TeamTableSeeder');
        $this->command->info('Team table seeded!');
        
        $this->call('PersonTeamTableSeeder');
        $this->command->info('PersonTeam table seeded!');
    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = App\User::create(array(
            'username' => 'username',
            'password' => Hash::make('123456'),
            'fullname' => 'Firstname Lastname'
        ));
    }

}

class PersonTableSeeder extends Seeder {

    public function run()
    {
        DB::table('persons')->delete();

        $user = App\Person::create(array(
            'firstname' => 'Owen',
            'lastname' => 'Bryant',
            'gender' => 'male'
        ));
        
        $user = App\Person::create(array(
            'firstname' => 'Patrick',
            'lastname' => 'Gutierrez',
            'gender' => 'male'
        ));
        
        $user = App\Person::create(array(
            'firstname' => 'Hector',
            'lastname' => 'Doyle',
            'gender' => 'male'
        ));
        
        $user = App\Person::create(array(
            'firstname' => 'Cory',
            'lastname' => 'Stevens',
            'gender' => 'male'
        ));
        
        $user = App\Person::create(array(
            'firstname' => 'Juan',
            'lastname' => 'Harrington',
            'gender' => 'male'
        ));
        
        $user = App\Person::create(array(
            'firstname' => 'Louise',
            'lastname' => 'Lawrence',
            'gender' => 'female'
        ));
        
        $user = App\Person::create(array(
            'firstname' => 'Sophia',
            'lastname' => 'Wilson',
            'gender' => 'female'
        ));
        
        $user = App\Person::create(array(
            'firstname' => 'Laura',
            'lastname' => 'Norton',
            'gender' => 'female'
        ));
        
        $user = App\Person::create(array(
            'firstname' => 'Valerie',
            'lastname' => 'Hill',
            'gender' => 'female'
        ));
        
        $user = App\Person::create(array(
            'firstname' => 'Nora',
            'lastname' => 'Perry',
            'gender' => 'female'
        ));
        
    }

}

class TeamTableSeeder extends Seeder {

    public function run()
    {
        DB::table('teams')->delete();

        $team = App\Team::create(array(
            'name' => 'Developer',
            'description' => 'This is the team for developers.'
        ));
        
        $team = App\Team::create(array(
            'name' => 'Consultants',
            'description' => 'This is the team for consultants.'
        ));
        
        $team = App\Team::create(array(
            'name' => 'Support',
            'description' => 'This is the team for supporter.'
        ));
    }

}

class PersonTeamTableSeeder extends Seeder {

    public function run()
    {
        DB::table('persons_teams')->delete();
    }

}
