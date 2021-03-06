@extends('layout')

@section('title','Home')

@section('title2','About Us')

@section('about', 'active')

@section('mainContent')
    <div class="container text-dark">
        <div class="row">
            <div class="col font-weight-bold">
                <span class="fa-stack mx-4">
                    <i class="fa fa-square fa-stack-2x text-secondary"></i>
                    <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                </span>0800 Kaipara
            </div>
            <div class="col font-weight-bold">
                <span class="fa-stack mx-4">
                    <i class="fa fa-square fa-stack-2x text-secondary"></i>
                    <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                </span>42 Hokianga Road, Dargaville 0310
            </div>
        </div>
        <div class="row my-5">
            <div class="col font-weight-bold">
                <span class="fa-stack mx-4">
                    <i class="fa fa-square fa-stack-2x text-secondary"></i>
                    <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                </span>helpdesk@kspms.co.nz
            </div>
            <div class="col">
                <div class="row">
                <div class="col">
                    <span class="fa-stack mx-4">
                        <i class="fa fa-square fa-stack-2x text-secondary"></i>
                        <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                    </span><strong>Office Opening Hours:</strong>
                </div>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-2">
                        Monday<br>
                        Tuesday<br>
                        Wednesday<br>
                        Thursday<br>
                        Friday<br>
                        Saturday<br>
                        Sunday<br>
                    </div>
                    <div class="col-8">
                        8am - 4:30pm<br>
                        8am - 4:30pm<br>
                        8am - 4:30pm<br>
                        8am - 4:30pm<br>
                        8am - 4:30pm<br>
                        Closed<br>
                        Closed<br>
                    </div>

                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-3 mr-4 bg-light rounded">
                <form>
                    <div class="form-row">
                        <div class="col text-center">
                            <h3 class="form-text">Contact Us</h3>
                        </div>
                    </div>
                    <div class="form-row my-2">
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-row my-2">
                        <input type="text" name="phone1" class="form-control w-25" minlength="3" maxlength="3" placeholder="021">
                        <input type="text" name="phone2" class="form-control w-75" maxlength="7" minlength="5" placeholder="Phone#">
                    </div>
                    <div class="form-row my-2">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-row my-2">
                        <textarea type="text" name="message" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-row my-2">
                        <input type="submit" class="btn btn-primary w-100" value="Submit">
                    </div>
                </form>
            </div>

            <div class="col-8 bg-light rounded" id="map">

            </div>
        </div>
    </div>
@endsection
