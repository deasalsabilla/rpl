<x-layout>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="card-title">Data Pendaftar</h2>
                <div>
                    <a href="{{ route('pendaftars.create') }}" class="btn btn-primary">Tambah Pendaftar</a>
                </div>
            </div>

            <div class="card-body">
                <!-- Search and Filter Form -->
                <form action="{{ route('pendaftars.index') }}" method="GET" class="mb-4">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" 
                                       class="form-control" 
                                       placeholder="Cari nama atau NIK..." 
                                       name="search" 
                                       value="{{ request('search') }}">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <select name="prodi" class="form-select">
                                <option value="">Semua Program Studi</option>
                                @foreach($prodis as $prodi)
                                    <option value="{{ $prodi->id }}" {{ request('prodi') == $prodi->id ? 'selected' : '' }}>
                                        {{ $prodi->kodeprodi }} - {{ $prodi->namaprodi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="jenisdaftar" class="form-select">
                                <option value="">Semua Jenis</option>
                                <option value="Reguler" {{ request('jenisdaftar') == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                                <option value="Transfer" {{ request('jenisdaftar') == 'Transfer' ? 'selected' : '' }}>Transfer</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="status" class="form-select">
                                <option value="">Semua Status</option>
                                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Diterima" {{ request('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
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
                                    <a href="{{ route('pendaftars.index', array_merge(
                                        request()->query(),
                                        ['sort' => 'NIK', 'direction' => request('sort') === 'NIK' && request('direction') === 'asc' ? 'desc' : 'asc']
                                    )) }}" class="text-decoration-none text-dark">
                                        NIK
                                        @if(request('sort') === 'NIK')
                                            <i class="bi bi-arrow-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('pendaftars.index', array_merge(
                                        request()->query(),
                                        ['sort' => 'nama', 'direction' => request('sort') === 'nama' && request('direction') === 'asc' ? 'desc' : 'asc']
                                    )) }}" class="text-decoration-none text-dark">
                                        Nama
                                        @if(request('sort') === 'nama')
                                            <i class="bi bi-arrow-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>
                                    <a href="{{ route('pendaftars.index', array_merge(
                                        request()->query(),
                                        ['sort' => 'prodi_id', 'direction' => request('sort') === 'prodi_id' && request('direction') === 'asc' ? 'desc' : 'asc']
                                    )) }}" class="text-decoration-none text-dark">
                                        Program Studi
                                        @if(request('sort') === 'prodi_id')
                                            <i class="bi bi-arrow-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('pendaftars.index', array_merge(
                                        request()->query(),
                                        ['sort' => 'jenisdaftar', 'direction' => request('sort') === 'jenisdaftar' && request('direction') === 'asc' ? 'desc' : 'asc']
                                    )) }}" class="text-decoration-none text-dark">
                                        Jenis Daftar
                                        @if(request('sort') === 'jenisdaftar')
                                            <i class="bi bi-arrow-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('pendaftars.index', array_merge(
                                        request()->query(),
                                        ['sort' => 'status', 'direction' => request('sort') === 'status' && request('direction') === 'asc' ? 'desc' : 'asc']
                                    )) }}" class="text-decoration-none text-dark">
                                        Status
                                        @if(request('sort') === 'status')
                                            <i class="bi bi-arrow-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendaftars as $pendaftar)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pendaftar->NIK }}</td>
                                    <td>{{ $pendaftar->nama }}</td>
                                    <td>{{ $pendaftar->email }}</td>
                                    <td>{{ $pendaftar->noHP }}</td>
                                    <td>{{ $pendaftar->prodi->namaprodi }}</td>
                                    <td>{{ $pendaftar->jenisdaftar }}</td>
                                    <td>
                                        <span class="badge bg-{{ $pendaftar->status == 'Diterima' ? 'success' : 
                                            ($pendaftar->status == 'Ditolak' ? 'danger' : 'warning') }}">
                                            {{ $pendaftar->status }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($pendaftar->foto)
                                            <img src="{{ asset('storage/' . $pendaftar->foto) }}"
                                                alt="Foto {{ $pendaftar->nama }}" width="50" class="img-thumbnail">
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('pendaftars.show', $pendaftar->id) }}" 
                                               class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('pendaftars.edit', $pendaftar->id) }}" 
                                               class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('pendaftars.destroy', $pendaftar->id) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin?')">
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
                                    <td colspan="11" class="text-center">Tidak ada data pendaftar</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($pendaftars->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $pendaftars->previousPageUrl() }}" rel="prev">Previous</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($pendaftars->links()->elements as $element)
                            @if (is_string($element))
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">{{ $element }}</a>
                                </li>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $pendaftars->currentPage())
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
                        @if ($pendaftars->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $pendaftars->nextPageUrl() }}" rel="next">Next</a>
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
