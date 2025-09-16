<x-layout>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="card-title">Daftar Mata Kuliah</h2>
                <div>
                    <a href="{{ route('makuls.create') }}" class="btn btn-primary">Tambah Mata Kuliah</a>
                </div>
            </div>

            <div class="card-body">
                <!-- Search and Filter Form -->
                <form action="{{ route('makuls.index') }}" method="GET" class="mb-4">
                    <div class="row g-3">
                        <div class="col-md-4">
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
                        </div>

                        <div class="col-md-3">
                            <select name="semester" class="form-select">
                                <option value="">Semua Semester</option>
                                @for ($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}" {{ request('semester') == $i ? 'selected' : '' }}>
                                        Semester {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="prodis_id" class="form-select">
                                <option value="">Semua Program Studi</option>
                                @foreach ($prodis as $prodi)
                                    <option value="{{ $prodi->id }}" {{ request('prodis_id') == $prodi->id ? 'selected' : '' }}>
                                        {{ $prodi->kodeprodi }} - {{ $prodi->namaprodi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Filter</button>
                        </div>
                    </div>
                </form>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>
                                    <a href="{{ route('makuls.index', array_merge(
                                        request()->query(),
                                        ['sort' => 'kode_mk', 'direction' => request('sort') === 'kode_mk' && request('direction') === 'asc' ? 'desc' : 'asc']
                                    )) }}" class="text-decoration-none text-dark">
                                        Kode MK
                                        @if(request('sort') === 'kode_mk')
                                            <i class="bi bi-arrow-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('makuls.index', array_merge(
                                        request()->query(),
                                        ['sort' => 'nama_mk', 'direction' => request('sort') === 'nama_mk' && request('direction') === 'asc' ? 'desc' : 'asc']
                                    )) }}" class="text-decoration-none text-dark">
                                        Nama MK
                                        @if(request('sort') === 'nama_mk')
                                            <i class="bi bi-arrow-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('makuls.index', array_merge(
                                        request()->query(),
                                        ['sort' => 'sks', 'direction' => request('sort') === 'sks' && request('direction') === 'asc' ? 'desc' : 'asc']
                                    )) }}" class="text-decoration-none text-dark">
                                        SKS
                                        @if(request('sort') === 'sks')
                                            <i class="bi bi-arrow-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('makuls.index', array_merge(
                                        request()->query(),
                                        ['sort' => 'semester', 'direction' => request('sort') === 'semester' && request('direction') === 'asc' ? 'desc' : 'asc']
                                    )) }}" class="text-decoration-none text-dark">
                                        Semester
                                        @if(request('sort') === 'semester')
                                            <i class="bi bi-arrow-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('makuls.index', array_merge(
                                        request()->query(),
                                        ['sort' => 'prodis_id', 'direction' => request('sort') === 'prodis_id' && request('direction') === 'asc' ? 'desc' : 'asc']
                                    )) }}" class="text-decoration-none text-dark">
                                        Program Studi
                                        @if(request('sort') === 'prodis_id')
                                            <i class="bi bi-arrow-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Aksi</th>
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
                                    <td>{{ $mk->prodi->kodeprodi }} - {{ $mk->prodi->namaprodi }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('makuls.show', $mk->id) }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('makuls.edit', $mk->id) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('makuls.destroy', $mk->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($makuls->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $makuls->previousPageUrl() }}" rel="prev">Previous</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
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

                        {{-- Next Page Link --}}
                        @if ($makuls->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $makuls->nextPageUrl() }}" rel="next">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</x-layout>