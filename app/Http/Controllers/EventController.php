<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

class EventController extends Controller
{
	public function createForm() {
		return \View::make('createEvent');
	}
	
	public function createEvent() {
		$userID = \Session::get('userID');
		$userType = \Session::get('userType');

		$get_age_group_id = null;
		$get_event_category_id = null;
		$get_event_type_id = null;

		$ticket_name = Input::get('tname');
		$ticket_inventory = Input::get('inventory');
		$ticket_delivery = Input::get('delivery');
		$ticket_price = Input::get('tprice');
		
		$eventName = Input::get('ename');
		$description = Input::get('description');
		$hashtag = Input::get('hashtag');
		$age_group = Input::get('myAge');
		$event_category = Input::get('myEventCategory');
		$event_type = Input::get('myEventType');
		$venue = Input::get('venue');
		
		if ($age_group == 'Other') {
			$age_group = Input::get('extraAge');

			$get_age_group_id = \DB::table('age_groups')->where('age', '=', $age_group)->value('id');

			if ($get_age_group_id == null) {
				$addedAgeGroup = \App\AgeGroup::create(array('age' => $age_group));
				$get_age_group_id = $addedAgeGroup->id;
			}
		} else {
			$get_age_group_id = \DB::table('age_groups')->where('age', '=', $age_group)->value('id');
		}

		if ($event_category == 'Other') {
			$event_category = Input::get('extraEventCategory');
			
			$get_event_category_id = \DB::table('event_categories')->where('name', '=', $event_category)->value('id');
			
			if ($get_event_category_id == null) {
				$addedEventCategory = \App\EventCategory::create(array('name' => $event_category));
				$get_event_category_id = $addedEventCategory->id;
			}
		} else {
			$get_event_category_id = \DB::table('event_categories')->where('name', '=', $event_category)->value('id');
		}
		
		if ($event_type == 'Other') {
			$event_type = Input::get('extraEventType');

			$get_event_type_id = \DB::table('event_types')->where('name', '=', $event_type)->value('id');
			
			if ($get_event_type_id == null) {
				$addedEventType = \App\EventType::create(array('name' => $event_type));
				$get_event_type_id = $addedEventType->id;
			}
		} else {
			$get_event_type_id = \DB::table('event_types')->where('name', '=', $event_type)->value('id');
		}
		
		$presenter = Input::get('presenter');
		
		$sdate = Input::get('sdate');
		$edate = Input::get('edate');
		$cutoffdate = Input::get('cutoffdate');
		
		$START_DATE_YYYY = explode('/', explode(' ', $sdate)[0])[2];
		$START_DATE_MM = explode('/', explode(' ', $sdate)[0])[1];
		$START_DATE_DD = explode('/', explode(' ', $sdate)[0])[0];
		$START_DATE = $START_DATE_YYYY . '-' . $START_DATE_MM . '-' . $START_DATE_DD;
		$START_TIME = explode(' ', $sdate)[1];
		
		$END_DATE_YYYY = explode('/', explode(' ', $edate)[0])[2];
		$END_DATE_MM = explode('/', explode(' ', $edate)[0])[1];
		$END_DATE_DD = explode('/', explode(' ', $edate)[0])[0];
		$END_DATE = $END_DATE_YYYY . '-' . $END_DATE_MM . '-' . $END_DATE_DD;
		$END_TIME = explode(' ', $edate)[1];
		
		$CUTOFF_DATE_YYYY = explode('/', explode(' ', $cutoffdate)[0])[2];
		$CUTOFF_DATE_MM = explode('/', explode(' ', $cutoffdate)[0])[1];
		$CUTOFF_DATE_DD = explode('/', explode(' ', $cutoffdate)[0])[0];
		$CUTOFF_DATE = $CUTOFF_DATE_YYYY . '-' . $CUTOFF_DATE_MM . '-' . $CUTOFF_DATE_DD;
		$CUTOFF_TIME = explode(' ', $cutoffdate)[1];
		
		$cutoffmsg = Input::get('cutoffmsg');
		$fileBinary = file_get_contents($_FILES['uploadFile']['tmp_name']);
		$get_event_organizer_id = json_decode(\App\User::find($userID)->GetEventOrganizer, true)['id'];
		
		$addedEvent = \App\Occurence::create(array(
			'name' => $eventName,
			'presenter' => $presenter,
			
			'start_date' => $START_DATE,
			'start_time' => $START_TIME,

			'end_date' => $END_DATE,
			'end_time' => $END_TIME,

			'sales_cut_off_date' => $CUTOFF_DATE,
			'sales_cut_off_time' => $CUTOFF_TIME,
			'sales_cut_off_message' => $cutoffmsg,
			
			'flyer' => $fileBinary,
			'description' => $description,
			'hashtag' => $hashtag,
			'venue_name' => $venue,

			'age_group_id' => $get_age_group_id,
			'event_type_id' => $get_event_type_id,
			'event_category_id' => $get_event_category_id,
			'event_organizer_id' => $get_event_organizer_id
		));
		
		$added_event_id = $addedEvent->id;

		$i = 0;
		$count = count($ticket_name);
		
		for ($i; $i < $count; $i ++) {
			
			$price_enum_id = null;

			if ($ticket_delivery[$i] == 'Paid') {
				$price_enum_id = 2;
			} else if ($ticket_delivery[$i] == 'Free') {
				$price_enum_id = 1;
			}
						
			\App\TicketType::create(array(
				'name' => $ticket_name[$i],
				'price_type' => $price_enum_id,
				'inventory' => $ticket_inventory[$i],
				'event_info_id' => $added_event_id,
				'price' => $ticket_price[$i]
			));
		}
		
		return \Redirect::to('displayEvents');
	}
	
	public function deleteEvent($id) {
		$loggedIn = \Session::get('userID');
		$eventToDelete =\App\User::find($loggedIn)->GetEventOrganizer->GetArrangedEvents->first();
		$eventToDelete->delete();

		return \Redirect::to('displayEvents');
	}
	
	public function showEvent($id) {
		$eventInfo = \App\Occurence::find($id);
		
		return \View::make('event')->with('event', $eventInfo);
	}
	
	public function display() {
		$userID = \Session::get('userID');
		
		$getEventOrganizer = \App\User::find($userID)->GetEventOrganizer;		
		$getAllEvents = $getEventOrganizer->GetArrangedEvents;
		
		if ($getAllEvents != null) {
			$getAllEvents = $getAllEvents->sortBy('name');		
			return \View::make('allEvents')->with('objects', $getAllEvents);	
		} else {
			return \View::make('allEvents')->with('objects', null);
		}
		
	}
	
	public function returnEvents() {
		$query = Input::get('searchquery');
		$query = "%" . $query . "%";		
		$allEvents = \App\Occurence::where('name', 'LIKE', $query)->get();
		
		$notFound = "false";
		
		if (count($allEvents) == 0) {
			$allEvents = null;
			$notFound = "true";
		}
		
		return \View::make('browse-event')->with('notFound', $notFound)->with('allEvents', $allEvents);
	}
	
	public function purchaseEvent($id) {
		$get_ticket_buyer = \App\User::find(\Session::get('userID'))->GetTicketBuyer;

		$ticket_purchase = \App\TicketPurchase::create(array(
			'ticket_buyer_id' => $get_ticket_buyer->id,
			'ticket_type_id' => $id,
			'quantity' => 1
		));
		
		$ticket_purchase->transaction_id = uniqid();
		$ticket_purchase->save();

		return \Redirect::to('dashboard');
	}
}