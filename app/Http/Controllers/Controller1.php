<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class Controller1 extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function update($nim)
    {
        $data = Mahasiswa::find($nim);

        if ($data) {
            return view('update', ['data' => $data]);
        } else {
            return redirect('/read');
        }
    }

    public function edit(Request $request)
    {
        $data = Mahasiswa::find($request->nim);

        if ($data) {
            $data->nama = $request->nama;
            $data->alamat = $request->alamat;
            $data->updated_at = now(); // Use Laravel's now() function to get the current timestamp
            $data->save();

            return redirect('/read')->with('pesan', 'Data dengan NIM: ' . $request->nim . ' berhasil diupdate');
        } else {
            return redirect('/read')->with('pesan', 'Data tidak ditemukan/gagal diupdate');
        }
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|string|regex:/^G\d{3}.\d{2}.\d{4}$/|unique:mahasiswa,nim',
            'nama' => 'required|string|max:30',
            'umur' => 'required|integer|between:1,100',
            'email' => 'required|email',
            'alamat' => 'required|min:6',
        ]);

        $model = new Mahasiswa();
        $model::insert([
            'nim' => @$request->nim,
            'nama' => @$request->nama,
            'umur' => @$request->umur,
            'email' => $request->email,
            'alamat' => @$request->alamat,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        return view('view', ['data' => $request->all()]);
    }
    
    public function read()
    {
        $model = new Mahasiswa();
        $dataAll = $model->all();
        return view('read', ['dataAll' => $dataAll]);
    }
    
    public function delete($nim)
    {
        if ($data = Mahasiswa::find($nim)) {
            $data->delete();
            return redirect('/read')->with('pesan', 'Data NIM: ' . $nim . ' Berhasil dihapus');
        } else {
            return redirect('/read')->with('pesan', 'Data NIM: ' . $nim . ' tidak ditemukan');
        }
    }
    
    public function tampilkan(Request $request)
    {
        $model = new Mahasiswa();
        $model::insert([
            'nim' => @$request->nim,
            'nama' => @$request->nama,
            'alamat' => @$request->alamat,
            'created_at' => date("Ymd H:i:s"),
            'updated_at' => date("Ymd H:i:s"),
        ]);
        $dataAll = $model->all();
        return view('tampil2', ['data' => $request->all(), 'dataAll' => $dataAll]);
    }
    
    public function logout ()
    {
        return view('logout');
    }
}