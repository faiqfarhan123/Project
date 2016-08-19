<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occurence extends Model
{
	protected $table = 'events';
	protected $guarded = ['id'];
		
	public function GetAgeGroup() {
		return $this->belongsTo('\App\AgeGroup', 'age_group_id', 'id');		
	}
	
	public function GetEventType() {
		return $this->belongsTo('\App\EventType', 'event_type_id', 'id');			
	}
	
	public function GetTicketTypes() {
		return $this->hasMany('\App\TicketType', 'event_info_id', 'id');
	}	
	
	public function GetEventCategory() {
		return $this->belongsTo('\App\EventCategory', 'event_category_id', 'id');
	}
}
