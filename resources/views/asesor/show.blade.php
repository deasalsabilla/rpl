<x-layout>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Asesor</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">Kode</th>
                            <td>{{ $asesor->kode_asesor }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $asesor->nama }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $asesor->email }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Hp</th>
                            <td>{{ $asesor->no_hp }}</td>
                        </tr>
                        <tr>
                            <th>Prodi</th>
                            <td>{{ $asesor->prodis_id }}</td>
                        </tr>
                        <tr>
                            <th>Dibuat pada</th>
                            <td>{{ $asesor->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Diperbarui pada</th>
                            <td>{{ $asesor->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>

 
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('asesors.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
