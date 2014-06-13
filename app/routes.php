<?php

Route::get('/',array('as'=>'index_page', 'uses'=>'ImageController@getIndex'));

Route::post('/',array('as'=>'index_page_post','before'=>'csrf', 'uses'=>'ImageController@postIndex'));