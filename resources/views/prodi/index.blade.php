<x-layout>
    <div class="container">
        <h2>Daftar Program Studi</h2>
        <a href="{{ route('prodis.create') }}" class="btn btn-primary mb-3">Tambah Prodi</a>

        <div class="card">
            <div class="card-body">
                <table class="table datatable ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Prodi</th>
                            <th>Nama Prodi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($prodis as $prodi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $prodi->kodeprodi }}</td>
                                <td>{{ $prodi->namaprodi }}</td>
                                <td>{{ $prodi->status }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('prodis.show', $prodi->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                        <a href="{{ route('prodis.edit', $prodi->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('prodis.destroy', $prodi->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if ($prodis instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="mt-3">
                        {{ $prodis->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
