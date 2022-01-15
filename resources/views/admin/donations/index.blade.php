
@extends('layouts.admin')

@section('content-header')
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0 text-dark">الطلبات</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
<li class="breadcrumb-item active">الطلبات</li>
</ol>
</div>
</div>
</div>
</div>

@endsection
@section('content')


<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title"> <a class="btn btn-primary" href="{{ route('donations.create') }}">إضافة طلب جديدة</a> </h3> --}}

    <div class="card-tools">

    </div>
    </div>

    <div class="card-body table-responsive p-0">

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
            <th>الرقم</th>
            <th>اسم المستخدم</th>
            <th>رقم التواصل</th>
            <th>حالة الطلب</th>
            <th>اكشن</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($donations as $key => $donation)
            <tr>
            <td>{{ $loop->index }}</td>

            <td>{{ $donation['userId'] ?? '' }}</td>
            <td>{{ $donation['userId']['name'] ?? '' }}</td>
            <td style="color: green">{{ $donation['status'] ?? '' }}</td>
                <td>
                <button class="btn btn-sm btn-secondary" type="button" data-toggle="modal" data-target="#details{{ $donation->id() }}" data-toggle="tooltip" data-placement="left" title="details">
                تفاصيل أكثر
                </button>


                <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#update{{ $donation->id() }}" data-toggle="tooltip" data-placement="left" title="Edit">
                تعديل
                </button>

                <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#delete{{ $donation->id() }}" data-toggle="tooltip" data-placement="left" title="Edit">
                حذف
                </button>

                </td>



<!-- details -->

<div class="modal fade bd-example-modal-lg" id="details{{ $donation->id() }}"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">تفاصيل الطلب</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body pl-4">

    <div class="row">
<div class="col-lg-6">
<h4>الصورة</h4>

<img src="{{ $donation['imageUrl'] ?? '' }}"height="50%" width="50%" >
</div>

<div class="col-lg-6">
<h4>الفيديو</h4>
<video controls width="250">

<source src="{{ $donation['videoUrl']  ?? 'NAN A VIDEO '}}"
type="video/webm">

<source src="{{ $donation['videoUrl']  ?? 'NAN A VIDEO '}}"
type="video/mp4">

</video>
</div>

<div class="col-lg-4 p-2 text-center" style="background: #f8f8f8; border: solid 1px #000;">
<h6>الوصف</h6>
<hr>
{{ $donation['description'] ?? '' }}
</div>
<div class="col-lg-4 p-2 text-center" style="background: #f8f8f8; border: solid 1px #000;">
<h6>العنوان</h6>
<hr>

<form action="http://maps.google.com/maps" method="get" target="_blank">
    <input type="hidden" name="daddr" value="{{$donation['pickupAddress'] ?? '' }}" />
    <input type="submit" class="btn btn-sm btn-success" value="اذهب للعنوان عبر خرائط جوجل" />
 </form>

</div>
<div class="col-lg-4 p-2 text-center" style="background: #f8f8f8; border: solid 1px #000;">
<h6>سائق الطلب</h6>
<hr>
{{ $donation['delivery_user'] ?? 'لم يتم تحديد سائق بعد' }}
</div>

<div class="col-lg-4 p-2 text-center" style="background: #f8f8f8; border: solid 1px #000;">
<h6>التاريخ</h6>
<hr>
@php  echo  date('m-d-Y', strtotime($donation['date'] ?? '')) . ' - ' .  date('g:i A', strtotime($donation['date'] ?? '')); @endphp
</div>

<div class="col-lg-4 p-2 text-center" style="background: #f8f8f8; border: solid 1px #000;">
<h6>تاريخ التسليم</h6>
<hr>
@php  echo  date('m-d-Y', strtotime($donation['joinDate'] ?? '')) . ' - ' .  date('g:i A', strtotime($donation['joinDate'] ?? '')); @endphp
</div>

    </div>

</div>


</div>
</div>
</div>

<!-- details -->




