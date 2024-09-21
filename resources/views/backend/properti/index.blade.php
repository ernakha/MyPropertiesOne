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
                            <td>{{$item->harga}}</td>
                            <td>
                                <center>
                                    <a class="btn btn-outline-warning" href="{{route('properti.edit', $item->id)}}"><i class="ti ti-edit"></i>Edit</a>
                                    <a class="btn btn-outline-danger" data-confirm-delete="true" href="#">
                                        <i class="ti ti-trash"></i> Hapus
                                    </a>
                                </center>
                            </td>
                        </tr>
                        @endforeach
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