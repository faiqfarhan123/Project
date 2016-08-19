<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TicketController extends Controller
{
	public function getPDF($id) {
		$userID = \Session::get('userID');
		$ticket_buyer = \App\User::find($userID)->GetTicketBuyer; // Get the ticket buyer
		$ticket_purchase = \App\TicketPurchase::find($id); // Get the ticket purchase
		$ticket_type = $ticket_purchase->GetTicketType; // Get the ticket type
		$event = $ticket_type->GetEvent; // Get the event
		$name = $ticket_buyer->name; // Get the ticket buyer's name
		$ticketname = $ticket_type->name;
		$generatedRandomCode = $ticket_purchase->transaction_id; // Get random code for the purchase
			
		$eventname = $event->name; // Get event's name
		
		$timestamp = strtotime($event['start_time']); // Get event's start time
		$starttime = date('h:i:s A', $timestamp);

		$PHPDate = strtotime($event['start_date']); // Get event's start date
		$startdate =  date('l jS \of F Y', $PHPDate);
		
		$datetime = $startdate . ' ' . $starttime; // Combine start date and time
		$venuename = $event->name; // Get venue's name
		
		$total = $ticket_type->price; // Get the price of the ticket
				
		$html2pdf = new \HTML2PDF('P', 'A4', 'en');
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->pdf->SetDisplayMode('fullpage');
		$html2pdf->WriteHTML('<page format="110x120" orientation="L" backcolor="#FFFFFF" style="font: arial;"><table align="center"><tr><td><h1>TICKET INFORMATION</h1></td></tr></table><br />Mr/Ms ' . $name . ',<br />Below are your order details:<br /><h4><b>Order summary</b></h4><b>Ticket name: </b>' . $ticketname . '<br /><b>Event name: </b>'. $eventname . '<br /><b>Date and time: </b>' . $datetime . '<br /><b>Venue name: </b>' . $venuename . '<br /><br /><b>Total: </b>$'. $total . '.00<br /><br />Thank you for using our services!<br /><br /><div align="right"><qrcode value="'. $generatedRandomCode . '" ec="H" style="width: 15mm; border: none; background-color: white; color: black;"></qrcode></div></page>');
		$html2pdf->Output(date("h-i-s a") . '.pdf', 'D');
	}
}
