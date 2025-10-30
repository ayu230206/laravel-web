<?php
namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
    public function index()
    {
        $pageData['dataCustomer'] = Customer::all();
        return view('admin.customer.index', $pageData);
    }
    public function create()
    {
        return view('admin.customer.create');
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
