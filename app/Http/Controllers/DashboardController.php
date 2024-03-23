<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DashboardController extends Controller
{
   public function dashboard(){
    return view('admin.dashboard.list');
   }
   public function my_account(Request $request){

      $data['getRecord'] = User::find(Auth::user()->id);
      return view('admin.my_account.update',$data);

   }
   public function my_account_update(Request $request){

      $save = request()->validate([
         'email' => 'required|unique:users,email,'.Auth::user()->id
      ]);
      $save = User::find(Auth::user()->id);
      $save->name = trim($request->name);
      $save->email= trim($request->email);
      if(!empty($request->password)){
           $save->password = Hash::make($request->password);
      }

      //Profile Start
      if(!empty($request->file('profile_image'))){
         if(!empty($save->profile_image) && file_exists('upload/profile/'.$save->profile_image)){unlink('upload/profile/'.$save->profile_image);
         }
         $file = $request->file('profile_image');
         $randomStr = Str::random(30);
         $filename = $randomStr.'.'.$file->
            getClientOriginalExtension();
            $file->move('upload/profile/', $filename);
            $save->profile_image = $filename;
     
      //Profile End


      $save->save();
      return redirect('admin/my_account')->with('success','profile Successfully Update');

   }
   }
}
