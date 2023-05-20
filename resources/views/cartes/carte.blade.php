@extends('layout.appps')

@section('head')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mécano</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <style type="text/css">
        #map {
            height: 400px;
        }

    </style>

    <link href="img/logoPsd.png" rel="icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mécano</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

</head>
@endsection

@section('wrap')

    <section class="content">

        <div class="container-fluid">

            <div class="col-md-10 offset-1">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Garage Mécano</h3>

                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div id="map" class="map"></div>
                </div>

                <!-- /.card -->


            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    </br>
    </br>

    <!-- /.content -->

    <script type="text/javascript">
        function initMap() {
            $(document).ready(function() {
                fetch();

                function fetch() {

                    $.ajax({
                        type: "GET",
                        url: "fetch",
                        dataType: "json",
                        success: function(response) {
                            var garages = response.garage;
                            console.log(garages);
                            var original_json_string = garages;
                            var result = [];
                            var coordone = [];

                            for (var i in garages)
                                result.push([garages[i].latitude, garages[i].longitude]);
                            console.log(result);

                            var lat;
                            var lng;
                            var map;
                            map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 12,
                                center: new google.maps.LatLng(14.7645042, -17.3660286),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            });
                            const iconBase =
                                "https://www.flaticon.com/free-icons/people";
                            const icons = {
                                person: {
                                    icon: iconBase + "{{asset("assets\img\person.png")}}",
                                }
                            };
                            var infowindow = new google.maps.InfoWindow();
                            infoWindow = new google.maps.InfoWindow();

                            const locationButton = document.createElement("button");

                            locationButton.textContent = "Voir Ma position actuelle";
                            locationButton.classList.add("custom-map-control-button");
                            map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
                            locationButton.addEventListener("click", () => {
                                // Try HTML5 geolocation.
                                if (navigator.geolocation) {
                                    navigator.geolocation.getCurrentPosition(
                                        (position) => {
                                            const pos = {
                                                lat: position.coords.latitude,
                                                lng: position.coords.longitude,
                                            };
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
                                                type: "person",
                                                map: map});
                                            google.maps.event.addListener(marker, 'click', (function(marker) {
                                                return function() {
                                                    infoWindow.setPosition(pos);
                                                    infoWindow.setContent("Ma Position Actuelle.");
                                                    infoWindow.open(map);
                                                    map.setCenter(pos);
                                                }
                                            })(marker));

                                        },
                                        () => {
                                            handleLocationError(true, infoWindow, map.getCenter());
                                        }
                                    );
                                } else {
                                    // Browser doesn't support Geolocation
                                    handleLocationError(false, infoWindow, map.getCenter());
                                }
                            });


                            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                                infoWindow.setPosition(pos);
                                infoWindow.setContent(
                                    browserHasGeolocation
                                        ? "Error: The Geolocation service failed."
                                        : "Error: Your browser doesn't support geolocation."
                                );
                                infoWindow.open(map);
                            }

                            var marker, i;
                            for (i = 0; i < garages.length; i++) {
                                marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(garages[i].latitude, garages[i].longitude),
                                    map: map});
                                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                    return function() {
                                        infowindow.setContent(garages[i].nomGarage,garages[i].adresse);
                                        infowindow.open(map, marker);
                                    }
                                })(marker, i));
                            }
                        }
                    });
                }

                function onEachFeature(feature, layer) {
                    layer.bindPopup(feature.properties.popupContent);
                }
            })

            window.initMap = initMap;
        }
    </script>


    <script type="text/javascript"
            src="https://www.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>


@endsection

@section('script')
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/bienvenue.js"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            bsCustomFileInput.init();
        });

@endsection
