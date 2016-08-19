<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

class UserController extends Controller
{		
	public function getDashboard() {
		if (\Session::get('userType') == 'event_organizer') {
			$view = 'dashboard';
		} else if (\Session::get('userType') == 'ticket_buyer') {
			$view = 'buyer_dashboard';	
		}

		return \View::make($view);
	}
	
	public function signin() {
		$email_address = Input::get('usernamesignin');
		$password = Input::get('passwordsignin');
		
		$id = \DB::table('users')->where('email', $email_address)->value('id');
		$type = \DB::table('users')->where('email', $email_address)->value('user_type');
		
		\Session::put('userID', $id);
		\Session::put('userType', $type);
		
		$queryResult = null;
		
		if ($type == 'event_organizer') {
			$queryResult = \App\EventOrganizer::where('user_id', $id)->get();
		} else if ($type == 'ticket_buyer') {
			$queryResult = \App\TicketBuyer::where('user_id', $id)->get();
		}

		if ($queryResult == null) {
			return \View::make('login')->with('status', 'User not found');
		}
		
		$fullName = $queryResult[0]['name'];
		
		\Session::put('fullName', $fullName);
		
		if (\Auth::attempt(array('email' => $email_address, 'password' => $password))) {
			return \Redirect::intended('dashboard');
		} else {
			return \View::make('login')->with('status', 'Incorrect e-mail address/password');
		}
	}
	
	
	public function tregister() {
		$email_address = Input::get('email');
		$password = Input::get('password');
		$firstname = Input::get('fname');
		$lastname = Input::get('lname');
		$fullname = $firstname . ' ' . $lastname;
				
		// return Input::all();
		
		$user = \App\User::create(array(
			'user_type' => 'ticket_buyer',
			'email' => $email_address,
			'password' => \Hash::make($password)
		));
		
		$got_user_id = $user->id;
		
		$ticket_buyer = \App\TicketBuyer::create(array(
			'user_id' => $got_user_id,
			'name' => $fullname
		));
		
		return \View::make('login')->with('status', 'You have registered successfully. Log in now!');
	}
		
	public function register() {
		$email_address = Input::get('email');
		$password = Input::get('password');
		$firstname = Input::get('fname');
		$lastname = Input::get('lname');
		$fullname = $firstname . ' ' . $lastname;
		$organization = Input::get('organization');
		
		// return Input::all();
		
		$user = \App\User::create(array(
			'user_type' => 2,
			'email' => $email_address,
			'password' => \Hash::make($password)
		));
		
		$got_user_id = $user->id;
		
		$event_organizer = \App\EventOrganizer::create(array(
			'user_id' => $got_user_id,
			'name' => $fullname,
			'organization_name' => $organization
		));
						
		return \View::make('login')->with('status', 'You have registered successfully. Log in now!');
	}
}
