<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface{

	use UserTrait, RemindableTrait;

        protected $fillable = array('name', 'email', 'password');
        
        public static $validation = array(
            'email'     => 'required|email|unique:users',
            'name'  => 'required|alpha_num|unique:users',
            'password'  => 'required|confirmed|min:6',
            'password_confirmation'  => 'required|same:password'
        );
        
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

}
