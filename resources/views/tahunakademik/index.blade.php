<!-- index.blade.php -->
<x-layout>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Tahun Akademik</h5>
                <a href="{{ route('tahun-akademiks.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Tahun Akademik
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Tahun Akademik</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tahunAkademiks as $ta)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ta->kode_tahun }}</td>
                                    <td>{{ $ta->tahun_akademik }}</td>
                                    <td>{{ $ta->semester }}</td>
                                    <td>
                                        <span class="badge bg-{{ $ta->is_active ? 'success' : 'secondary' }}">
                                            {{ $ta->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <!-- Tombol aksi -->
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $tahunAkademiks->links() }}
            </div>
        </div>
    </div>
</x-layout>
