<div class="profile-card-col" style="min-height: 625px">
    <div  class="profile-id-card card bg-light shadow p-3 mb-5 border-0 card-image rounded-lg shadow col-sm-0 float-none" style="background-image: url({{url('images/Card_BG.jpg')}}); ">
        <div id="cardHeader" class="card-header bg-light border-0 rounded">
            <img class="w-100 align-top" src="{{url('images/Card_Header.png')}}" alt="Card top">
        </div>
        <img id="card-img-top" class="card-img-top rounded-circle border-light shadow border-3 mr-auto ml-auto mb-auto" src="{{url($staff->imgPath)}}" alt="Card image cap">
        <div class="mt-4 card-body text-light">
            <h5 class="card-title text-center">{{$staff->first_name}} {{$staff->last_name}}</h5>
            <h5 class="card-title text-center">Ph: {{$staff->phone_number}}</h5>
            <h5 class="card-title text-center">ID#: {{$staff->id}}</h5>

        </div>

        <div class="card-footer bg-dark rounded">
            <img class="w-100 align-top" src="{{url('images/KaiparaLogo.png')}}" alt="Card top">
        </div>
    </div>
    <div>
        @include('Security.sideNav')
    </div>




</div>
<div style="width:74%; float: left; padding-left: 20px">
    @if ($message = Session::pull('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong>{{$message}}</strong>
        </div>
    @endif
    @if ($message = Session::pull('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong>{{$message}}</strong>
        </div>
    @endif
    <h2 class="text-center">Your Assignments</h2>
    <div class="container jumbotron bg-light" id="schedule">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-box clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                            <tr>
                                <th >
                                    <a href="{{route('security.dateChange', ['i' => -1])}}"><i class="fa fa-chevron-left date-arrow" id="dateLeft" ></i></a>
                                </th>
                                <th colspan="3" class="text-center text-secondary" style="vertical-align: bottom">
                                    <h5 class="mb-0" id="myAssignmentDate">{{Carbon\Carbon::parse(Session::get('date1'))->format('d/m/Y')}} </h5>
                                </th>
                                <th>
                                    <a href="{{route('security.dateChange', ['i' => 1])}}"> <i class="fa fa-chevron-right float-right date-arrow"></i></a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @if($firstBookings = $bookings->first())

                            @foreach($bookings as $booking )
                                @php($staff_assignment = $booking->staff_assignments->where('staff_id', '=', $staff->id)->first())
                                <tr>
                                    <td class="text-center">
                                        <h6>{{number_format($booking->start_time, 2, ":","")}}</h6>
                                    </td>

                                    <td>
                                        <h6>{{$booking->street}}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="label label-default">{{$booking->suburb}}</h6>
                                    </td>
                                    <td>
                                        <h6>{{$booking->city}}</h6>
                                    </td>
                                    <td style="width: 20%;">
                                        <a href="#" class="table-link float-right" data-toggle="collapse" data-target="#p{{$booking->id}}" id="downButton" onmouseup="f('{{$booking->id}}p','p{{$booking->id}}')" >
                                                <span class="fa-stack">
                                                    <i class="fa fa-square fa-stack-2x"></i>
                                                    <i class="fa fa-chevron-down fa-stack-1x fa-inverse more-info" id="{{$booking->id}}p"></i>
                                                </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr >
                                    <td colspan="4" style="padding: 0px" class="bg-white">
                                        <span class="collapse" id="p{{$booking->id}}"></span>
                                        <div class="collapse container px-5"  id="p{{$booking->id}}">
                                            <div class="row">
                                                <div class="col">
                                                    <h6 class="mb-0 mt-2">{{$booking->booking_type->description}} on {{ \Carbon\Carbon::parse($booking->date)->format('d/m/Y')}}</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    {{$booking->description}}
                                                </div>
                                            </div>
                                            <div class="row pl-2">
                                                <div class="col-2">
                                                    <strong>Time</strong>
                                                </div>
                                                <div class="col-10">
                                                    {{substr('00:00', 0, (-(strlen(number_format($booking->start_time ,2 , ':','')))) ) . number_format($booking->start_time ,2 , ':','')}} - {{substr('00:00', 0, (-(strlen(number_format($booking->finish_time ,2 , ':','')))) ) . number_format($booking->finish_time ,2 , ':','')}}
                                                </div>
                                            </div>
                                            <div class="row pl-2">
                                                <div class="col-2">
                                                    <strong>Date</strong>
                                                </div>
                                                <div class="col-10">
                                                    {{\Carbon\Carbon::parse($booking->date)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($booking->end_date)->format('d/m/Y')}}
                                                </div>
                                            </div>
                                            <div class="row pl-2">
                                                <div class="col-2">
                                                    <strong>Address</strong>
                                                </div>
                                                <div class="col-10">
                                                    {{$booking->street}}<br>{{$booking->suburb}}<br>{{$booking->city}}, {{$booking->postcode}}
                                                </div>
                                            </div>
                                            <div class="row pl-2">
                                                <div class="col-3">
                                                    <strong>Client Name</strong>
                                                </div>
                                                <div class="col-9">
                                                    {{$booking->client->first_name}} {{$booking->client->last_name}}
                                                </div>
                                            </div>
                                            <div class="row pl-2">
                                                <div class="col-3">
                                                    <strong>Phone</strong>
                                                </div>
                                                <div class="col-9">
                                                    {{$booking->client->phone_number}}
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                    <td style="padding: 0px" class="bg-white">
                                        <div class="collapse btn-group-lg"  id="p{{$booking->id}}" style="padding: 10px">
                                            @if((\Carbon\Carbon::parse($booking->date)->format('d/m/Y') <= \Carbon\Carbon::parse(today('NZ'))->format('d/m/Y')) && (\Carbon\Carbon::parse($booking->end_date)->format('d/m/Y') >= \Carbon\Carbon::parse(today('NZ'))->format('d/m/Y')) && session()->get('date1') == today("NZ"))
                                                @if(isset($staff->current_timesheet_id) && $staff_assignment->timesheet->contains('id', $staff->current_timesheet_id))
                                                    <form role="form" method="POST" action="{{route('staff.stopJob')}}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger w-100" name="timesheet_id" value="{{$staff->current_timesheet_id}}">Stop</button>
                                                    </form>
                                                @else
                                                    <form role="form" method="POST" action="{{route('staff.startJob')}}">
                                                        @csrf
                                                        <button type="submit"  name="staff_assignment_id" value="{{$staff_assignment->id}}" class="btn btn-primary w-100">Start</button>
                                                    </form>
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                                @else
                                <tr><th colspan="5" class="text-center">Nothing to show</th></tr>
                            @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
       @include('Security.timetable')
</div>

