<?php

class Transaction extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'member_id'		=>'required|exists:members,id',
		'product_types' =>'required|numeric',
		'total_price' 	=>'required|numeric',
		'point' 		=>'required|numeric'

	];

	// Don't forget to fill this array
	protected $fillable = ['member_id','product_types','total_price','point'];
	
	public function member(){
		return $this->belongsTo('Member');
	}
	

}

/*
'member_id'		=>'required|exists:members,id',
		'product_types' =>'required|numeric',
		'total_price' 	=>'required|numeric',
		'point' 		=>'required|numeric'


protected $fillable = ['member_id'];
protected $fillable = ['member_id','product_types','total_price','point'];
*/