<!DOCTYPE HTML>
<html>
  <head>

    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
	 
    <!-- <link href="./bootstrap.css" rel="stylesheet" /> -->
   <link href="styles.css" rel="stylesheet" /> 
	<title>Create Event</title>	
	 <!-- google font links start -->
	  
	  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,700' rel='stylesheet' type='text/css'>
	<!-- google font end -->
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
	<link href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css' rel='stylesheet' type='text/css'>
	
	<script>
		
		$(function(){
			    
			$('input:file').change(
				function(e){

					var $fileName = $('#uploadFile').prop("files")[0]['name'];

					toastr.options = {
					  "closeButton": true,
					  "positionClass": "toast-bottom-center",
					  "onclick": null,
					  "showDuration": "300",
					  "hideDuration": "1000",
					  "timeOut": "5000",
					  "extendedTimeOut": "1000",
					  "showEasing": "swing",
					  "hideEasing": "linear",
					  "showMethod": "fadeIn",
					  "hideMethod": "fadeOut"
					}

					toastr["success"]('You chose \'' + $fileName + '\'');

				});
		});
		
	</script>
  </head>
  
  <body>
	<nav class="navbar navbar-fixed-top" role="navigation" style = "padding-bottom: 0 ; border-width: 0 0 3px; background-color: #f05f40; border-color: #EF420A; height:50px;">
		<div class="navbar-header">
                
                <a class="navbar-brand" href="/"  >
                    <img src="img/logo.png" alt="" style = "height:50px;" />
                </a>
				
				<a href="/dashboard"><button type="submit" class="btn1 pull-right"  >
				Back to dash board
				</button></a>
            </div>
			
		
			
		
	</nav>
	<h1> Create An Event</h1>
	<hr>
		<form action="createEvent" method="POST" enctype="multipart/form-data">

	<div class="wrapper clearfix">
		<div class="col-lg-8" >
		 <h2> Event Information </h2><hr style = "border: 1px solid #999;">
				{{ Form::token() }}
				
				<br>
				<div class="table-responsive">          
					<table class="table ">
						<tr>
						<!-- <tbody> -->
							<td style = "text-align: right;"> <label>Event Name</label></td>
							<td> <input type="text" class="form-control" style = "width: 95%;" name="ename" placeholder="Enter event name ">
							</td>
							<td></td><td></td>
						</tr>
						<tr>
							<td style = "text-align: right;"> <label>Description </label></td>
							<td> 
								<div class="form-group">
								  <textarea class="form-control" style = "width: 95%;" rows="5" name="description" id="comment"></textarea>
								</div>
							</td>
							<td></td><td></td>
						</tr>
						<tr>
						<!-- <tbody> -->
							<td style = "text-align: right;"> <label>Event Hashtag</label></td>
							<td> <input type="text" class="form-control" style = "width: 95%;" name="hashtag" placeholder="#GraduationAtMIT">
							</td>
							<td></td><td></td>
						</tr>
						<tr>
						<!-- <tbody> -->
							<td style = "text-align: right;"> <label>Age group</label></td>
							<td>
								 <div class="form-group">
									  <select id="myAge" name="myAge" class="form-control">
										<option>Everyone welcome</option>
										<option>25+</option>
										<option>24+</option>
										<option>23+</option>
										<option>22+</option>
										<option>21+</option>
										<option>20+</option>
										<option>19+</option>
										<option>18+</option>
										<option>Other</option>
									  </select>
									  <div id="AGEDIV"></div>
									</div>
						</td>
							<td></td><td></td>
						</tr>
						<tr>
						<!-- <tbody> -->
							<td style = "text-align: right;"> <label>Event type</label></td>
							<td> 
								
								<div class="form-group">
									  <select id="myEventType" class="form-control" name="myEventType">
											<option>Conference</option>
											<option>Seminar</option>
											<option>Meeting</option>
											<option>Business Dinner</option>
											<option>Press Conference</option>
											<option>Opening Ceremony</option>
											<option>Award Ceremony</option>
											<option>Wedding</option>
											<option>Birthday</option>
											<option>Wedding Anniversary</option>
											<option>Family Event</option>
											<option>Other</option>
									  </select>
									  <div id="EVENTDIV"></div>
									</div>
									
							</td>
							<td></td><td></td>
						</tr>
						<tr>
						<!-- <tbody> -->
							<td style = "text-align: right;"> <label>Event category</label></td>
							<td>
								<div class="form-group">
									  <select id="myEventCategory" class="form-control" name="myEventCategory">
											<option>Arts</option>
											<option>Music</option>
											<option>Concert</option>
											<option>Comedy</option>
											<option>Festival</option>
											<option>Social</option>
											<option>Party</option>
											<option>Theater</option>
											<option>Nightclub</option>
											<option>Ceremony</option>
											<option>Sports</option>
											<option>Religious</option>
											<option>Startup</option>
											<option>Education</option>
											<option>Performance</option>
											<option>Community</option>
											<option>Other</option>
									  </select>
									  <div id="EVENTCAT"></div>
									</div>
							</td>
							<td></td><td></td>
						</tr>	
						<!-- </tbody> -->
					</table>
				</div>

  	</div></div>

		<form action="createEvent" method="POST" enctype="multipart/form-data">
  	
	<div class="wrapper clearfix">
		<div class="col-lg-8" >
		 <h2> Appearance </h2><hr style = "border: 1px solid #999;">
				
				<div class="table-responsive">          
					<table class="table ">
						<tr >
						<!-- <tbody> -->
							<td style = "text-align: right;"> <label>Choose Image</label></td>
							<td> <div class="btn btn-default btn-file">
										Add.. <input id="uploadFile" type="file" class="image" name="uploadFile">
										
								</div>
							</td>
							
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						</tr>
						
						<!-- </tbody> -->
					</table>
				</div>

				
		</div>
					
        
	</div>

		<form action="createEvent" method="POST" enctype="multipart/form-data">
	
	<div class="wrapper clearfix">
		<div class="col-lg-8" >
		 <h2>Location</h2><hr style = "border: 1px solid #999;">
				
				<div class="table-responsive">          
					<table class="table ">
						<tr>
						<!-- <tbody> -->
							<td style = "text-align: right;"> <label>Venue name</label></td>
							<td> <input type="text" class="form-control" name="venue" data-provide="typeahead" placeholder="Enter venue name " id="venue"></td>
						</tr>
						<tr>
							<td style = "text-align: right;"> <label>Presenter </label></td>
							<td> <input type="text" class="form-control" name="presenter" placeholder="Presenter name "></td>
						</tr>
						<!-- </tbody> -->
					</table>
				</div>
		</div>
	</div>
	
		<form action="createEvent" method="POST" enctype="multipart/form-data">

	<div class="wrapper clearfix">
		<div class="col-lg-8" >
		 <h2> Date and Time </h2><hr style = "border: 1px solid #999;">
				
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th  class='myClass' style = "text-align: center; font-size: 17px; border-top: 1px solid #999;">Starts</th>
								<th  class='myClass' style = "text-align: center; font-size: 17px; border-top: 1px solid #999;">Ends</th>
							 </tr>
						</thead>
						<tbody >
							<tr>
								<td style = "text-align: center;"> 
									<div id="datetimepicker1" class="input-append date">
										<!-- <label>Starts</label> -->
											<input type="text" name="sdate" style = "width: 45%;" placeholder="Choose starting date and time"></input>
												<span class="add-on"  >
													<i data-time-icon="icon-time" data-date-icon="icon-calendar"  ></i>
												</span>
									</div>
								</td>
								<td style = "text-align: center;"> 
									<div id="datetimepicker2" class="input-append date">
											  <input type="text" style = "width: 45%;" name="edate" placeholder="Choose ending date and time"></input>
											  <span class="add-on" >
												<i data-time-icon="icon-time" data-date-icon="icon-calendar"  ></i>
											  </span>
									</div>
								</td>
							</tr>
					  
						</tbody>
					</table>
					         
					<table class="table ">
						<tr>
						<!-- <tbody> -->
							<td style = "text-align: right;"> <label>Sales cut off Date</label></td>
							<td> 
								<div id="datetimepicker3" class="input-append date">
								  <input type="text" style = "width: 113%;" name="cutoffdate" placeholder="Enter sales cutting off date and time"></input>
								  <span class="add-on" >
									<i data-time-icon="icon-time" data-date-icon="icon-calendar"  ></i>
								  </span>
								</div>
							</td>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						</tr>
						<tr>
							<td style = "text-align: right;"> <label>Sales cut off message </label></td>
							<td> <input type="text" class="form-control" style = "width: 120%;" name="cutoffmsg" placeholder="Enter cut off message "></td>
							<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						</tr>
						<!-- </tbody> -->
					</table>
		</div>
				
				
	</div>        
