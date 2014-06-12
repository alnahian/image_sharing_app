<?php

class Photo extends Eloquent	{
	protected $table = 'photos';
	
	protected $fillable = array('title', 'image');
	
	public $timestamps = true;
}