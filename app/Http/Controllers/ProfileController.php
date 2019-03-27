<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Profile, Event};

class ProfileController extends Controller
{
   
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index()
   {
   	  return view('user.account');
   }

   public function update(Request $request)
   {

      $this->validate($request, [

          'name' => 'required',
          'email' => 'required',
          'address' => 'required',
          'state'  => 'required',
          'city'  => 'required',
          'country'  => 'required',
          'pincode' => 'required',
          'phone' => 'required'

        ]);

      $user = auth()->user();

      $user->name = $request->get('name');

      $user->email = $request->get('email');

      $user->save();

      if($user->profile == null) { 
          $user->profile()->create($request->except('name', 'email'));
          
      } else {
        $profile = $user->profile;
        $profile->update($request->except('name', 'email'));
      }

      return back();

   }

   public function orders()
   {
      $orders = auth()->user()->orders;
      return view('user.orders', compact('orders'));
   }


   public function favourites()
   {
      return view('user.favourites');
   }

   public function venues()
   {
      return view('user.venues');
   }

   public function events()
   {
      return view('user.events');
   }

   public function vendors()
   {
      return view('user.vendors');
   }

   public function going()
   {
      return view('user.events_going');
   }


   public function password()
   {
      return view('user.password');
   }


   public function updatePassword(Request $request)
   {
      $this->validate($request, [
          'old_password' => 'required',
          'password' => 'required|string|min:6|confirmed'
        ]);

      $old_password = $request->get('old_password');
      $password = $request->get('password');

      if(!\Hash::check($old_password, auth()->user()->password))
      {
          return back()->withErrors(['Please enter your current password correct!']);
      } 


      auth()->user()->password = bcrypt($password);

      auth()->user()->save();

     
      return redirect('user/account');
   }


   public function addEvent(Request $request, Event $event)
   {

      return auth()->user()->goingTo()->attach($event);

      if($request->wantsJson())
      {
          return response([], 200);
      }

   }

   public function removeEvent(Request $request, Event $event)
   {

     return auth()->user()->goingTo()->detach($event);

      if($request->wantsJson())
      {
          return response([], 200);
      }

   }
}
