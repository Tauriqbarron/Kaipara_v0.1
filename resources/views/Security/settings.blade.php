<div class="profile-card-col" style="min-height: 670px">
    <div  class="profile-id-card card bg-light shadow p-3 mb-2 border-0 card-image float-none rounded-lg shadow col-sm-0" style="background-image: url({{url('images/Card_BG.jpg')}}); ">
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

    @include('Security.sideNav')
</div>
<div style="width:74%; float: left; padding-left: 20px">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2 class="text-center">Your Information</h2>
    <div class="container py-3 px-4 jumbotron bg-light" id="schedule">
        <form method="POST" action="{{route('security.postEdit')}}" class="needs-validation">
            @csrf
            <div class="row  border-bottom">
                <div class="py-2 col-3">
                    <strong>ID#:</strong>
                </div>
                <div class="col-8">
                    <label>
                        <input type="text" class="form-control-plaintext" value="{{$staff->id}}" readonly>
                    </label>
                </div>
                <div class="col-1">
                </div>
            </div>
            <div class="row  border-bottom">
                <div class="py-2 col-3">
                    <strong>First Name:</strong>
                </div>
                <div class="col-8">
                    <label>
                        <input type="text" class="form-control-plaintext" value="{{$staff->first_name}}" readonly>
                    </label>
                </div>
                <div class="col-1">

                </div>
            </div>
            <div class="row  border-bottom">
                <div class="py-2 col-3">
                    <strong>Last Name:</strong>
                </div>
                <div class="col-8">
                    <label>
                        <input type="text" class="form-control-plaintext" value="{{$staff->last_name}}" readonly>
                    </label>
                </div>
                <div class="col-1">

                </div>
            </div>
            <div class="row  border-bottom">
                <div class="py-2 col-3">
                    <strong>Email:</strong>
                </div>
                <div class="col-8">
                    <label>
                        <input type="text" class="form-control-plaintext" value="{{$staff->email}}" readonly>
                    </label>
                </div>
                <div class="col-1">

                </div>
            </div>
            <div class="row  border-bottom">
                <div class="py-2 col-3">
                    <strong>Phone Number:</strong>
                </div>
                <div class="col-8">
                    <label>
                        <input type="text" pattern="\(\d{3}\)[- ]\d{7,8}" id="editPhoneNumber" name="pNumber" class="form-control form-control-plaintext can-edit" value="{{$staff->phone_number}}" readonly required>
                    </label>
                </div>
                <div class="col-1">
                    <i class="fa fa-pencil text-secondary edit-toggle" data-target="editPhoneNumber" title="edit"></i>
                </div>
            </div>
            <div class="row  border-bottom">
                <div class="py-2 col-3">
                    <strong>Street:</strong>
                </div>
                <div class="col-8">
                    <label>
                        <input type="text" id="editStreet" name="street" class="form-control form-control-plaintext can-edit" value="{{$staff->street}}" readonly required>
                    </label>
                </div>
                <div class="col-1">
                    <i class="fa fa-pencil text-secondary edit-toggle" data-target="editStreet" title="edit"></i>
                </div>
            </div>
            <div class=" row  border-bottom">
                <div class="py-2 col-3">
                    <strong>Suburb:</strong>
                </div>
                <div class="col-8">
                    <label>
                        <input type="text" id="editSuburb" name="suburb" class="form-control form-control-plaintext can-edit" value="{{$staff->suburb}}" readonly required>
                    </label>
                </div>
                <div class="col-1">
                    <i class="fa fa-pencil text-secondary edit-toggle" data-target="editSuburb" title="edit"></i>
                </div>
            </div>
            <div class=" row  border-bottom">
                <div class="py-2 col-3">
                    <strong>City:</strong>
                </div>
                <div class="col-8">
                    <label>
                        <input type="text" id="editCity" name="city" class="form-control form-control-plaintext can-edit" value="{{$staff->city}}" readonly required>
                    </label>
                </div>
                <div class="col-1">
                    <i class="fa fa-pencil text-secondary edit-toggle" data-target="editCity" title="edit"></i>

                </div>
            </div>
            <div class=" row  border-bottom">
                <div class="py-2 col-3">
                    <strong>Postcode:</strong>
                </div>
                <div class="col-8">
                    <label>
                        <input type="text" pattern="\d*" id="editPostCode" name="postcode" class="form-control form-control-plaintext can-edit" minlength="4" maxlength="4" value="{{$staff->postcode}}" readonly required>
                    </label>
                </div>
                <div class="col-1">
                    <i class="fa fa-pencil text-secondary edit-toggle" data-target="editPostCode" title="edit"></i>
                </div>
            </div>
            <div class="mt-2 row w-100">
                <div class="col-3">
                    <a href="">Change your password</a>
                </div>
                <div class="col-9">
                    <input type="submit" id="btnEditStaff" class="btn btn-success disabled float-right" value="Save Changes" style="pointer-events: none">
                </div>
            </div>
        </form>

    </div>
</div>

