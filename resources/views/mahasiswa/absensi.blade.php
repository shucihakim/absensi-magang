@extends('mahasiswa/layout')

@section('title')
    <title>Pengisian Absensi | Absensi Magang</title>
@endsection

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">
                <div class="widget-content">
                    <div class="row">
                        <div class="col-6">
                            <label for="basic-url" class="form-label">NIM</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Masukan NIM">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="basic-url" class="form-label">Pilih Ruangan</label>
                            <div class="input-group mb-3">
                                <select class="form-select">
                                    <option disabled selected>Silahkan Pilih Ruangan </option>
                                    @foreach ($ruangan as $r)
                                        <option value="{{ $r->id }}">{{ $r->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="basic-url" class="form-label">Nama</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukan Nama"
                                value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="basic-url" class="form-label">Lokasi</label>
                        <div class="input-group mb-3 col-12">
                            <input id="location" type="text" class="form-control" placeholder="Klik Untuk memperbarui Lokasi">
                            <input id="latitude" type="hidden" name="latitude">
                            <input id="longitude" type="hidden" name="longitude">
                            <button id="geolocate" class=" input-group-text btn btn-primary">
                                <i class="fa-solid fa-location-crosshairs"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="basic-url" class="form-label">Laporan Kegiatan</label>
                        <div class=" mb-3">
                            <div id="editor-container">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="../src/plugins/src/notification/snackbar/snackbar.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="../src/assets/js/components/notification/custom-snackbar.js"></script>
    <script>
        $(document).ready(function() {
            $('#geolocate').on('click', function() {
                $('#location').val('')
                $('#location').attr('placeholder', 'Sedang mengambil data lokasi...')
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var latitude = position.coords.latitude;
                        var longitude = position.coords.longitude;
                        // Use the latitude and longitude values to perform further actions
                        console.log("Latitude: " + latitude + ", Longitude: " + longitude);
                        $('#latitude').val(latitude)
                        $('#longitude').val(longitude)
                        $.ajax({
                            url: `https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=json`,
                            method: 'GET',
                            dataType: 'json',
                            success: function(response) {
                                console.log(response)
                                var display = response.display_name;
                                // Use the 'display' value for further actions
                                console.log("Location: " + display);
                                // Continue with your code here
                                $('#location').val(display)
                            },
                            error: function() {
                                console.log("Error occurred while fetching location information.");
                                showToast('Gagal mengambil informasi lokasi', 'danger');
                            }
                        });
                    }, function(error) {
                        if (error.code === error.PERMISSION_DENIED) {
                            console.log("Geolocation permission denied.");
                            showToast('Perizinan lokasi ditolak', 'danger')
                        } else if (error.code === error.POSITION_UNAVAILABLE) {
                            console.log("Geolocation position unavailable.");
                            showToast('Lokasi tidak valid', 'danger')
                        } else if (error.code === error.TIMEOUT) {
                            console.log("Geolocation request timed out.");
                            showToast('Waktu pilih lokasi telah habis', 'danger')
                        } else {
                            console.log("An unknown error occurred.");
                            showToast('Gagal pilih lokasi', 'danger')
                        }
                    });
                } else {
                    console.log("Geolocation is not supported by this browser.");
                }
            });
        });
    </script>
@endsection