<!-- Update -->
<div class="modal fade bd-example-modal-lg" id="update{{ $donation->id() }}"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">تعديل الطلب</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body pl-4">

    {!! Form::model($donation->data(), ['method'=>'PATCH', 'action'=> ['Admin\DonationController@update', $donation->id()] ]) !!}



    <div class="form-group">
    {!! Form::label('Name', 'سائق الطلب') !!}

    <select class="form-control form-control-lg" name="delivery_user">
    @foreach($users as $key=> $user)
    <option name="delivery_user" value="{{$user['name'] ?? ''}}">{{$user['name'] ?? ''}}</option>
    @endforeach
    </select>




    </div>

    <div class="form-group">
    {!! Form::label('Name', 'الموقع الجغرافي') !!}
    <input type="text" name="pickupAddress" value="{{ $donation['pickupAddress'] ?? '' }}" id="pac-input" class="form-control mb-2" >
    <div id="map" class="mt-3" name="pickupAddress" style="height: 300px;width: 750px;"></div>
    </div>

    {!! Form::label('Name', 'حالة التبرع') !!}

    <div class="form-group form-check form-check-inline">
    <input class="form-check-input" type="radio" name="status" checked="checked" id="inlineRadio3" value="Awaiting Pickup">
    <label class="form-check-label" for="inlineRadio3">قيد التسليم</label>

    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="delivered">
    <label class="form-check-label" for="inlineRadio2">تم التسليم</label>
    </div>

    </div>

    <div class="modal-footer">
    {!! Form::submit('حفظ التعديلات', ['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
    <button type="button" class="btn btn-danger" data-dismiss="modal">تراجع</button>
</div>
</div>
</div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete{{ $donation->id() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">حذف الطلب</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
هل أنت متأكد من عملية الحذف ؟
</div>
<div class="modal-footer">

<form style="margin-top: 10px" action="{{ Url('admin/donations/' .$donation->id() )  }}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-danger"> تأكيد الحذف </button>
</form>

<button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>

</div>
</div>
</div>
</div>


@endforeach

</tr>


</tbody>
</table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>
<!-- /.row -->




@section('script')
<script>
    $("#pac-input").focusin(function() {
        $(this).val('');
    });
    $('#latitude').val('');
    $('#longitude').val('');
    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 24.740691, lng: 46.6528521 },
            zoom: 13,
            mapTypeId: 'roadmap'
        });
        // move pin and current location
        infoWindow = new google.maps.InfoWindow;
        geocoder = new google.maps.Geocoder();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setCenter(pos);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(pos),
                    map: map,
                    title: 'موقعك الحالي'
                });
                markers.push(marker);
                marker.addListener('click', function() {
                    geocodeLatLng(geocoder, map, infoWindow,marker);
                });
                // to get current position address on load
                google.maps.event.trigger(marker, 'click');
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            console.log('dsdsdsdsddsd');
            handleLocationError(false, infoWindow, map.getCenter());
        }
        var geocoder = new google.maps.Geocoder();
        google.maps.event.addListener(map, 'click', function(event) {
            SelectedLatLng = event.latLng;
            geocoder.geocode({
                'latLng': event.latLng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        deleteMarkers();
                        addMarkerRunTime(event.latLng);
                        SelectedLocation = results[0].formatted_address;
                        console.log( results[0].formatted_address);
                        splitLatLng(String(event.latLng));
                        $("#pac-input").val(results[0].formatted_address);
                    }
                }
            });
        });
        function geocodeLatLng(geocoder, map, infowindow,markerCurrent) {
            var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
            /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
            $('#latitude').val(markerCurrent.position.lat());
            $('#longitude').val(markerCurrent.position.lng());
            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        map.setZoom(8);
                        var marker = new google.maps.Marker({
                            position: latlng,
                            map: map
                        });
                        markers.push(marker);
                        infowindow.setContent(results[0].formatted_address);
                        SelectedLocation = results[0].formatted_address;
                        $("#pac-input").val(results[0].formatted_address);
                        infowindow.open(map, marker);
                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
            SelectedLatLng =(markerCurrent.position.lat(),markerCurrent.position.lng());
        }
        function addMarkerRunTime(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }
        function clearMarkers() {
            setMapOnAll(null);
        }
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        $("#pac-input").val("أبحث هنا ");
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });
        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
            if (places.length == 0) {
                return;
            }
            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];
            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(100, 100),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };
                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));
                $('#latitude').val(place.geometry.location.lat());
                $('#longitude').val(place.geometry.location.lng());
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
    function splitLatLng(latLng){
        var newString = latLng.substring(0, latLng.length-1);
        var newString2 = newString.substring(1);
        var trainindIdArray = newString2.split(',');
        var lat = trainindIdArray[0];
        var Lng  = trainindIdArray[1];
        $("#latitude").val(lat);
        $("#longitude").val(Lng);
    }
</script>

<script>

$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,

    });

  });

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBS_WLni5YfR2VHwzTzf50iFsb4hmv9Vw8&libraries=places&callback=initAutocomplete&language=ar&region=SA
async defer"></script>


@endsection

@endsection




