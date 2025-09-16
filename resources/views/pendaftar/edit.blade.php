<x-layout>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Edit Pendaftar</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('pendaftars.update', $pendaftar->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
            
                            <!-- Data Pribadi -->
                            <div class="card mb-3">
                                <div class="card-header">Data Pribadi</div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="NIK" name="NIK"
                                                value="{{ old('NIK', $pendaftar->NIK) }}" required>
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                value="{{ old('nama', $pendaftar->nama) }}" required>
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="tempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="tempatLahir" name="tempatLahir"
                                                value="{{ old('tempatLahir', $pendaftar->tempatLahir) }}" required>
                                        </div>
                                        <label for="tglLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" id="tglLahir" name="tglLahir"
                                                value="{{ old('tglLahir', $pendaftar->tglLahir) }}" required>
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                        <div class="col-sm-4">
                                            <select class="form-select" id="agama" name="agama" required>
                                                <option value="">Pilih Agama</option>
                                                @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'] as $agama)
                                                    <option value="{{ $agama }}"
                                                        {{ old('agama', $pendaftar->agama) == $agama ? 'selected' : '' }}>
                                                        {{ $agama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Kontak -->
                            <div class="card mb-3">
                                <div class="card-header">Kontak</div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email', $pendaftar->email) }}" required>
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="noHP" class="col-sm-2 col-form-label">No. HP</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="noHP" name="noHP"
                                                value="{{ old('noHP', $pendaftar->noHP) }}" required>
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Data Sekolah -->
                            <div class="card mb-3">
                                <div class="card-header">Data Sekolah</div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="sekolahasal" class="col-sm-2 col-form-label">Sekolah Asal</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="sekolahasal" name="sekolahasal"
                                                value="{{ old('sekolahasal', $pendaftar->sekolahasal) }}">
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="NISN" class="col-sm-2 col-form-label">NISN</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="NISN" name="NISN"
                                                value="{{ old('NISN', $pendaftar->NISN) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Data Orang Tua -->
                            <div class="card mb-3">
                                <div class="card-header">Data Orang Tua</div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="nmAyah" class="col-sm-2 col-form-label">Nama Ayah</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nmAyah" name="nmAyah"
                                                value="{{ old('nmAyah', $pendaftar->nmAyah) }}">
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="nmIbu" class="col-sm-2 col-form-label">Nama Ibu</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nmIbu" name="nmIbu"
                                                value="{{ old('nmIbu', $pendaftar->nmIbu) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Alamat -->
                            <div class="card mb-3">
                                <div class="card-header">Alamat</div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="alamat" class="col-sm-2 col-form-label">Jalan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                value="{{ old('alamat', $pendaftar->alamat) }}">
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="RT" class="col-sm-2 col-form-label">RT</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="RT" name="RT"
                                                value="{{ old('RT', $pendaftar->RT) }}">
                                        </div>
                                        <label for="RW" class="col-sm-2 col-form-label">RW</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="RW" name="RW"
                                                value="{{ old('RW', $pendaftar->RW) }}">
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="desa" class="col-sm-2 col-form-label">Desa/Kelurahan</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="desa" name="desa"
                                                value="{{ old('desa', $pendaftar->desa) }}">
                                        </div>
                                        <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                                value="{{ old('kecamatan', $pendaftar->kecamatan) }}">
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="kabupaten" class="col-sm-2 col-form-label">Kabupaten</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="kabupaten" name="kabupaten"
                                                value="{{ old('kabupaten', $pendaftar->kabupaten) }}">
                                        </div>
                                        <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="provinsi" name="provinsi"
                                                value="{{ old('provinsi', $pendaftar->provinsi) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Data Pendaftaran -->
                            <div class="card mb-3">
                                <div class="card-header">Data Pendaftaran</div>
                                <div class="card-body">
            
            
                                    {{-- <div class="row mb-3">
                                        <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                                        <div class="col-sm-10">
                                            <select id="prodi" name="prodi" class="form-select" required>
                                                <option value="">Pilih Prodi...</option>
                                                <option value="1" {{ old('prodis') == '1' ? 'selected' : '' }}>Informatika
                                                </option>
                                                <option value="2" {{ old('prodis') == '2' ? 'selected' : '' }}>Teknik Mesin
                                                </option>
                                                <option value="3" {{ old('prodis') == '3' ? 'selected' : '' }}>Teknik Sipil
                                                </option>
                                            </select>
                                        </div>
                                    </div> --}}
            
            
                                    <!-- Program Studi -->
                                    <div class="row mb-3">
                                        <label for="prodis_id" class="col-sm-2 col-form-label">Program Studi</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" id="prodis_id" name="prodis_id" required>
                                                <option value="">Pilih Program Studi</option>
                                                @foreach ($prodis as $prodi)
                                                    <option value="{{ $prodi->id }}"
                                                        {{ old('prodis_id', $pendaftar->prodis_id) == $prodi->id ? 'selected' : '' }}>
                                                        {{ $prodi->kodeprodi }} - {{ $prodi->namaprodi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="jenisdaftar" class="col-sm-2 col-form-label">Jenis Pendaftaran</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" id="jenisdaftar" name="jenisdaftar" required>
                                                <option value="">Pilih Jenis Pendaftaran</option>
                                                @foreach(['Reguler','RPL','Pindahan'] as $jenisdaftar)
                                                    <option value="{{ $jenisdaftar }}" 
                                                        {{ old('jenisdaftar', $pendaftar->jenisdaftar) == $jenisdaftar ? 'selected' : '' }}>
                                                        {{ $jenisdaftar }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
            
                                    <!-- Foto -->
                            <div class="row mb-3">
                                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    @if($pendaftar->foto)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $pendaftar->foto) }}" 
                                                 alt="Foto Pendaftar" 
                                                 class="img-thumbnail" 
                                                 style="max-height: 200px">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control" id="foto" name="foto">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>
                                </div>
                            </div>
            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('pendaftars.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
