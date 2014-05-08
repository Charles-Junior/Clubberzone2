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
	protected $hidden = array('password');

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

	public function parties()
    {
        return $this->hasMany('Party');
    }
 
    public function comments()
    {
        return $this->hasMany('Comment');
    }

    public static function validate($input)
	{
	    $rules = array(
	        'email' => 'required|email|unique:users',
	        'username' => 'required|Alpha_dash|between:6,64|unique:users',
	        'firstname' => 'required|Alpha|between:1,64',
	        'lastname' => 'required|Alpha|between:1,64',
	        'password' => 'required|AlphaNum|between:6,20|confirmed'
	    );

	    $messages = array(
            'username.required' => 'Nous avons besoin de votre pseudo.',
            'username.Alpha' => 'Le pseudo doit être composé de caractères alphabétiques.',
            'username.between' => 'Le nombre de caractères du pseudo doit être compris entre :min et :max.',
            'username.unique' => 'Ce pseudo est déjà utilisé.',
            'email.required' => 'Nous avons besoin de votre adresse mail.',
            'email.email' => 'Le format de l\'adresse mail n\'est pas correct.',
            'email.unique' => 'Cette adresse mail est déjà utilisée.',
            'password.required' => 'Nous avons besoin d\'un mot de passe.',
            'password.Alphanum' => 'Le pseudo doit être composé de caractères alphanumériques.',
            'password.between' => 'Le nombre de caractères du mot de passe doit être compris entre :min et :max.',
            'password.confirmed' => 'La confirmation du mot de passe n\'est pas correcte.'
        );
	    return Validator::make($input, $rules, $messages);
	}

}