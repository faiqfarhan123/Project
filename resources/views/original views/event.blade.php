<!DOCTYPE html>
<html lang="en">

<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Event Details</title>

		<!-- Bootstrap Core CSS -->
		<link href="/events/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="/events/css/project.css" rel="stylesheet">

		<link href="/events/css/main.css" rel="stylesheet"> 
		<link rel="stylesheet" type="text/css" href="/events/css/style3.css" />
		<link rel="stylesheet" href="/events/font-awesome-4.5.0/css/font-awesome.min.css" type="text/css">


		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,700' rel='stylesheet' type='text/css'>
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
                    <img src="/events/Drawing.png" alt="">
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

    <!-- Page Content -->
    <div class="container" >
		
		<div class="row">
		<div class="col-md-2">
			<div class = "box">
				<p id = "start-date" class = "date"><?php $PHPDate = strtotime($event['start_date']); echo date('M d', $PHPDate); ?></p>
					<div class = "divider">
						<span> to </span>
					</div>
				<p id = "end-date" class = "date"><?php $PHPDate = strtotime($event['end_date']); echo date('M d', $PHPDate); ?></p>
			</div>
		</div>
			
			
		<div class="col-md-6">
                <h1>{{ $event['name'] }}</h1>
		</div>
		
		<div class= "col-md-4">
			<div class = "venue">
				<h2>{{ $event['venue_name'] }}</h2>
					<div class = "address">
						<p>
						<br>
						<span class = "time"> 										<?php $timestamp = strtotime($event['start_time']);
											echo date("h:i A", $timestamp);
										?> - 										<?php $timestamp = strtotime($event['end_time']);
											echo date("h:i A", $timestamp);
										?> </span>
						<br>
						<span>{{ $event->GetAgeGroup['age'] }}</span>
						<br>
						<span>{{ $event->GetEventCategory->name }}</span>
						<br>
						<span>{{ $event->GetEventType->name }}</span>
						<br>
						<span>{{ $event->hashtag }}</span>
						</p>
					</div>
					<!-- <div>
						<p> 12:00 PM </p>
					</div> -->
			</div>
		</div>
</div>
        <!-- Heading Row -->
        <div class="row" style = "border-bottom: none">
            <div class="col-md-8">
				<div>	
<img class="img-responsive" style= "max-height: 700px; max-width: 700px; width: auto; height: auto; margin: 10px 0 10px 0" src="data:image/jpeg;base64,<?php echo base64_encode($event['flyer']); ?>" alt="">				</div>
				<div class = "event-detail">
					<div class = "artist">
						<h2>
							Description
						</h2>
					</div>
					<p>
							{{ $event['description'] }} 
					</p>
				</div>
				
				<div class = "event-detail">
					<div class = "artist">
						<h2>
							Tickets Purchase
						</h2>
					</div>
					<p>
							Sales cuttoff date and time: <?php $PHPDate = strtotime($event['sales_cut_off_date']); echo date('M d', $PHPDate); ?> <?php $timestamp = strtotime($event['start_time']);
											echo date("h:i A", $timestamp);
										?><br />
							Sales cutoff message:
							{{ $event['sales_cut_off_message'] }}
							<br />
							<?php

								$getAllTickets = \App\TicketType::where('event_info_id', $event['id'])->get(); ?>

@foreach ($getAllTickets as $ticket)
<?php
echo '<table style="background: #ddd; margin-bottom: 0; width: 100%; border-bottom: 1px solid #f05f40">';

echo <<<EOT


						<tr>
							<td style="width: 15%;">
								<p style = "margin-left: 10px">
								{$ticket['price_type']}
								</p>
								</td>
								
							<td></td>
					
					<td align="left" style = "width: 50%; ">
						<h3 style = "color: #f05f40;text-transform: Uppercase; margin-top: -5px; font-weight: 500; font-size: 15px" >
								{$ticket['name']} - \${$ticket['price']}
						</h3>
					</td>
					
					<td align="right">
						<table>
							<tr>
								<td>
EOT;

									if (Session::get('userType') == 'ticket_buyer') {
echo <<<EOT
									<a href="/purchaseEvent/{$ticket['id']}"><button class="btn1">Purchase</button></a>
EOT;
}
									
									
echo <<<EOT
								</td>
								
							</tr>
							
							<tr>
								<td>
									
								</td>
							</tr>
							<tr>
								<td>
									<p>	
										<!-- Doors: 8:00 pm -->
									</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
EOT;

echo '</table>';

?>

@endforeach
							

					</p>
				</div>
			</div>

			

        <!-- /.row -->

		</div>
		 
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
    <script src="/events/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/events/js/bootstrap.min.js"></script>
	
	
	
	<style>
body{
font-family: Raleway;
}

h1,h2,h3,h4{
font-family: Montserrat;
}
	
	table {
    width:100%;
    padding: 0;
    margin: 0;
    border: 0;
    border-collapse: collapse;
	cellpadding: 0;
	cellspacing: 0;
}

td {
width:176px;
padding: 0 10px 0 0;
margin: 0;
border: 0;
cellpadding: 0;
cellspacing: 0;
}

	.btn1 {
	margin:6px 0 0 0; 
	padding: 10px 20px 8px 20px; 
	background: #f05f40; 
	border: 1px solid #fff; 
	color: #fff; 
	font-size: 20px;
	border-radius: 5px;
}

.btn1:hover{
	background: #f77d63;
}

</style>

</body>

</html>
