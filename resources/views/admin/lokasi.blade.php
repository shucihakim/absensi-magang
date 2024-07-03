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
                        <div class="row mb-2">
                            <div class="col d-flex justify-content-between align-items-centerm-4">
                                <h4 style="font-weight: bold;">Pengaturan Lokasi</h4>
                                <button type="button" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        <img src="your-map-image.jpg" alt="Map of City of London" class="img-fluid rounded border">

                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            </div>
        </div>
    </div>
@endsection
