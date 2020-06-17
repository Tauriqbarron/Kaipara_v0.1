@extends('Profile.layout')
@section('styles')
    <link rel="stylesheet" href="{{url('css/calendar.css')}}" type="text/css"/>

@endsection

@section('mainContent')
    <h1 id="No_jobs"></h1>
    <div class="bookCon">
        <div class="jobList">
            <div class="jobListCon" id="jobs">
                @foreach($jobs as $job)
                    @if($job->application->status == 4)
                    <form method="post" action="#">
                        @csrf
                        <div class="card w-75 cards">
                            <img src="{{$job->application->imagePath}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <label><strong>Title: </strong></label>
                                <h5 class="card-title">{{$job->application->title}}</h5>
                                <label><strong>Price: </strong></label>
                                <h5 class="card-title">{{$job->application->price}}$</h5>
                                <strong>Description: </strong>
                                <p class="card-text">{{$job->application->description}}</p>
                                <strong>Client: </strong>{{$job->application->client->first_name}} {{$job->application->client->last_name}}&nbsp;&nbsp;
                                <strong>Phone Number: </strong>{{$job->application->client->phone_number}}<br/>
                                <strong>Address: </strong>{{$job->application->street}}, {{$job->application->suburb}}, {{$job->application->city}}
                                <br/><label><strong>Status: </strong></label>
                                    Completed
                                <a href="#" class="btn btn-secondary disabled float-right">Completed</a>
                            </div>
                        </div>
                    </form>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        if($('#jobs').contents().length == 1) {
            $('#No_jobs').text('No Completed Jobs Currently')
        }
    </script>
@endsection
