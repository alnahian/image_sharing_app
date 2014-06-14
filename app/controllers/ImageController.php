<?php

class ImageController extends BaseController	{
	
	public function getIndex()	{
		return View::make('tpl.index');
	}
	
	public function postIndex()	{
		$validation = Validator::make(Input::all(),Photo::$upload_rules);
		
		if($validation->fails())	{
			return Redirect::to('/')
				->withInput()
				->withErrors($validation);
		} else	{
			$image = Input::file('image');
			$filename = $image->getClientOriginalName();
			$filename = pathinfo($filename, PATHINFO_FILENAME);
			$fullname = Str::slug(Str::random(8).$filename).'.'.$image->getClientOriginalExtension();
			
			$upload = $image->move(Config::get('image.upload_folder'),$fullname);
			
			Image::make(Config::get('image.upload_folder').'/'.$$fullname)
				->resize(Config::get('image.thumb_width'),null,true)
				->save(Config::get('image.thumb_folder').'/'.$fullname);
				
			if($upload)	{
				$insert_id = DB::table('photos')->insertGetId(
					array(
						'title' => Input::get('title');
						'image' => $fullname
					)
				);
				return Redirect::to(URL::to('snatch/'.$insert_id))
					->with('success','Image uploaded successfully');
			}	else	{
				return Redirect::to('/')->withInput()
					->with('error','Sorry, image could not be uploaded');
			}
		}
	}
}