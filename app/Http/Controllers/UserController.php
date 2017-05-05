<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends Controller
{
    //

    public function profile()
    {
    	return view('profile',array('user' => Auth::user()));
    }

    public function profilePhotoUpload(Request $request)
    {
    	if($request->hasFile('profile_photo'))
    	{
    		$photo=$request->file('profile_photo');
    		$filename = time() . '.' . $photo->getClientOriginalExtension();
    		Image::make($photo)->resize(300, null, function ($constraint) {
    		$constraint->aspectRatio();
    		}
    		
    		)->save(public_path('/uploads/profile_photos/' . $filename));
    		
    		$user= Auth::user();
    		$user->profile_photo=$filename;
    		$user->save();

    	}

    	return view('profile',array('user' => Auth::user()));
    }
}
