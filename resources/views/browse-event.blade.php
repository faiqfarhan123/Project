@extends('layouts.master2')
@section('title')
Search Events
@endsection

@section('content')

	<form action="/returnEvents" method="POST">
		{{ Form::token() }}
		<div class="field" id="searchform">
		  <input type="text" name="searchquery" id="searchquery" placeholder="Search event(s)" />
		  <button type="submit" id="search" >Search</button>
		</div>
	</form>
	
	<div class = "container">	
		@if ($notFound == "true")
			<?php
				$allEvents = null;
				echo '<h1>No search results found.</h1>';
			?>
		@elseif ($notFound == "false")
			@foreach($allEvents as $event)
				<?php

					$eventName = $event->name;
					$imageEncode = base64_encode($event->flyer);
					$eventCategory = \App\EventCategory::find($event->event_category_id)->name;
					$eventType = \App\EventType::find($event->event_type_id)->name;
					$venuename = $event->venue_name;

					$eventID = $event->id;
					$eventHashTag = $event->hashtag;

					echo <<<EOT
							<div class = col-md-4>
							<table style = "background: #ddd; margin-bottom: 20px;">
								<tr >
								<td align = center>
								<br>
									<img class="img-responsive img-rounded" src="data:image/jpeg;base64,$imageEncode" alt="">
								</td>
								</tr>
								<tr >
								<td align =center>
								<h2 style = "color: #f05f40;text-transform: Uppercase;" >
									$eventName
								</h2>
								</td>
								</tr>
								
								<tr>
									<td>
										<h2>Venue: $venuename</h2>
									</td>
								</tr>
								
								<tr>
								<td>
									<b>Hashtag:</b> $eventHashTag
								<br>
									<b>Category:</b> $eventCategory
								<br>
									<b>Type:</b> $eventType
								<br>
								</td>
								</tr>
								<tr>
								<td>
								<a href="/showEvent/$eventID"><button style = "background: #f05f40; width: 100%; color: #fff; padding-top: 5px; padding-bottom: 5px;">Visit page</button></a>
								</td>
								</tr>
								<tr>
									<td>
										<br/>
										<br/>
									</td>
								</tr>
								</table>
								
							</div>
EOT;
				?>
			@endforeach
		@else
			<?php
				echo '<h1>Welcome to search page!</h1>';
			?>
		@endif
    </div>

@endsection

@section('css')
<style>

img{
	max-height: 190px;
	<!-- max-width: 	150px; -->
}
.field {
  display:flex;
  position:realtive;
  margin:5em auto;
  width:70%;
  flex-direction:row;
  box-shadow:
   1px 1px 0 #f05f40,
   2px 2px 0 #f05f40,
   3px 3px 0 #f05f40,
   4px 4px 0 #f05f40,
   5px 5px 0 #f05f40,
   6px 6px 0 #f05f40,
   7px 7px 0 #f05f40
  ;
}

.field>input[type=text],
.field>button {
  display:block;
  font:1.2em 'Montserrat Alternates';
}

.field>input[type=text] {
  flex:1;
  padding:0.6em;
  border:0.2em solid #f05f40;
}

.field>button {
  padding:0.6em 0.8em;
  background-color:#f05f40;
  color:white;
  border:none;
}
</style>
@endsection