@extends('Administration.layout')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
@section('mainContent')
    <h1>Staff Management</h1>
    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">X</button>
            {{ session()->get('message') }}
        </div>
    @endif
    <a class="btn btn-primary float-right mr-2" href="{{route('staff.getLeaveRequests')}}">View Leave Requests</a>
    <form style="padding-top: 25px;" class="form-inline my-2 my-lg-3 ml-2" method="get" action="{{route('staff.search')}}">
        <input name="search" class="form-control mr-sm-2" type="search" placeholder="id or name" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <div>
    <a href="{{route('staff.create')}}" class="btn btn-primary ml-2">Create</a>

    <table class="table mt-1">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First name</th>
            <th scope="col">Last name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone number</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($staffs as $staff)
            <tr class="table-secondary">
                <td>{{$staff->id}}</td>
                <td>{{$staff->first_name}}</td>
                <td>{{$staff->last_name}}</td>
                <td>{{$staff->email}}</td>
                <td>{{$staff->phone_number}}</td>
                <td><a class="btn btn-success" href="{{route('staff.view', ['id' => $staff->id])}}">view</a></td>
                <td><a class="btn btn-primary" href="{{route('staff.edit', ['id' => $staff->id])}}">Edit</a></td>
                <td><a class="btn btn-danger" href="{{route('staff.delete', ['id' => $staff->id])}}">Delete</a></td>
                <td><a class="btn btn-primary" href="{{route('staff.roster', ['id' => $staff->id])}}">Roster</a></td>
                <td><a class="btn btn-warning" href="{{route('security.getUploadImage', ['id' => $staff->id])}}">Upload Image</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="float-right mr-1">
        {!! $staffs->links() !!}
    </div>


@endsection
