@extends('admin/layout')

@section('title')
    <title>Lokasi | Absensi Magang</title>
@endsection

@section('content')
    <div id="tableCustomBasic" class="col-lg-12 col-12 layout-spacing">
        <div class="widget-header">
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <div class="container mt-3">
                        <form action="{{ route('admin.lokasi.simpan') }}" method="POST">
                            @csrf
                            <div class="row mb-2">
                                <input id="latitude" type="hidden" name="latitude" value="{{ $latitude }}">
                                <input id="longitude" type="hidden" name="longitude" value="{{ $longitude }}">
                                <div class="col d-flex justify-content-between align-items-centerm-4">
                                    <h4 style="font-weight: bold;">Pengaturan Lokasi</h4>
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <input class="col-2" id="jarak" type="text" value="{{ $jarak }}" name="jarak">
                            </div>
                        </form>

                        <div class="col">

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ...
                                        </svg></button>
                                    <strong>Info!</strong> {{ session('success') }}
                                </div>
                            @endif
        
                            @if ($errors->any())
                                <div class="mt-3">
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"><svg>
                                                    ... </svg></button>
                                            <strong>Perhatian!</strong> {{ $error }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div id="basic-map" class="leaflet-map" style="height: 400px"></div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="../src/assets/js/scrollspyNav.js"></script>
    <script src="../src/plugins/src/leaflet/us-states.js"></script>
    <script src="../src/plugins/src/leaflet/eu-countries.js"></script>
    <script src="../src/plugins/src/leaflet/leaflet.js"></script>
    <script src="../src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="../src/plugins/src/bootstrap-touchspin/custom-bootstrap-touchspin.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <script>
        let initJarak = {{ $jarak }};
        let initLatitude = {{ $latitude }};
        let initLongitude = {{ $longitude }};

        $("input[name='jarak']").TouchSpin({
            initval: initJarak,
            max: 10000
        });

        var map = L.map('basic-map').setView([initLatitude, initLongitude], 16);

        var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);

        var marker = L.marker([initLatitude, initLongitude]).addTo(map);
        var circle = L.circle([initLatitude, initLongitude], {
            color: 'gray',
            fillColor: 'gray',
            fillOpacity: 0.5,
            radius: initJarak // radius in meters
        }).addTo(map);
        map.on('click', function(e) {
            marker.setLatLng(e.latlng);
            circle.setLatLng(e.latlng);
            $('#latitude').val(e.latlng.lat);
            $('#longitude').val(e.latlng.lng);
            console.log('Latitude: ' + e.latlng.lat + ', Longitude: ' + e.latlng.lng);
        });
        $('#jarak').on('change', function() {
            var jarak = $(this).val();
            circle.setRadius(jarak);
            $('#jarak').val(jarak);
        });
        $('.leaflet-container').css('cursor', 'crosshair');
    </script>
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    {{-- <script src="../src/plugins/src/leaflet/leaflet_script.js"></script> --}}
@endsection
