<x-layout>
    <div class="container">
        <h2>Pengaturan Hak Akses</h2>

        <div class="card mt-3">
            <div class="card-body pt-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $index => $role)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $role->nama }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalHakAkses{{ $role->id }}">
                                    <i class="bi bi-shield-lock"></i> Atur Hak Akses
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Taruh semua modal di luar tabel -->
    @foreach ($roles as $role)
    <div class="modal fade" id="modalHakAkses{{ $role->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('hak_akses.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Atur Hak Akses: {{ $role->nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Tombol pilih semua -->
                        <div class="mb-3">
                            <button type="button" class="btn btn-sm btn-success pilih-semua"
                                data-role="{{ $role->id }}">
                                <i class="bi bi-check2-all"></i> Pilih Semua
                            </button>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Menu</th>
                                    <th>Can View</th>
                                    <th>Can Create</th>
                                    <th>Can Edit</th>
                                    <th>Can Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                @php
                                $akses = ($role->hakAkses ?? collect())->firstWhere('menu_id', $menu->id);
                                @endphp
                                <tr>
                                    <td>{{ $menu->nama }}</td>
                                    <td>
                                        <input type="hidden" name="akses[{{ $menu->id }}][can_view]" value="0">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input switch-{{ $role->id }}"
                                                name="akses[{{ $menu->id }}][can_view]" value="1"
                                                @if(optional($akses)->can_view) checked @endif>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="hidden" name="akses[{{ $menu->id }}][can_create]" value="0">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input switch-{{ $role->id }}"
                                                name="akses[{{ $menu->id }}][can_create]" value="1"
                                                @if(optional($akses)->can_create) checked @endif>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="hidden" name="akses[{{ $menu->id }}][can_edit]" value="0">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input switch-{{ $role->id }}"
                                                name="akses[{{ $menu->id }}][can_edit]" value="1"
                                                @if(optional($akses)->can_edit) checked @endif>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="hidden" name="akses[{{ $menu->id }}][can_delete]" value="0">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input switch-{{ $role->id }}"
                                                name="akses[{{ $menu->id }}][can_delete]" value="1"
                                                @if(optional($akses)->can_delete) checked @endif>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <script>
        // Event listener untuk tombol "Pilih Semua"
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".pilih-semua").forEach(function (btn) {
                btn.addEventListener("click", function () {
                    const roleId = this.getAttribute("data-role");
                    const switches = document.querySelectorAll(".switch-" + roleId);
                    switches.forEach(chk => chk.checked = true);
                });
            });
        });
    </script>
</x-layout>
