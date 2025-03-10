<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class UploadController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function proses_upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,pdf,docx|max:2048',
            'keterangan' => 'required',
        ]);

        $file = $request->file('file');
        $path = public_path('data_file');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

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

    public function dropzone()
    {
        return view('dropzone');
    }

    public function dropzone_store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('file');
        $path = public_path('img/dropzone');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move($path, $fileName);

        return response()->json(['success' => 'File berhasil diupload!', 'file_name' => $fileName]);
    }

    public function pdfupload()
    {
        return view('pdfupload');
    }

    public function pdf_store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf|max:10240',
        ]);

        $file = $request->file('file');
        $path = public_path('pdf/dropzone');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move($path, $fileName);

        return response()->json(['success' => 'PDF berhasil diupload!', 'file_name' => $fileName]);
    }

}