</div>			
		
		<form action="createEvent" method="POST" enctype="multipart/form-data">

	<div class="wrapper clearfix">
		<div class="col-lg-8" >
		 <h2> Ticket Types </h2><hr style = "border: 1px solid #999;">
				
				<div class="table-responsive">
					<table class="table table-bordered" id = "myTable" style="width: 100%">
						<thead>
							<tr>
								<th  class='myClass' style = "border-top: 1px solid #999;">Name</th>
								<th  class='myClass' style = "border-top: 1px solid #999;">Inventory</th>
								<th  class='myClass' style = "border-top: 1px solid #999;">Pricing</th>
								<th  class='myClass' style = "border-top: 1px solid #999;">Price (PKR)</th>
								
								<th  class='myClass' style = "border-top: 1px solid #999;">Option</th>
							 </tr>
						</thead>
						<tbody >
							<tr>
								<td > 
									<input type="text" class="form-control"  name="tname[]" placeholder="Eg - Adult, Child, etc ">
								</td>
								<td > 
									<input type="text" class="form-control"  name="inventory[]" placeholder="Eg - 10, 15 etc">
								</td>
								<td>
									<div class="form-group">
                                            <select class="form-control" name="delivery[]">
                                                <option>Paid</option>
                                                <option>Free</option>
                                                
                                            </select>
                                        </div>
								</td>
								
								<td > 
									<input class="form-control" type="text" name="tprice[]" placeholder="Eg - 0, 15, 50, 100 etc">
								</td>
								
								
								<td>
									<button type="cancel" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>
								</td>
							</tr>
						</tbody>
						</table>
					<table>
						<tr>
							<td width="50%">

								
							</td>
							<td nowrap>
								 
							</td>
						           
        <td width="80%"></td>

        <td nowrap><label>Add another ticket &nbsp;&nbsp;&nbsp;
								<a  class = "btn btn-default" href="javascript:void(0);" id = "free" type="free">Free</a> 
								<a  class = "btn btn-default" href="javascript:void(0);" id = "paid" type="paid">Paid</a></label> </td>
								
    </tr>
					</table>

				
		</div>				
	</div>        
	
