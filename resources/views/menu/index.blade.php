<x-layout>
    <div class="container">
        <h2>Daftar Menu</h2>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('menu.create') }}" class="btn btn-primary mt-3">
                    <i class="bi bi-plus-circle"></i> Tambah Menu
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
                            <th>URL</th>
                            <th>Ikon</th>
                            <th>Parent</th>
                            <th>Urutan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $index => $menu)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $menu->nama }}</td>
                                <td>{{ $menu->url ?? '-' }}</td>
                                <td>
                                    @if($menu->ikon)
                                        <i class="{{ $menu->ikon }}"></i> {{ $menu->ikon }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $menu->parent ? $menu->parent->nama : '-' }}</td>
                                <td>{{ $menu->urutan }}</td>
                                <td>
                                    @if($menu->status === 'aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
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
