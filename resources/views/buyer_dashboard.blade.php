@extends('layouts.master3')
@section('title')
Dashboard
@endsection
@section('navbar')
<nav class="navbar-default navbar-static-side" role="navigation">
    <!-- sidebar-collapse -->
    <div class="sidebar-collapse">
        <!-- side-menu -->
        <ul class="nav" id="side-menu">
            <li>
                <!-- user image section-->
                <div class="user-section">
                    
                    <div class="user-info">
                        <div><h3>Ticket Buyer<h3/></div>
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
                <a href="/search_event"><i class="fa fa-dashbo fa-fw"></i>Browse events</a>
            </li>
                                
        <!-- end side-menu -->
    </div>
    <!-- end sidebar-collapse -->
</nav>
@endsection

@section('content')
<div id="page-wrapper">

    
    <div class="row">
         <!--  page header -->
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard - {{ Session::get('fullName') }}</h1>
        </div>
         <!-- end  page header -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h3>Orders</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                	<th>Ticket</th>
                                    <th>Type</th>
                                    <th>Event</th>
                                    <th>Price (PKR)</th>
                                    <th>Time bought</th>
                                    <th>Download ticket</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $className = 'odd';
								$getTicketBuyer = \App\User::find(Session::get('userID'))->GetTicketBuyer;
								$objects = $getTicketBuyer->GetTicketPurchases;
								
								?>
								
								@if ($objects != null)
                                @foreach ($objects as $obj)
                                    
                                    <?php
									if ($className == 'even') {
										$className = 'odd';
									}
									?>
									
									<tr class = "{{ $className }} gradeA">
										<?php $GetTicketType = $obj->GetTicketType; $GetEvent = $GetTicketType->GetEvent ?>
										<td>{{ $GetTicketType->name }}</td>
										<td>{{ $GetTicketType->price_type }}</td>
										<td><a href="/showEvent/{{ $GetEvent->id }}">{{ $GetEvent->name }}</a></td>
										<td>{{ $GetTicketType->price . ".00" }}</td>
										<td>{{ $obj['created_at'] }}</td>
										<td><a href="/pdf_generate/{{ $obj['id'] }}">Click here</a></td>
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
@endsection