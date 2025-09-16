<x-layout>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Program Studi</h3>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('prodis.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kodeprodi" class="form-label">Kode Prodi</label>
                        <input type="text" class="form-control" id="kodeprodi" name="kodeprodi" 
                               value="{{ old('kodeprodi') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="namaprodi" class="form-label">Nama Prodi</label>
                        <input type="text" class="form-control" id="namaprodi" name="namaprodi" 
                               value="{{ old('namaprodi') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenjang" class="form-label">Jenjang</label>
                        <select class="form-select" id="jenjang" name="jenjang" required>
                            <option value="">Pilih Jenjang</option>
                            <option value="D3" {{ old('jenjang') == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="D4" {{ old('jenjang') == 'D4' ? 'selected' : '' }}>D4</option>
                            <option value="S1" {{ old('jenjang') == 'S1' ? 'selected' : '' }}>S1</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('prodis.index') }}" class="btn btn-secondary me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
