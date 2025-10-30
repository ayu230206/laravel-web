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
        dd($request->all());
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
}
