<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class UploadController extends Controller
{
    // Menampilkan halaman upload
    public function upload()
    {
        return view('upload');
    }

    // Proses upload biasa tanpa resize
    public function proses_upload(Request $request)
    {
        // Validasi input
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,pdf,docx|max:2048',
            'keterangan' => 'required',
        ]);

        // Simpan file
        $file = $request->file('file');
        $path = public_path('data_file');

        // Buat folder jika belum ada
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        // Simpan file dengan nama asli
        $file->move($path, $file->getClientOriginalName());

        return redirect()->back()->with('success', 'File berhasil diupload!');
    }

    public function uploadresize()
    {
        return view('uploadresize');
    }

    public function proses_upload_resize(Request $request, ImageManager $imageManager)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'keterangan' => 'required',
        ]);

        $path = public_path('img/logo');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        $file = $request->file('file');

        $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $image = $imageManager->read($file->getRealPath());

        $resizedImage = $image->cover(200, 200);

        file_put_contents($path . '/' . $fileName, $resizedImage->toJpeg());

        return redirect(route('upload.resize'))->with('success', 'Data berhasil ditambahkan!');
    }
}