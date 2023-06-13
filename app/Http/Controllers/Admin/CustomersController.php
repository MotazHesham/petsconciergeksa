<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Clients;
use App\Models\ContractTerms;
use App\Models\Customers;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomersController extends Controller
{
    public function index()
    {
        $clients = Customers::all();
        return view('admin.customers.index', compact('clients'));
    }
    public function create()
    {
        return view('admin.customers.create');
    }
    public function store(Request $request)
    {
        $clients = Customers::create($request->all());
        return redirect()->route('admin.customers.index');
    }
    public function edit($id)
    {
        $clients=Customers::find($id);
        return view('admin.customers.edit', compact('clients'));
    }
    public function update(Request $request, $id)
    {
        $clients=Customers::find($id);
        $clients->update($request->all());
        return redirect()->route('admin.customers.index');
    }
    public function destroy($id)
    {
        $clients=Customers::find($id);
        $clients->delete();
        return back();
    }
}
