<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketBuyer extends Model
{
    protected $table = 'ticket_buyers';
	protected $guarded = ['id'];

	public function GetTicketPurchases() {
		return $this->hasMany('\App\TicketPurchase', 'ticket_buyer_id', 'id');
	}
}
