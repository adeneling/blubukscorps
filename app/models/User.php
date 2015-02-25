<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

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
	protected $hidden = array('password', 'remember_token');
 
 	// Validation rules
	public static $rules = [
		'first_name' => 'required',
		'email' => 'required|email|unique:users,email,:id',
		'password' => 'confirmed|required|min:5',
		'recaptcha_response_field' => 'required|recaptcha',
	];

	// field yang bisa diisi dengan mass assignment
	protected $fillable = ['first_name', 'last_name', 'email', 'password'];

}
