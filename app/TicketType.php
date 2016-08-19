<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
	protected $table = 'ticket_types';
	protected $guarded = ['id'];
	
	public function GetEvent() {
		return $this->belongsTo('\App\Occurence', 'event_info_id', 'id');
	}
	
	public function GetTicketPurchases() {
		return $this->hasMany('\App\TicketPurchase', 'ticket_type_id', 'id');
	}
}
