<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>تدوير الخير | لوحة التحكم </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset ('assets/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap 4 RTL -->
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <!-- Custom style for RTL -->
  <link rel="stylesheet" href="{{ asset('assets/dashboard/dist/css/custom.css') }}">

  @toastr_css


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">الرئيسية</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
      <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
    <a class="btn btn-sm btn-danger" href="{{ route('logout') }}">
    تسجيل خروج
    </a>

    </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

      <span class="brand-text font-weight-light pr-3">تدوير الخير</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


        <li class="nav-item">
        <a href="{{ route('donations.index') }}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
        الطلبات
        </p>
        </a>
        </li>

        <li class="nav-item">
        <a href="{{ route('categories.index') }}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
        الفئات
        {{-- <span class="right badge badge-danger">New</span> --}}
        </p>
        </a>
        </li>


        <li class="nav-item">
        <a href="{{ route('users.index') }}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
        المستخدمين
        </p>
        </a>
        </li>

        <li class="nav-item">
        <a href="{{ route('partners.index') }}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
        الشركاء
        </p>
        </a>
        </li>

        <li class="nav-item">
        <a href="{{ route('points.index') }}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            نقاط التسليم
        </p>
        </a>
        </li>

        <li class="nav-item">
        <a href="{{ route('photos.index') }}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            معرض الصور
             </p>
        </a>
        </li>

        <li class="nav-item">
        <a href="{{ route('videos.index') }}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            معرض الفيديوهات
        </p>
        </a>
        </li>


{{--
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>

            </ul>
          </li> --}}

          {{-- <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li> --}}



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content-header')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        @yield('content')

        <!-- Small boxes (Stat box) -->
        {{-- <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div> --}}
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">




          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">


          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong> <a href="#">تدوير الخير</a>.</strong>
    جميع الحقوق محفوظة
    <div class="float-right d-none d-sm-inline-block">
      <b>2022</b>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@jquery
@toastr_js
@toastr_render

@yield('script')
<!-- jQuery -->
<script src="{{asset ('assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/dashboard/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{asset ('assets/dashboard/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{asset ('assets/dashboard/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/dashboard/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/dashboard/plugins/moment/moment.min.js') }}"></script>
<script src="{{asset ('assets/dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dashboard/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dashboard/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dashboard/dist/js/demo.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('assets/dashboard/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
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


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBS_WLni5YfR2VHwzTzf50iFsb4hmv9Vw8&libraries=places&callback=initAutocomplete&language=ar&region=SA
    async defer"></script>
 
</body>
</html>
