<!-- index.blade.php -->
<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="card-title">Daftar Asesor</h2>
                <a href="{{ route('asesors.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Asesor
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table tabledata">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Asesor</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($asesors as $asesor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $asesor->kode_asesor }}</td>
                                    <td>{{ $asesor->nama }}</td>
                                    <td>{{ $asesor->email }}</td>
                                    <td>{{ $asesor->no_hp }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('asesors.show', $asesor->id) }}" 
                                               class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>Destail
                                            </a>
                                            <a href="{{ route('asesors.edit', $asesor->id) }}" 
                                               class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>Edit
                                            </a>
                                            <form action="{{ route('asesors.destroy', $asesor->id) }}" 
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>Hapus
                                                </button>
                                            </form>
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
                {{-- </div> --}}
                {{ $asesors->links() }}
            </div>
        </div>
    </div>
</x-layout>
