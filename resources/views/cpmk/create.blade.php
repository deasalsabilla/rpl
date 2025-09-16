<x-layout>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="card-title">Tambah CPMK Mata Kuliah</h2>
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

                <form action="{{ route('cpmks.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="kode_cpmk" class="form-label">Kode CPMK</label>
                        <input type="text" 
                               class="form-control @error('kode_cpmk') is-invalid @enderror" 
                               id="kode_cpmk"
                               name="kode_cpmk" 
                               value="{{ old('kode_cpmk') }}" 
                               required>
                        @error('kode_cpmk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi CPMK</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  id="deskripsi" 
                                  name="deskripsi" 
                                  rows="3" 
                                  required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="makuls_id" class="form-label">Mata Kuliah</label>
                        <select class="form-select @error('makuls_id') is-invalid @enderror" 
                                id="makuls_id"
                                name="makuls_id" 
                                required>
                            <option value="">Pilih Mata Kuliah</option>
                            @foreach ($makuls as $makul)
                                <option value="{{ $makul->id }}"
                                        {{ old('makuls_id') == $makul->id ? 'selected' : '' }}>
                                    {{ $makul->kode_mk }} - {{ $makul->nama_mk }}
                                </option>
                            @endforeach
                        </select>
                        @error('makuls_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('cpmks.index') }}" class="btn btn-secondary me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
