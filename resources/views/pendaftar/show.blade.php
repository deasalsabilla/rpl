{{-- <x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Detail Pendaftar</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @if ($pendaftar->foto)
                            <img src="{{ asset('storage/fotos/' . $pendaftar->foto) }}" class="img-fluid rounded"
                                alt="Foto Pendaftar">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" class="img-fluid rounded"
                                alt="Default Avatar">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <th width="200">NIK</th>
                                <td>{{ $pendaftar->NIK }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $pendaftar->nama }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $pendaftar->email }}</td>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <td>{{ $pendaftar->noHP }}</td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td>{{ $pendaftar->tempatLahir }}, {{ $pendaftar->tglLahir }}</td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td>{{ $pendaftar->agama }}</td>
                            </tr>
                            <tr>
                                <th>Sekolah Asal</th>
                                <td>{{ $pendaftar->sekolahasal }}</td>
                            </tr>
                            <tr>
                                <th>NISN</th>
                                <td>{{ $pendaftar->NISN }}</td>
                            </tr>
                            <tr>
                                <th>Nama Ayah</th>
                                <td>{{ $pendaftar->nmAyah }}</td>
                            </tr>
                            <tr>
                                <th>Nama Ibu</th>
                                <td>{{ $pendaftar->nmIbu }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>
                                    {{ $pendaftar->alamat }}<br>
                                    RT {{ $pendaftar->RT }} / RW {{ $pendaftar->RW }}<br>
                                    Desa/Kel. {{ $pendaftar->desa }}<br>
                                    Kec. {{ $pendaftar->kecamatan }}<br>
                                    {{ $pendaftar->kabupaten }}, {{ $pendaftar->provinsi }}
                                </td>
                            </tr>
                            <tr>
                                <th>Program Studi</th>
                                <td>{{ $pendaftar->prodi->namaprodi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Pendaftaran</th>
                                <td>{{ $pendaftar->jenisdaftar }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $pendaftar->status }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('pendaftars.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('pendaftars.edit', $pendaftar->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</x-layout> --}}

<x-layout>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Detail Pendaftar</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">NIK</th>
                                        <td>{{ $pendaftar->NIK }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td>{{ $pendaftar->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $pendaftar->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>No HP</th>
                                        <td>{{ $pendaftar->noHP }}</td>
                                    </tr>
                                    <tr>
                                        <th>Program Studi</th>
                                        <td>{{ $pendaftar->prodi->namaprodi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Daftar</th>
                                        <td>{{ $pendaftar->jenisdaftar }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <span class="badge bg-{{ $pendaftar->status == 'Diterima' ? 'success' : 
                                                ($pendaftar->status == 'Ditolak' ? 'danger' : 'warning') }}">
                                                {{ $pendaftar->status }}
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        @if ($pendaftar->foto)
                                            <img src="{{ asset('storage/' . $pendaftar->foto) }}"
                                                alt="Foto {{ $pendaftar->nama }}" 
                                                class="img-fluid rounded mb-3" 
                                                style="max-height: 300px;">
                                        @else
                                            <img src="{{ asset('images/no-image.png') }}"
                                                alt="No Image" 
                                                class="img-fluid rounded mb-3" 
                                                style="max-height: 300px;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <a href="{{ route('pendaftars.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <a href="{{ route('pendaftars.edit', $pendaftar->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

