<?php

class Conversation extends \Eloquent {
	protected $fillable = [
		'user_id',
		'receiver_id',
		'title',
		'user_read_at',
	];

	//convert dates to carbon objects.
	public function getDates()
	{
		return [
			'created_at',
			'updated_at',
			'user_read_at',
			'receiver_read_at'
		];
	}

	public function user() {
		return $this->belongsTo('User');
	}

	public function receiver() {
		return $this->belongsTo('User', 'receiver_id', 'id');
	}

	public function messages() {
		return $this->hasMany('Message');
	}

	//validator

	public static function validate($input) {

		$rules = [
			'title'     => 'required',
			'body'      => 'required',
			'username'  => 'required',
		];

		return Validator::make($input, $rules);
	}

	public function is_read() {

		//check if user is sender or receiver
		$is_sender = $this->user_id == Auth::user()->id;
		if($is_sender)
		{
			return $this->user_read;
		}
		else {
			return $this->receiver_read;
		}

	}
}