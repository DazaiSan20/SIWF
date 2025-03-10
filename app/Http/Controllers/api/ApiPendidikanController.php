<?php

namespace App\Http\Controllers\api;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ApiPendidikanController extends Controller
{
    // Ambil semua data
    public function getAll()
    {
        $pendidikan = Pendidikan::all();
        return Response::json($pendidikan, 200);
    }

    // Ambil data berdasarkan ID
    public function getPen($id)
    {
        $pendidikan = Pendidikan::find($id);
        if (!$pendidikan) {
            return Response::json(['message' => 'Data tidak ditemukan'], 404);
        }
        return Response::json($pendidikan, 200);
    }

    public function createPen(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|integer',
            'tahun_masuk' => 'required|integer|min:1900|max:2099',
            'tahun_keluar' => 'required|integer|min:1900|max:2099',
        ]);

        $pendidikan = Pendidikan::create([
            'nama' => $request->nama,
            'tingkatan' => $request->tingkatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan!',
            'data' => $pendidikan
        ]);
    }

    public function updatePen(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tingkatan' => 'required|integer',
            'tahun_masuk' => 'required|integer|min:1900|max:2099',
            'tahun_keluar' => 'required|integer|min:1900|max:2099',
        ]);

        $pendidikan = Pendidikan::find($id);
        if (!$pendidikan) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan!'], 404);
        }

        $pendidikan->update([
            'nama' => $request->nama,
            'tingkatan' => $request->tingkatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui!',
            'data' => $pendidikan
        ]);
    }

    // Hapus data
    public function deletePen($id)
    {
        $pendidikan = Pendidikan::find($id);
        if (!$pendidikan) {
            return Response::json(['message' => 'Data tidak ditemukan'], 404);
        }

        $pendidikan->delete();
        return Response::json(['message' => 'Data berhasil dihapus'], 200);
    }
}
