<x-layout>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Pengguna</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">ID</th>
                            <td>{{ $pengguna->id }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $pengguna->nama }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $pengguna->email }}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>{{ ucfirst($pengguna->role) }}</td>
                        </tr>
                        <tr>
                            <th>Dibuat pada</th>
                            <td>{{ $pengguna->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Diperbarui pada</th>
                            <td>{{ $pengguna->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
