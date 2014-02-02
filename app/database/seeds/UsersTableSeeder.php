<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{

    $users = array(
                 array('firstname' => 'John', 'lastname' => 'Doe', 'email' => 'john@doe.com',
                  'password'  => Hash::make('123456'), 'telephone' => '5557771234', 'admin' => 1
                 )
            );
		DB::table('users')->truncate();
		DB::table('users')->insert($users);
	}

}
