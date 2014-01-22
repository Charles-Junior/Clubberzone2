<?php

class Utilisateur extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'idUtilisateurs' => 'required',
		'uEmail' => 'required',
		'uLogin' => 'required',
		'uPassword' => 'required'
	);
}
