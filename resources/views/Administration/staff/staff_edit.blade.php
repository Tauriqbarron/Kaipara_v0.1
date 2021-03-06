@extends('Administration.layout')

@section('mainContent')
    <div class="w-75 mx-auto bg-light p-2 mt-2 rounded">
        <h1>Update staff</h1>
    <h2 class="ml-5">Staff id: {{ $staff->id }}</h2>
    <hr/>
    <form class="justify-content-center" method="post" action="{{route('staff.edit', ['id' => $staff->id])}}" >
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="first_name">First Name:</label>
                <input name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{$staff->first_name}}">
                @error('first_name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="last_name">Last Name:</label>
                <input name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{$staff->last_name}}" />
                @error('last_name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <label for="phone_number">Phone Number:</label>
        <div class="form-group row ml-0">
            <input name="phone_number1" style="width: 100px" class="form-control @error('phone_number1') is-invalid @enderror"
                   value="{{substr($staff->phone_number, 1, 3)}}"/>
            @error('phone_number1')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="col-md-4">
            <input name="phone_number2" class="form-control @error('phone_number2') is-invalid @enderror" value="{{substr($staff->phone_number, 6)}}" />
            @error('phone_number2')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="street">Street:</label>
            <input name="street" class="form-control @error('street') is-invalid @enderror" value="{{$staff->street}}" />
            @error('street')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="suburb">Suburb:</label>
                <input name="suburb" class="form-control @error('suburb') is-invalid @enderror" value="{{$staff->suburb}}" />
                @error('suburb')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="city">City:</label>
                <input name="city" class="form-control @error('city') is-invalid @enderror" value="{{$staff->city}}" />
                @error('city')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group col-md-2">
                <label for="postcode">Zip:</label>
                <input name="postcode" class="form-control @error('postcode') is-invalid @enderror" value="{{$staff->postcode}}" />
                @error('postcode')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <a type="button" class="btn btn-danger" href="{{route('staff.index')}}">Back</a>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
    </div>
@endsection
