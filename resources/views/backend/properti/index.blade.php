@extends('admin.master')
@section('admin')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="ms-auto">
                    <div class="btn-toolbar float-end" role="toolbar">
                        <a href="{{ route('properti.add') }}" class="btn btn-primary w-100"> <i class="ti ti-plus"></i> Tambah
                            Properti
                        </a>
                    </div>
                </div>
                <h5 class="card-title fw-semibold mb-4">Tabel Properti</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Alamat</th>
                                <th>No Penjual</th>
                                <th>Lokasi</th>
                                <th>Harga</th>
                                <th>Sertifikat</th>
                                <th>Lebar Bangunan</th>
                                <th>Luas Tanah</th>
                                <th>Kamar Tidur</th>
                                <th>Kamar Mandi</th>
                                <th>Garasi</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>
                                    <center>Aksi</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>sd</td>
                                <td>sd</td>
                                <td>sd</td>
                                <td>sd</td>
                                <td>sd</td>
                                <td>sd</td>
                                <td>sd</td>
                                <td>sd</td>
                                <td>sd</td>
                                <td>sd</td>
                                <td>sd</td>
                                <td>sd</td>
                                <td>sfdgsdf</td>
                                <td>
                                    <center>
                                        <a class="btn btn-outline-warning" id="edit-btn" href="javascript:void(0)"
                                            data-id="#" data-nama="#" data-kode="#">
                                            <i class="ti ti-edit"></i> Update
                                        </a>
                                        <a class="btn btn-outline-danger" data-confirm-delete="true" href="#">
                                            <i class="ti ti-trash"></i> Hapus
                                        </a>
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
