<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(Request $request) {
        $request->session()->put('nama', 'Laravel Session');
        return "Session telah ditambahkan";
    }

    public function show(Request $request) {
        if($request->session()->has('nama')) {
            return $request->session()->get('nama');
        }
        return "Tidak ada session tersedia";
    }

    public function delete(Request $request) {
        $request->session()->forget('nama');
        return "Session telah dihapus";
    }
}

