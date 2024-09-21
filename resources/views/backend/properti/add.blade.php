@extends('admin.master')
@section('admin')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Tambah Properti</h5>
            <form method="POST" action="{{route('properti.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="notelp" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="notelp" name="notelp" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="kota_id" class="form-label">Lokasi</label>
                            <select name="kota_id" class="form-control" id="kota_id" required>
                                <option value="">Plih Lokasi</option>
                                @foreach ($kota as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="sertifikat_id" class="form-label">Sertifikat</label>
                            <select name="sertifikat_id" class="form-control" id="sertifikat_id" required1>
                                <option value="">Pilih Sertifikat</option>
                                @foreach ($sertif as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="lb" class="form-label">Lebar Bangunan</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="lb" name="lb">
                                <span class="input-group-text">m<sup>2</sup></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="lt" class="form-label">Luas Tanah</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="lt" name="lt" required>
                                <span class="input-group-text">m<sup>2</sup></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="kt" class="form-label">Kamar Tidur</label>
                            <input type="number" class="form-control" id="kt" name="kt">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="km" class="form-label">Kamar Mandi</label>
                            <input type="number" class="form-control" id="km" name="km">

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="garasi" class="form-label">Garasi</label>
                            <input type="number" class="form-control" id="garasi" name="garasi">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" name="gambar[]" id="gambar" multiple>
                    <!-- <input type="text" class="form-controll" name="gambar" id="gambar"> -->
                </div>
                <button type="button" class="btn btn-outline-primary" onclick="history.back()">Kembali</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#deskripsi').summernote({
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['codeview', 'help']]
            ]
        });
    });
</script>
@endsection