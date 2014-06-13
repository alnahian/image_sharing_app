<?php

class ImageController extends BaseController	{
	
	public function getIndex()	{
		return View::make('tpl.index');
	}
}