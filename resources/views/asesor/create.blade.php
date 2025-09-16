<x-layout>
    <div class="container">
        
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="card title">Tambah Asesor</h2>
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

                <form action="{{ route('asesors.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_asesor" class="form-label">Kode Asesor</label>
                        <input type="text" class="form-control @error('kode_asesor') is-invalid @enderror" 
                               id="kode_asesor" name="kode_asesor" value="{{ old('kode_asesor') }}" required>
                        @error('kode_asesor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Asesor</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                               id="nama" name="nama" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. HP</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" 
                               id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="prodis_id" class="form-label">Program Studi</label>
                        <select class="form-select @error('prodis_id') is-invalid @enderror" 
                                id="prodis_id" name="prodis_id" required>
                            <option value="">Pilih Program Studi</option>
                            @foreach ($prodis as $prodi)
                                <option value="{{ $prodi->id }}" 
                                        {{ old('prodis_id') == $prodi->id ? 'selected' : '' }}>
                                    {{ $prodi->kodeprodi }} - {{ $prodi->namaprodi }}
                                </option>
                            @endforeach
                        </select>
                        @error('prodis_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('asesors.index') }}" class="btn btn-secondary me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
