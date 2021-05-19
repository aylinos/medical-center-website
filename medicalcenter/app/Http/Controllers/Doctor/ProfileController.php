<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Doctor;


class ProfileController extends Controller
{
  public function index(){
    return view('doctor.myProfile');
  }

  public function myProfile()
  {
    $user = Auth::user();
    $doctor = Doctor::where('user_id', $user->id)->first();
    return view('doctor.myProfile',compact(['user', 'doctor']));
  }

  public function updateProfile(Request $request)
  {
    $user = Auth::user();
    $doctor = Doctor::where('user_id', $user->id)->first();

    $doctor->biography = $request->biography;
    $doctor->age = $request->age;
    $doctor->years_of_experience = $request->years_of_experience;
    $doctor->save();

    return Redirect::to('doctor/myProfile')->
        with('success','You have successfully updated your profile!');
  }

  public function update_profileImg(Request $request)
  {
    $request->validate([
      'newImg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $image = $request->file('newImg');

    $user = Auth::user();

    $imgName = $user->id.'_img'.time().'.'.request()->newImg->getClientOriginalExtension();

    $destinationPath = public_path('/profile_images');

    $resize_image = Image::make($image->getRealPath());

    $resize_image->resize(380, 260, function($constraint){
      $constraint->aspectRatio();
     });

    //insert a watermark
    $resize_image->insert('public/watermark.png');

    $resize_image->save($destinationPath . '/' . $imgName);

    $user->profile_img = $imgName;
    $user->save();

    return Redirect::to('doctor/myProfile')->
        with('success','You have successfully updated image!');
  }
}
