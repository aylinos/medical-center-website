<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Specialty;
use App\User;
use App\Doctor;

class DashboardController extends Controller
{
    public function index(){
      $specialties = Specialty::paginate(5);
      $users = User::all();
      return view('admin.dashboard', compact(['specialties', 'users']));
    }

    public function addSpecialty(Request $request){
      $this->validate($request,[
        'name' =>  'required'
      ]);

      $specialty = new Specialty;
      $specialty->name = $request->name;
      $specialty->save();
      return redirect(route('admin.dashboard'))->with('successMsg', 'Specialty successfully added!');
    }

    public function delete($id)
    {
        Specialty::find($id)->delete();
        return redirect(route('admin.dashboard'))->with('successMsg', 'Specialty successfully deleted!');
    }

    public function deleteuser($id)
    {
        User::find($id)->delete();
        return redirect(route('admin.dashboard'))->with('successMsg', 'User successfully deleted!');
    }
    public function makedoctor($id)
    {
        $user = User::find($id);
      if($user->role_id == 3){
        $user->role_id = 2;
        $user->save();
        $specialties = Specialty::all();
        return view('admin/addDoctor', compact('user', 'specialties'));

        // return redirect(route('admin.addDoctor', $id));

      }else{
        return redirect(route('admin.dashboard'))->with('successMsg', 'Doctor was not added - choose a person with role_id 1!');
      }
    }

    public function createDoctor(Request $request)
    {
      $this->validate($request,[
        'userid' => 'required',
        'biography' =>  'required',
        'spec_id' => 'required|integer'
      ]);

      $doctor = new Doctor;
      $doctor->user_id = $request->userid;
      $doctor->biography = $request->biography;
      $doctor->age = $request->age;
      $doctor->years_of_experience = $request->years_of_experience;
      $doctor->spec_id = $request->spec_id;
      $doctor->save();
      // return view('admin/dashboard');
      return redirect(route('admin.dashboard'))->with('successMsg', 'Doctor successfully added!');

    }

}
