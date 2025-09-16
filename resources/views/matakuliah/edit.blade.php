<x-layout>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="card-title">Edit Mata Kuliah</h2>
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

                <form action="{{ route('makuls.update', $makul->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
                        <input type="text" 
                               class="form-control @error('kode_mk') is-invalid @enderror" 
                               id="kode_mk"
                               name="kode_mk" 
                               value="{{ old('kode_mk', $makul->kode_mk) }}" 
                               required>
                        @error('kode_mk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
                        <input type="text" 
                               class="form-control @error('nama_mk') is-invalid @enderror" 
                               id="nama_mk"
                               name="nama_mk" 
                               value="{{ old('nama_mk', $makul->nama_mk) }}" 
                               required>
                        @error('nama_mk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sks" class="form-label">SKS</label>
                        <input type="number" 
                               class="form-control @error('sks') is-invalid @enderror" 
                               id="sks"
                               name="sks" 
                               value="{{ old('sks', $makul->sks) }}" 
                               min="1" 
                               max="6" 
                               required>
                        @error('sks')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="semester" class="form-label">Semester</label>
                        <select class="form-select @error('semester') is-invalid @enderror" 
                                id="semester" 
                                name="semester" 
                                required>
                            <option value="">Pilih Semester</option>
                            @for($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}" 
                                        {{ old('semester', $makul->semester) == $i ? 'selected' : '' }}>
                                    Semester {{ $i }}
                                </option>
                            @endfor
                        </select>
                        @error('semester')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="prodis_id" class="form-label">Program Studi</label>
                        <select class="form-select @error('prodis_id') is-invalid @enderror" 
                                id="prodis_id"
                                name="prodis_id" 
                                required>
                            <option value="">Pilih Program Studi</option>
                            @foreach ($prodis as $prodi)
                                <option value="{{ $prodi->id }}"
                                        {{ old('prodis_id', $makul->prodis_id) == $prodi->id ? 'selected' : '' }}>
                                    {{ $prodi->kodeprodi }} - {{ $prodi->namaprodi }}
                                </option>
                            @endforeach
                        </select>
                        @error('prodis_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status RPL</label>
                        <select class="form-select @error('status') is-invalid @enderror" 
                                id="status" 
                                name="status" 
                                required>
                            <option value="">Pilih Status</option>
                            <option value="Iya">Iya</option>
                            <option value="Tidak">Tidak</option> <!-- Anda bisa menambahkan opsi lainnya -->
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('makuls.index') }}" class="btn btn-secondary me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
