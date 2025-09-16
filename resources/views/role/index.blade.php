<x-layout>
    <div class="container">
        <h2>Daftar Role</h2>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('role.create') }}" class="btn btn-primary mt-3">
                    <i class="bi bi-plus-circle"></i> Tambah Role
                </a>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body pt-4">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $index => $role)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $role->nama }}</td>
                                <td>{{ $role->deskripsi ?? '-' }}</td>
                                <td>
                                    @if($role->status === 'aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('role.destroy', $role->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus role ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
