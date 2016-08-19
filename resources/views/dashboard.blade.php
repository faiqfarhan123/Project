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
@endsection

@section('content')
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
        </div>
    </div>
@endsection