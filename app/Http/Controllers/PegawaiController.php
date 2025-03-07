<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index($nama) {
        return "Nama Pegawai: " . $nama;
    }

    public function formulir() {
        return view('formulir');
    }

    public function proses(Request $request) {
        $message =[
            'required' => 'Input :attribute wajib diisi!',
            'min'=>'Input :attribute harus diisi minimal :min karakter!',
            'max'=>'Input :attribute harus diisi maksimal :max karakter!',
        ];
        $this->validate($request,[
            'nama' => 'required|min:5|max:20',
            'alamat' => 'required|alpha',
        ],$message);
     
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        return "Nama: $nama, alamat: $alamat";

    }
}
