<?php

 // app/Http/Controllers/Form1Controller.php

namespace App\Http\Controllers;

use App\Models\Makul;
use App\Models\Prodi;
use Illuminate\Http\Request;

class Form1Controller extends Controller
{
    public function index(Request $request)
    {
        // Membuat query untuk mengambil data mata kuliah
        $query = Makul::query();

        // Filter berdasarkan program studi (prodis_id)
        if ($request->has('prodis_id') && $request->input('prodis_id')) {
            $query->where('prodis_id', $request->input('prodis_id'));
        }

        // Filter berdasarkan semester
        if ($request->has('semester') && $request->input('semester')) {
            $query->where('semester', $request->input('semester'));
        }

        // Filter berdasarkan pencarian nama mata kuliah
        if ($request->has('search') && $request->input('search')) {
            $query->where('nama_mk', 'like', '%' . $request->input('search') . '%');
        }

        // Sorting
        $sort = $request->sort ?? 'semester';
        $direction = $request->direction ?? 'asc';

        // Melakukan sorting berdasarkan kolom yang diinginkan
        if ($sort === 'semester') {
            $query->orderBy('semester', $direction);
        } else {
            $query->orderBy($sort, $direction);
        }

        // Ambil data mata kuliah yang sudah difilter dan disortir
        $makuls = $query->with('prodi')->paginate(10);

        // Ambil data Program Studi untuk dropdown
        $prodis = Prodi::all();

        return view('formulir.formulir1.index', compact('makuls', 'prodis'));
    }

    
}
