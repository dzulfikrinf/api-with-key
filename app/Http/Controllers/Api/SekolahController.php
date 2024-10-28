<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sekolah::all();
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan!',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_sekolah' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'kota' => 'required|string|max:255',
            ]);

            // Buat data sekolah baru
            $sekolah = Sekolah::create([
                'nama_sekolah' => $validatedData['nama_sekolah'],
                'alamat' => $validatedData['alamat'],
                'kota' => $validatedData['kota'],
            ]);

            // Kembalikan respon dalam bentuk JSON
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil disimpan!',
                'data' => $sekolah
            ], 201);
        } catch (ValidationException $e) {
            // Kembalikan respon dalam bentuk JSON dengan pesan kesalahan
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $sekolah = Sekolah::findOrFail($id);
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan!',
                'data' => $sekolah
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan!',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validasi data yang masuk
            $validatedData = $request->validate([
                'nama_sekolah' => 'sometimes|required|string|max:255',
                'alamat' => 'sometimes|required|string|max:255',
                'kota' => 'sometimes|required|string|max:255',
            ]);

            // Cari data sekolah berdasarkan ID
            $sekolah = Sekolah::findOrFail($id);

            // Update data sekolah dengan data yang divalidasi
            $sekolah->update($validatedData);

            // Kembalikan respon dalam bentuk JSON
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diperbarui!',
                'data' => $sekolah
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan!',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Cari data sekolah berdasarkan ID
            $sekolah = Sekolah::findOrFail($id);

            // Hapus data sekolah
            $sekolah->delete();

            // Kembalikan respon dalam bentuk JSON
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil dihapus!',
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan!',
            ], 404);
        }
    }
}

