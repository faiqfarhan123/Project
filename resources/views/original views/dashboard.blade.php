<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Event Organizer</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
	
	 <!-- google font links start -->
	  
	  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,700' rel='stylesheet' type='text/css'>
	<!-- google font end -->
	
	
	
	
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="assets/img/logo.png" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                    
              

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>

                        <li class="divider"></li>
                        <li><a href="logout"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            
                            <div class="user-info">
                                <div><h3>Event Organizer<h3/></div>
                                <div class="user-text-online">
                                    
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">

                    </li>
                    <li class="selected">
                        <a href="#"><i class="fa fa-dashbo fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="/displayEvents"><i class="fa fa-tab fa-fw"></i>Events</a>
                    </li>            
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                       <b>&nbsp;Hello! </b>Welcome <b>{{ Session::get('fullName') }}</b>
 
                    </div>
                </div>
                <!--end  Welcome -->
            </div>



            <div class="row"> 
                <div class="col-lg-8">
				    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
								<h3>RECENT ORDERS</h3>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" name="dash-r-event">
                                    <thead>
                                        <tr>
                                            <th>EVENT</th>
                                            <th>TICKETS ASSOCIATED</th>
                                            <th>TICKETS SOLD [ONLY PAID]</th>
                                            <th>DISCOUNT</th>
											<th>TOTAL</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                  	
                                  	
                                  	
                                  	
										<?php $className = 'odd'; 
										 $objects = \App\User::find(Session::get('userID'))->GetEventOrganizer->GetArrangedEvents;
										?>
										
										@if ($objects != null)
                                        @foreach ($objects as $obj)
                                            
                                            <?php
											if ($className == 'even') {
												$className = 'odd';
											}
											?>
											
											<tr class = "{{ $className }} gradeA">
												<td><a href="/showEvent/{{ $obj['id'] }}">{{ $obj['name'] }}</a></td>
												<td>
												<?php
													$number_of_tickets = $obj->GetTicketTypes;
													echo count($number_of_tickets);
												?>
												
												</td>
												<td>
													<?php
													$addIntoMe = 0;
													
													foreach ($number_of_tickets as $simpleTicket) {
														$simpleTicketPurchases = $simpleTicket->GetTicketPurchases;
														
														foreach ($simpleTicketPurchases as $tinyPurchase) {
															if ($tinyPurchase->transaction_id != null) {
																$addIntoMe += 1;
															}	
														}
													}
													
													echo $addIntoMe;
													?>
													
												</td>
												<td>$0.00</td>
												<td>
													
												<?php
													$keepTrackofMoney = 0;
													
													foreach ($number_of_tickets as $simpleTicket) {
														$simpleTicketPurchases = $simpleTicket->GetTicketPurchases;
														
														foreach ($simpleTicketPurchases as $tinyPurchase) {
															if ($tinyPurchase->transaction_id != null) {
																$keepTrackofMoney += $simpleTicket->price;
															}	
														}
													}
													
													echo $keepTrackofMoney . ".00";
													?>
												
												</td>
                                        
											</tr>
											
											<?php $className = 'even'; ?>
                                        @endforeach
                                        @endif
     
                                     
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
		
                </div>
            </div>
                </div>
            </div>


         
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>
		
	<style>
        body {
            font-family: Raleway;
        }

        h1,h2,h3,h4 {
            font-family: Montserrat;
        }
	
	</style>
	
</body>

</html>
