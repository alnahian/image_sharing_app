<?php

Route::get('/',array('as'=>'index_page', 'uses'=>'ImageController@getIndex'));

Route::post('/',array('as'=>'index_page_post','before'=>'csrf', 'uses'=>'ImageController@postIndex'));

Route::get('snatch/{id}',
	array('as'=>'get_image_information', 'uses'=>'ImageController@getSnatch'))
		->where('id','[0-9]+');