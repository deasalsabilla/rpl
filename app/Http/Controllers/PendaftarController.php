<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class PendaftarController extends Controller
{
    public function index(Request $request)
    {
        $query = Pendaftar::query()->with('prodi');

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")->orWhere('NIK', 'like', "%{$search}%");
            });
        }

        // Filters
        if ($request->has('prodi') && $request->prodi != '') {
            $query->where('prodi_id', $request->prodi);
        }

        if ($request->has('jenisdaftar') && $request->jenisdaftar != '') {
            $query->where('jenisdaftar', $request->jenisdaftar);
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Sorting
        if ($request->has('sort')) {
            $direction = $request->direction == 'asc' ? 'asc' : 'desc';
            $query->orderBy($request->sort, $direction);
        } else {
            $query->latest();
        }

        $pendaftars = $query->paginate(10);
        $prodis = Prodi::all();

        return view('pendaftar.index', compact('pendaftars', 'prodis'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('pendaftar.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIK' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pendaftars',
            'password' => 'nullable|string|min:8',
            'noHP' => 'required|string|max:15',
            'tempatLahir' => 'required|string|max:100',
            'tglLahir' => 'required|date',
            'agama' => 'nullable|string|max:50',
            'sekolahasal' => 'nullable|string|max:100',
            'NISN' => 'required|string|max:20',
            'nmAyah' => 'required|string|max:100',
            'nmIbu' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'RT' => 'nullable|string|max:5',
            'RW' => 'nullable|string|max:5',
            'desa' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kabupaten' => 'nullable|string|max:100',
            'provinsi' => 'nullable|string|max:100',
            'prodis_id' => 'required|exists:prodis,id',
            'jenisdaftar' => 'nullable|string|max:50',
            'status' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('foto')) {
            $filename = $request->file('foto')->store('uploads', 'public');
            $request->merge(['foto' => $filename]);
        }

        // Create the Pendaftar
        Pendaftar::create($request->all());
        return redirect()->route('pendaftars.index')->with('success', 'Pendaftar berhasil ditambahkan.');
    }

    public function show(Pendaftar $pendaftar)
    {
        return view('pendaftar.show', compact('pendaftar'));
    }

    public function edit($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $prodis = Prodi::all();
        return view('pendaftar.edit', compact('pendaftar', 'prodis'));
    }

    public function update(Request $request, $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $request->validate([
            'NIK' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pendaftars,email,' . $pendaftar->id,
            'password' => 'nullable|string|min:8',
            'noHP' => 'required|string|max:15',
            'tempatLahir' => 'required|string|max:100',
            'tglLahir' => 'required|date',
            'agama' => 'nullable|string|max:50',
            'sekolahasal' => 'nullable|string|max:100',
            'NISN' => 'nullable|string|max:20',
            'nmAyah' => 'nullable|string|max:100',
            'nmIbu' => 'nullable|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'RT' => 'nullable|string|max:5',
            'RW' => 'nullable|string|max:5',
            'desa' => 'nullable|string|max:100',
            'kecamatan ' => 'nullable|string|max:100',
            'kabupaten' => 'nullable|string|max:100',
            'provinsi' => 'nullable|string|max:100',
            'prodis_id' => 'required|exists:prodis,id',
            'jenisdaftar' => 'nullable|string|max:50',
            'status' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($pendaftar->foto && Storage::disk('public')->exists($pendaftar->foto)) {
                Storage::disk('public')->delete($pendaftar->foto);
            }

            // Upload new photo
            $data['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        // Do not update password if not provided
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $pendaftar->update($data);

        return redirect()->route('pendaftars.index')->with('success', 'Data pendaftar berhasil diperbarui');
    }

    public function destroy(Pendaftar $pendaftar)
    {
        // Delete the pendaftar
        $pendaftar->delete();
        return redirect()->route('pendaftars.index')->with('success', 'Pendaftar berhasil dihapus.');
    }
}
