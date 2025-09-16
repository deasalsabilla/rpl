<x-layout>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="card-title">Daftar CPMK</h2>
                <div class="">
                    {{ $cpmks->links() }}
                    <a href="{{ route('cpmks.create') }}" class="btn btn-primary">Tambah CPMK</a>
                </div>
            </div>
            

            <div class="card-body">
                
                <!-- Search and Filter Form -->
                <form action="{{ route('cpmks.index') }}" method="GET" class="mb-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" 
                                       class="form-control" 
                                       placeholder="Cari..." 
                                       name="search" 
                                       value="{{ request('search') }}">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <select name="prodis_id" class="form-select">
                                <option value="">Pilih Program Studi</option>
                                @foreach($prodis as $prodi)
                                    <option value="{{ $prodi->id }}" 
                                            {{ request('prodis_id') == $prodi->id ? 'selected' : '' }}>
                                        {{ $prodi->namaprodi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="makuls_id" class="form-select">
                                <option value="">Pilih Mata Kuliah</option>
                                @foreach($makuls as $makul)
                                    <option value="{{ $makul->id }}"
                                            {{ request('makuls_id') == $makul->id ? 'selected' : '' }}>
                                        {{ $makul->nama_mk }}
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
                                <th>
                                    <a href="{{ route('cpmks.index', array_merge(
                                        request()->query(),
                                        ['sort' => 'kode_cpmk', 'direction' => request('sort') === 'kode_cpmk' && request('direction') === 'asc' ? 'desc' : 'asc']
                                    )) }}" class="text-decoration-none text-dark">
                                        Kode CPMK
                                        @if(request('sort') === 'kode_cpmk')
                                            <i class="bi bi-arrow-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Deskripsi</th>
                                <th>
                                    <a href="{{ route('cpmks.index', array_merge(
                                        request()->query(),
                                        ['sort' => 'makul', 'direction' => request('sort') === 'makul' && request('direction') === 'asc' ? 'desc' : 'asc']
                                    )) }}" class="text-decoration-none text-dark">
                                        Mata Kuliah
                                        @if(request('sort') === 'makul')
                                            <i class="bi bi-arrow-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('cpmks.index', array_merge(
                                        request()->query(),
                                        ['sort' => 'prodi', 'direction' => request('sort') === 'prodi' && request('direction') === 'asc' ? 'desc' : 'asc']
                                    )) }}" class="text-decoration-none text-dark">
                                        Program Studi
                                        @if(request('sort') === 'prodi')
                                            <i class="bi bi-arrow-{{ request('direction') === 'asc' ? 'up' : 'down' }}"></i>
                                        @endif
                                    </a>
                                </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cpmks as $cpmk)
                                <tr>
                                    <td>{{ $cpmk->kode_cpmk }}</td>
                                    <td>{{ $cpmk->deskripsi }}</td>
                                    <td>{{ $cpmk->makul->nama_mk ?? 'N/A' }}</td>
                                    <td>{{ $cpmk->makul->prodi->namaprodi ?? 'N/A' }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            {{-- <a href="{{ route('cpmks.show', $mk->id) }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a> --}}
                                            <a href="{{ route('cpmks.edit', $cpmk->id) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('cpmks.destroy', $cpmk->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($cpmks->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href ="{{ $cpmks->previousPageUrl() }}"
                                    rel="prev">Previous</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($cpmks->links()->elements as $element)
                            @if (is_string($element))
                                <li class="page-item disabled"><a class="page-link"
                                        href="#">{{ $element }}</a></li>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $cpmks->currentPage())
                                        <li class="page-item active"><a class="page-link"
                                                href="#">{{ $page }}</a></li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                                href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($cpmks->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $cpmks->nextPageUrl() }}" rel="next">Next</a>
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
