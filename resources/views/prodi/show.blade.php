<x-layout>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Program Studi</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">Kode Prodi</th>
                            <td>{{ $prodi->kodeprodi }}</td>
                        </tr>
                        <tr>
                            <th>Nama Prodi</th>
                            <td>{{ $prodi->namaprodi }}</td>
                        </tr>
                        <tr>
                            <th>Jenjang</th>
                            <td>{{ $prodi->jenjang }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $prodi->status }}</td>
                        </tr>
                        <tr>
                            <th>Dibuat pada</th>
                            <td>{{ $prodi->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Diperbarui pada</th>
                            <td>{{ $prodi->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>

                <div class="mt-3">
                    <h4>Daftar Mahasiswa</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($prodi->pendaftars as $pendaftar)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pendaftar->NIK }}</td>
                                        <td>{{ $pendaftar->nama }}</td>
                                        <td>{{ $pendaftar->status }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada mahasiswa terdaftar</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-3">
                    <h4>Daftar Asesor</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Asesor</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor HP</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($prodi->asesors as $asesor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $asesor->kode_asesor }}</td>
                                        <td>{{ $asesor->nama }}</td>
                                        <td>{{ $asesor->email }}</td>
                                        <td>{{ $asesor->no_hp }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('prodis.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
