@extends('admin.master')
@section('admin')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tambah Properti</h5>
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                        <input type="email" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">No Telepon</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="kota" class="form-label">Lokasi</label>
                                <select name="kota" class="form-control" id="kota">
                                    <option value="">Plih Lokasi</option>
                                    @foreach ($kota as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="sertifikat" class="form-label">Sertifikat</label>
                                <select name="sertifikat" class="form-control" id="sertifikat">
                                    <option value="">Pilih Sertifikat</option>
                                    @foreach ($sertif as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Lebar Bangunan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                    <span class="input-group-text">m<sup>2</sup></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Luas Tanah</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1">
                                    <span class="input-group-text">m<sup>2</sup></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Kamar Tidur</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kamar Mandi</label>
                                <input type="email" class="form-control" id="exampleInputEmail1">
                                
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Garasi</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="s" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="adf" id="s" cols="30" rows="5"></textarea>
                    </div>
                    <button type="button" class="btn btn-outline-primary" onclick="history.back()">Kembali</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
