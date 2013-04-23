<?php

class UploadController extends AuthorizedController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return "file controller";
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user 	= Sentry::getUser();
		$input 	= Input::all();

	    $rules = array(
	        'file' => 'image|max:3000',
	    );

	    $validation = Validator::make($input, $rules);

	    if ($validation->fails())
	    {
	        return Response::make($validation->errors->first(), 400);
	    }

	    $file       = Input::file('file');
	    $extension  = $file->getClientOriginalExtension();
	    $random		= Str::random(32);
	    $directory  = __DIR__.'/../../public/uploads/'.sha1($user->email);
	    $filename   = sha1($random.time()).'.'.$extension;

	    $upload_success = $file->move($directory, $filename);

	    if( $upload_success ) {

	    	// Add Entry to database
	    	$upload = new Upload;
			$upload->user_id = $user->id;
			$upload->file_name = $filename;
			$upload->save();

	        return Response::json('success', 200);

	    } else {
	        return Response::json('error', 400);
	    }

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}