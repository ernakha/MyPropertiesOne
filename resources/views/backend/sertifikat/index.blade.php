@extends('admin.master')
@section('admin')
    <style>
        /* Tambahkan kelas outline untuk cancel button */
        .swal2-cancel-outline {
            background-color: transparent !important;
            /* Hilangkan warna latar */
            border: 2px solid #71a8f5 !important;
            /* Tambahkan border outline */
            color: #71a8f5 !important;
            /* Warna teks */
        }

        .swal2-cancel-outline:hover {
            background-color: #71a8f5 !important;
            /* Warna latar saat hover */
            color: #fff !important;
            /* Warna teks saat hover */
        }
    </style>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="ms-auto">
                    <div class="btn-toolbar float-end" role="toolbar">
                        <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addDataModal">
                            <i class="ti ti-plus"></i> Tambah Sertifikat
                        </button>
                    </div>
                </div>
                <h5 class="card-title fw-semibold mb-4">Tabel Sertifikat</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th>No.</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>
                                    <center>Aksi</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sertifikat as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <center>
                                            <a class="btn btn-outline-warning" id="edit-btn" href="javascript:void(0)"
                                                data-id="{{ $item->id }}" data-nama="{{ $item->nama }}"
                                                data-kode="{{ $item->kode }}">
                                                <i class="ti ti-edit"></i> Update
                                            </a>
                                            <a class="btn btn-outline-danger" href="javascript:void(0);"
                                                onclick="confirmDelete('{{ route('sertifikat.delete', $item->id) }}')">
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

        <!-- Modal Tambah Data -->
        <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDataModalTitle">Tambah Sertifikat Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('sertifikat.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode Sertifikat</label>
                                <input type="text" class="form-control" id="kode" name="kode"
                                    placeholder="Tulis kode Kota" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Sertifikat</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Tulis nama Kota" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit Data -->
        <div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="editDataModalTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDataModalTitle">Edit Sertifikat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editSertifForm" method="post">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="edit_kode" class="form-label">Kode Sertifikat</label>
                                <input type="text" class="form-control" id="edit_kode" name="kode"
                                    placeholder="Tulis kode Kota">
                            </div>
                            <div class="mb-3">
                                <label for="edit_nama" class="form-label">Nama Kota</label>
                                <input type="text" class="form-control" id="edit_nama" name="nama"
                                    placeholder="Enter Nama Kota">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editButtons = document.querySelectorAll('#edit-btn');
            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Ambil data dari atribut data-* yang terdapat di tag <a>
                    var id = this.getAttribute('data-id');
                    var nama = this.getAttribute('data-nama');
                    var kode = this.getAttribute('data-kode');

                    // Isi input field pada form dengan data yang didapat
                    document.getElementById('edit_nama').value = nama;
                    document.getElementById('edit_kode').value = kode;

                    // Set action form sesuai dengan route yang dituju
                    var formAction =
                        "{{ route('sertifikat.update', ':id') }}"; // Sesuaikan route di sini
                    formAction = formAction.replace(':id', id);
                    document.getElementById('editSertifForm').action = formAction;

                    // Buka modal dengan Bootstrap 5
                    var modalElement = document.getElementById('editDataModal');
                    var modal = new bootstrap.Modal(modalElement);
                    modal.show();
                });
            });
        });
    </script>

    <script>
        function confirmDelete(deleteUrl) {
            Swal.fire({
                title: 'Hapus Data Sertifikat!',
                text: 'Apakah Anda yakin ingin menghapus?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#5D87FF',
                cancelButtonColor: '#71a8f5', // Masih diperlukan untuk warna teks
                confirmButtonText: 'Iya, hapus',
                cancelButtonText: 'Batal',
                customClass: {
                    cancelButton: 'swal2-cancel-outline' // Tambahkan kelas kustom untuk cancelButton
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke URL penghapusan jika tombol konfirmasi ditekan
                    window.location.href = deleteUrl;
                }
            });
        }
    </script>
@endsection
