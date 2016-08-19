<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketPurchase extends Model
{
    protected $table = 'ticket_purchases';
	protected $guarded = ['id'];

	public function GetTicketType() {
		return $this->belongsTo('\App\TicketType', 'ticket_type_id', 'id');
	}

	public function GetTicketBuyer() {
		return $this->belongsTo('\App\TicketBuyer', 'ticket_buyer_id', 'id');
	}
}
