@extends('layouts.master2')
@section('title')
Event Description
@endsection

@section('content')
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
		</div>
    </div>
    <!-- /.container -->
@endsection
 
@section('css')

	<style>
	
	body {
		font-family: Raleway;
	}

	h1,h2,h3,h4 {
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

	.btn1:hover {
		background: #f77d63;
	}

	</style>

@endsection