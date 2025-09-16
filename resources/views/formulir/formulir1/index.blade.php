<x-layout>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="card-title">Daftar Mata Kuliah</h2>
            </div>

            <div class="card-body">
                <!-- Search and Filter Form -->
                <form action="{{ route('form1.index') }}" method="GET" class="mb-4">
                    <div class="row g-3">
                        {{-- <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" 
                                       class="form-control" 
                                       placeholder="Cari mata kuliah..." 
                                       name="search" 
                                       value="{{ request('search') }}">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div> --}}

                        {{-- <div class="col-md-3">
                            <select name="semester" class="form-select">
                                <option value="">Semua Semester</option>
                                @for ($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}" {{ request('semester') == $i ? 'selected' : '' }}>
                                        Semester {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div> --}}

                        <div class="col-md-6">
                            <select name="prodis_id" class="form-select" onchange="this.form.submit()" required>
                                <option value="">Pilih Program Studi</option>
                                @foreach ($prodis as $prodi)
                                    <option value="{{ $prodi->id }}" {{ request('prodis_id') == $prodi->id ? 'selected' : '' }}>
                                        {{ $prodi->kodeprodi }} - {{ $prodi->namaprodi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </form>

                <!-- Mata Kuliah Table hanya tampil setelah filter -->
                @if(request('prodis_id'))
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode MK</th>
                                    <th>Nama MK</th>
                                    <th>SKS</th>
                                    <th>Semester</th>
                                    <th>Status RPL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($makuls as $mk)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mk->kode_mk }}</td>
                                        <td>{{ $mk->nama_mk }}</td>
                                        <td>{{ $mk->sks }}</td>
                                        <td>{{ $mk->semester }}</td>
                                        <td>{{ $mk->status }}</td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada mata kuliah yang ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        Pilih Program Studi untuk memfilter mata kuliah.
                    </div>
                @endif

                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        @if ($makuls->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Previous</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $makuls->previousPageUrl() }}" rel="prev">Previous</a>
                            </li>
                        @endif

                        @foreach ($makuls->links()->elements as $element)
                            @if (is_string($element))
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">{{ $element }}</a>
                                </li>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $makuls->currentPage())
                                        <li class="page-item active">
                                            <a class="page-link" href="#">{{ $page }}</a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        @if ($makuls->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $makuls->nextPageUrl() }}" rel="next">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</x-layout>
