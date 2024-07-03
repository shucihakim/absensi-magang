@extends('mahasiswa/layout')

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
                                    <option value="1" disabled selected>Silahkan Pilih Ruangan </option>
                                    <option value="1">Ruang 1</option>
                                    <option value="2">Ruang 2</option>
                                    <option value="3">Ruang 3</option>
                                    <option value="4">Ruang 4</option>
                                    <option value="5">Ruang 5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="basic-url" class="form-label">Nama</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukan Nama">
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="basic-url" class="form-label">Lokasi</label>
                        <div class="input-group mb-3 col-12">
                            <input type="text" class="form-control" placeholder="Klik Untuk memperbarui Lokasi">
                            {{-- <span class="input-group-text" id="basic-addon2">@example.com</span> --}}
                            <button class=" input-group-text btn btn-primary"> + </button>
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
@endsection
