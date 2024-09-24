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
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>No Penjual</th>
                            <th>Lokasi</th>
                            <th>Harga</th>
                            <th>
                                <center>Aksi</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($props as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <div class="avatar">
                                    <div class="product-img avatar-title img-thumbnail bg-primary-subtle border-0">
                                        @php
                                        $gambarPaths = json_decode($item->gambar);
                                        @endphp

                                        @if($gambarPaths && isset($gambarPaths[0]))
                                        <img src="{{ asset('storage/'.$gambarPaths[0]) }}" class="img-fluid" alt="Properti Gambar" style="max-width: 55px; height: auto;">
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>{{$item->judul}}</td>
                            <td>{{$item->notelp}}</td>
                            <td>{{$item->kota->nama}}</td>
                            <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>
                                <div class="dropstart">
                                    <a class="text-muted dropdown-toggle font-size-18" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                        <i class="ti ti-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{route('properti.edit', $item->id)}}"></i>Edit</a>
                                        <a class="dropdown-item" data-confirm-delete="true" href="{{route('properti.delete', $item->id)}}"></i> Hapus</a>
                                        <a class="dropdown-item" href="javascript:void(0)" id="showDetail" data-url="{{route('properti.show', $item->id)}}">View</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scrollable modal for view detail -->
    <div class="modal fade" id="viewDetailModal" tabindex="-1" role="dialog"
        aria-labelledby="viewDetailModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewDetailModalTitle">Properti Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Judul : </strong><span id="judul"></span></p>
                    <p><strong>Alamat : </strong><span id="alamat"></span></p>
                    <p><strong>No Telepon : </strong><span id="notelp"></span></p>
                    <p><strong>Kota : </strong><span id="kota"></span></p>
                    <p><strong>Harga : </strong><span id="harga"></span></p>
                    <p><strong>Sertifikat : </strong><span id="sertifikat"></span></p>
                    <p><strong>Lebar Bangunan : </strong><span id="lb"></span></p>
                    <p><strong>Luas Tanah : </strong><span id="lt"></span></p>
                    <p><strong>Kamar Tidur : </strong><span id="kt"></span></p>
                    <p><strong>Kamar Mandi : </strong><span id="km"></span></p>
                    <p><strong>Garasi : </strong><span id="garasi"></span></p>
                    <p><strong>Deskripsi : </strong><span id="deskripsi"></span></p>
                    <p><strong>Slug : </strong><span id="slug"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
@endsection

@section('script')
{{-- javascript to get data from database & view in modal --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('body').on('click', '#showDetail', function() {
            var detailURL = $(this).data('url');
            $.get(detailURL, function(data) {
                $('#viewDetailModal').modal('show');
                $('#judul').text(data.judul);
                $('#alamat').text(data.alamat);
                $('#notelp').text(data.notelp);
                $('#kota').text(data.kota.nama);
                $('#harga').text(data.harga.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }));
                $('#sertifikat').text(data.sertifikat.kode);
                $('#lb').text(data.lb);
                $('#lt').text(data.lt);
                $('#kt').text(data.km);
                $('#garasi').text(data.garasi);
                // Gunakan html() untuk deskripsi agar HTML di dalamnya diproses
                $('#deskripsi').html(data.deskripsi);
                $('#slug').text(data.slug);
            });
        });
    });
</script>
@endsection