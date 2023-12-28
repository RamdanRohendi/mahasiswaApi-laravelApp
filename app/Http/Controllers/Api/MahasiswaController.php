<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Http\Resources\mahasiswaResource;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index()
    {
        $listMhs = Mahasiswa::latest()->paginate(5);

        return new mahasiswaResource(true, 'List Data Mahasiswa Tampil', $listMhs);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim'       => 'required',
            'nama'      => 'required',
            'ttl'       => 'required',
            'gender'    => 'required',
            'alamat'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $dataMhsBaru = Mahasiswa::create([
            'nim'       => $request->nim,
            'nama'      => $request->nama,
            'ttl'       => $request->ttl,
            'gender'    => $request->gender,
            'alamat'    => $request->alamat,
        ]);

        return new mahasiswaResource(true, 'Data Mahasiswa Berhasil Ditambahkan!', $dataMhsBaru);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nim'       => 'required',
            'nama'      => 'required',
            'ttl'       => 'required',
            'gender'    => 'required',
            'alamat'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $dataMhsBaru = Mahasiswa::updateOrCreate([
            'id' => $id,
        ], [
            'nim'       => $request->nim,
            'nama'      => $request->nama,
            'ttl'       => $request->ttl,
            'gender'    => $request->gender,
            'alamat'    => $request->alamat,
        ]);

        return new mahasiswaResource(true, 'Data Mahasiswa Berhasil Diperbarui!', $dataMhsBaru);
    }

    public function show($id)
    {
        $detailById = Mahasiswa::find($id);

        return new mahasiswaResource(true, 'Detail Data Mahasiswa Berhasil di Tampilkan!', $detailById);
    }

    public function destroy($id)
    {
        $deleteById = Mahasiswa::find($id);
        $deleteById->delete();

        return new mahasiswaResource(true, 'Data Mahasiswa Berhasil Dihapus!', $deleteById);
    }
}
