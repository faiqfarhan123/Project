<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Details</title>
	
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,700' rel='stylesheet' type='text/css'>

    <!-- Bootstrap Core CSS -->
    <link href="events/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="events/css/project.css" rel="stylesheet">

	<link href="events/css/main.css" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="events/css/style3.css" />
    <link rel="stylesheet" href="events/font-awesome-4.5.0/css/font-awesome.min.css" type="text/css">
    
	<!-- social buttons -->
	
    <link href="events/css/bootstrap-social.css" rel="stylesheet">
	<link href="events/css/bootstrap-social.less" rel="stylesheet">
	
	<!-- footer -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

</head>

<body >

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style = "padding-bottom: 0 ; border-width: 0 0 3px; background-color: white; border-color: #EF420A; >
        <div class="container-fluid" style="margin-right: 30px;"">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="Drawing.png" alt="">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                <ul class="nav navbar-nav navbar-right" style = "margin-left: 50px; margin-right: 20px; color: black;" >
                    
					
					
						 <a class ="btn btn-default" style = "border-radius: 0; border: 1px; padding: 15px 15px 15px 15px; background-color: #f05f40; color:white; " href = "/dashboard"> 
						 Back to dashboard
						 </a>
						 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	
	<form action="/returnEvents" method="POST">
		{{ Form::token() }}
		<div class="field" id="searchform">
		  <input type="text" name="searchquery" id="searchquery" placeholder="Search event(s)" />
		  <button type="submit" id="search" >Search</button>
		</div>
	</form>
	
	<!-- Page Content -->
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
    <!-- /.container -->

	<!-- Footer -->
        <footer class="footer-distributed">

			<div class="footer-left">

				<h3>Ticket<span>Manager</span></h3>

				<p class="footer-links">
					<a href="#">Home</a>
				
					<a href="#">How it Works</a>
					
					<a href="#">Events</a>
					
					<a href="#">Pricing</a>
					
					<a href="#">About</a>
					
				</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>House</span> City, Country</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+00 00 00 00</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">support@company.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About the company</span>
					We are web developers, email us for any queries.
				</p>

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>

			</div>

		</footer>
	
 <!-- jQuery -->
    <script src="events/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="events/js/bootstrap.min.js"></script>

</body>
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


</html>
