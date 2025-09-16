<x-layout>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Mata Kuliah</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">Kode Mata Kuliah</th>
                            <td>{{ $makul->kode_mk }}</td>
                        </tr>
                        <tr>
                            <th>Nama Mata Kuliah</th>
                            <td>{{ $makul->nama_mk }}</td>
                        </tr>
                        <tr>
                            <th>SKS</th>
                            <td>{{ $makul->sks }}</td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td>{{ $makul->semester }}</td>
                        </tr>
                        <tr>
                            <th>Program Studi</th>
                            <td>{{ $makul->prodi->namaprodi }}</td>
                        </tr>
                        <tr>
                            <th>Dibuat pada</th>
                            <td>{{ $makul->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Diperbarui pada</th>
                            <td>{{ $makul->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Status RPL</th>
                            <td>{{ $makul->status }}</td>
                        </tr>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('makuls.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
            
        </div>
    </div>
</x-layout>
