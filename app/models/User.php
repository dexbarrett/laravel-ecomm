<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden   = array('password');
	protected $fillable = array('firstname', 'lastname', 'email', 'telephone');

	public static $rules = array(
		'firstname'             => 'required|min:2|alpha',
		'lastname'              => 'required|min:2|alpha',
		'email'                 => 'required|email|unique:users',
		'password'              => 'required|min:2|alpha_num|between:8,12|confirmed',
		'password_confirmation' => 'required|min:2|alpha_num|between:8,12',
		'telephone'             => 'required|between:10,12',
		'admin'                 => 'integer'
	);

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function isAdmin()
	{
		return (int)$this->admin == 1;
	}

}