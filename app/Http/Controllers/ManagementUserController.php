<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class ManagementUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return "Halo ini adalah method index, dalam controller ManagementUser."  ;//
        // return "Method ini nantinya akan digunakan untuk mengambil semua data user";
        $nama = "Muhamad Rizki Kaila Zaki";
        
        $pelajaran = ["Algoritma & Pemograman","Kalkulus","Pemograman Web"];

        return view('home', compact('nama', 'pelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Method ini nantinya akan digunakan untuk menampilkan form untuk menambah data user";//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Method ini nantinya akan digunakan untuk menciptakan data user yang baru";//
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Method ini nantinya akan digunakan untuk mengambil satu data user dengan id =" . $id;//
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Method ini nantinya akan digunakan untuk menampilkan form untuk mengubah data edit dengan id =" . $id;//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Method ini nantinya akan digunakan untuk mengubah data user dengan id =" . $id;//
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Method ini nantinya akan digunakan untuk menghapus data user dengan id =" . $id;//
    }
}
