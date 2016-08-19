<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventOrganizer extends Model
{
    protected $table = 'event_organizers';
    protected $guarded = ['id'];

    public function GetArrangedEvents() {
    	return $this->hasMany('\App\Occurence', 'event_organizer_id', 'id');
    }
}