</div>		

<button type="submit" class="btn btn-primary pull-right" >Register</button>
</form>		

    <script type="text/javascript"
     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
    </script> 
    <script type="text/javascript"
     src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
    </script>
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script>
   		  
     <script type="text/javascript">

      $('#datetimepicker1').datetimepicker({
        format: 'dd/MM/yyyy hh:mm:ss',
        language: 'pt-EN'
      });
	  $('#datetimepicker2').datetimepicker({
        format: 'dd/MM/yyyy hh:mm:ss',
        language: 'pt-EN'
      });
	  $('#datetimepicker3').datetimepicker({
        format: 'dd/MM/yyyy hh:mm:ss',
        language: 'pt-EN'
      });
    </script>	
<script>
		$(document).ready(function() {
		
			$('#myAge').change(function() {
				if ($(this).val() === 'Other') {
					$('#AGEDIV').html('<input type="text" class="form-control" id="extraAge" name="extraAge" placeholder="Enter age e.g. 30+"></input>');
				} else {
					$('#AGEDIV').html('');
			}});
	
			$('#myEventType').change(function() {
				if ($(this).val() === 'Other') {
					$('#EVENTDIV').html('<input type="text" class="form-control" id="extraEventType" name="extraEventType" placeholder="Enter an event type"></input>');
				} else {
					$('#EVENTDIV').html('');
			}});
		
			$('#myEventCategory').change(function() {
		    if ($(this).val() === 'Other') {
				$('#EVENTCAT').html('<input type="text" class="form-control" id="extraEventCategory" name="extraEventCategory" placeholder="Enter an event category"></input>');
		    } else {
				$('#EVENTCAT').html('');
			}});

		    $('#free').click(function() {
		       $('#myTable tbody').append("<tr><td><input type='text' class='form-control'  name='tname[]' placeholder='Eg - Adult, Child, etc '> </td> <td ><input type='text' class='form-control'  name='inventory[]' placeholder='Eg - 10, 15 etc'> </td> <td> <div class='form-group'><select class='form-control' name='delivery[]'><option>Paid</option><option selected='true'>Free</option></select></div></td><td><input class='form-control' type='text' name='tprice[]' placeholder='0' value='0' readonly /></td><td><button type='cancel' class='btn btn-danger' onclick='deleteRow(this)'>Delete</button></td></tr>");
		    });
		    
			$('#paid').click(function() {
		       $('#myTable tbody').append("<tr><td><input type='text' class='form-control'  name='tname[]' placeholder='Eg - Adult, Child, etc '> </td> <td ><input type='text' class='form-control'  name='inventory[]' placeholder='Eg - 10, 15 etc'> </td> <td> <div class='form-group'><select class='form-control' name='delivery[]'><option selected='true'>Paid</option><option>Free</option></select></div></td><td><input class='form-control' type='text' name='tprice[]' placeholder='Eg - 15, 50, 100 etc'></td><td><button type='cancel' class='btn btn-danger' onclick='deleteRow(this)'>Delete</button></td></tr>");
				
		    });
});
	</script>
	
	<div class="notifyjs-corner" style="top: 0px; right: 0px;"></div>
	
	<script>
		
		function deleteRow(r) {
			var i = r.parentNode.parentNode.rowIndex;
			document.getElementById("myTable").deleteRow(i);		
		}

	</script>
	
	<style>
		body {
		font-family: Raleway;
		}

		h1,h2,h3,h4 {
		font-family: Montserrat;
		}
	</style>
	</div>
	</div>
  </body>
</html>
