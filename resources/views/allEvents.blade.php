@extends('layouts.master3')
@section('title')
All Events
@endsection

@section('navbar')
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <div class="user-section">
                        
                        <div class="user-info">
                            <div><strong><h3>Event Organizer<h3/></strong></div>
                            <div class="user-text-online">
                                
                            </div>
                        </div>
                    </div>
                </li>
                <li class="sidebar-search">
                </li>
                
                <li class="">
                    <a href="/dashboard"><i class="fa fa-dashbo fa-fw"></i>Dashboard</a>
                </li>
               <li class="selected">
                    <a href="#"><i class="fa fa-ta fa-fw"></i>Events</a>
                </li>
                
                </ul>
        </div>
    </nav>
@endsection

@section('content')
    <div id="page-wrapper">
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Events</h1>
            </div>
        </div>

     <button type="button" class="btn btn-outline btn-primary btn-lg" onclick="window.location='/createEvent';">Create Event</a></button>
     <br /><br />


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                         Events records
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Presenter</th>
                                        <th>Start date</th>
                                        <th>End date</th>
                                        <th>Sales cutoff</th>
                                       <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $className = 'odd'; ?>
                                    
                                    @if ($objects != null)
                                    @foreach ($objects as $obj)
                                        
                                        <?php
                                        if ($className == 'even') {
                                            $className = 'odd';
                                        }
                                        ?>
                                        
                                        <tr class = "{{ $className }} gradeA">
                                            <td><a href="/showEvent/{{ $obj['id'] }}">{{ $obj['name'] }}</a></td>
                                            <td>{{ $obj['presenter'] }}</td>
                                            <td>{{ $obj['start_date'] . ' ' . $obj['start_time'] }}</td>
                                            <td>{{ $obj['end_date'] . ' ' . $obj['end_time'] }}</td>
                                            <td>{{ $obj['sales_cut_off_date'] . ' ' . $obj['sales_cut_off_time'] }}</td>
                                            <td><a href="<?php echo 'deleteEvent/' . $obj['id']; ?>">X</td>
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
    </div>

</div>
@endsection