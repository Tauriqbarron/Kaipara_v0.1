<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{url('css/Index.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{url('css/Profile.css')}}" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>@yield('title') - KSPMS</title>
</head>
<body>
<div class="MainCon">
    @include('Profile.header')
    @include('Profile.ProfileBar')
    @include('Administration.nav')

    <div class="content">
        @yield('mainContent')
    </div>
    @include('footer')
</div>
</body>
</html>
