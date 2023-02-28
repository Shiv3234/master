@extends('admin.layouts.guest')
@section('content')
<div class="col-sm-12 col-xl-9">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Add New Users</h6>
        <form action="{{route('add.user')}}" method="post">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email">
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password">
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-sm-2 col-form-label">Phone no</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>
            </div>
            <div class="row mb-3">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="address" id="autocomplete">
                </div>
                <div class="form-group" id="latitudeArea">
                    <input type="hidden" class="latitude_sources" id="latitude" name="latitude" class="form-control">
                </div>
                <div class="form-group" id="longtitudeArea">
                    <input type="hidden" class="longtitude_sources" id="longitude" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdsjb_RUMEkFt5eBE1iyaHrY-FVEiyMSI&libraries=places"></script>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
    //   $(function() {
    //       var input = $("#autocomplete")[0];

    //       if(input) {
    //           var options = {
    //              //types: ['address'],
    //              componentRestrictions: {country: "in"}
    //           };
    //           var autocomplete = new google.maps.places.Autocomplete(input, options);
    //           //var autocomplete = new google.maps.places.Autocomplete(input,{types: ['(cities)']});
    //           google.maps.event.addListener(autocomplete, 'place_changed', function(){
    //               var place = autocomplete.getPlace();
    //               var lat =  place.geometry.location.lat();
    //               var lng =  place.geometry.location.lng();
    //               var city = place.address_components[1].long_name;
    //               var state = place.address_components[2].long_name;
    //               //var country = place.address_components[3].long_name;
    //          $(".latitude_sources").val(lat);

    //               $(".longtitude_sources").val(lng);

    //           });
    //       }
    //   });

    $(document).ready(function() {
        $("#latitudeArea").addClass("d-none");
        $("#longtitudeArea").addClass("d-none");
    });

    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            $('#latitude').val(place.geometry['location'].lat());
            $('#longitude').val(place.geometry['location'].lng());
            $("#latitudeArea").removeClass("d-none");
            $("#longtitudeArea").removeClass("d-none");
        });
    }
</script>
@stop
<!-- <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyBdsjb_RUMEkFt5eBE1iyaHrY-FVEiyMSI&callback=initAutocomplete"></script> -->