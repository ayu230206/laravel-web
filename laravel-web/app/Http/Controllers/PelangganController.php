<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pageData['dataPelanggan'] = Pelanggan::all();
        return view('admin.pelanggan.index', $pageData);
    }
    public function create()
    {
        return view('admin.pelanggan.create');
    }
    public function store(Request $request)
    {
        // Ubah format tanggal dari d/m/Y ke Y-m-d
        $request->merge([
            'birthday' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->birthday)->format('Y-m-d'),
        ]);

        // Simpan hasil validasi ke dalam variabel $validated
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name'  => ['required'],
            'birthday'   => ['required', 'date'],
            'gender'     => ['required', 'in:Male,Female'],
            'email'      => ['required', 'email'],
            'phone'      => ['required', 'numeric'],
        ]);
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['birthday'] = $request->birthday;
        $data['gender'] = $request->gender;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;

        // Simpan data ke database
        Pelanggan::create($data);

        // Redirect ke halaman daftar pelanggan
        return redirect()->route('pelanggan.list')->with('success', 'Penambahan Data Berhasil!');
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $param1)
    {
        $pageData['dataPelanggan'] = Pelanggan::findOrFail($param1);

        return view('admin.pelanggan.edit', $pageData);
    }
    public function update(Request $request)
    {
        // Ubah format tanggal dari d/m/Y ke Y-m-d
        $request->merge([
            'birthday' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->birthday)->format('Y-m-d'),
        ]);
        $request->validate([
            'pelanggan_id' => ['required'],
            'first_name'   => ['required'],
            'last_name'    => ['required'],
            'birthday'     => ['required', 'date'],
            'gender'       => ['required', 'in:Male,Female'],
            'email'        => ['required', 'email'],
            'phone'        => ['required', 'numeric'],
        ]);

        $pelanggan_id = $request->pelanggan_id;
        $pelanggan = Pelanggan::findOrFail($pelanggan_id);

        $pelanggan->first_name = $request->first_name;
        $pelanggan->last_name = $request->last_name;
        $pelanggan->birthday = $request->birthday;
        $pelanggan->gender = $request->gender;
        $pelanggan->email = $request->email;
        $pelanggan->phone = $request->phone;

        $pelanggan->save();

        return redirect()->route('pelanggan.list')->with('success', 'Perubahan Data Berhasil!');
    }
    public function destroy(string $param1)
    {
        $pelanggan = Pelanggan::findOrFail($param1);

        $pelanggan->delete();

        return redirect()->route('pelanggan.list')->with('success', 'Penghapusan Data Berhasil!');
    }
}
