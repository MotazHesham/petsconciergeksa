<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Cities;
use App\Models\Clients;
use App\Models\ContractTerms;
use App\Models\Permission;
use App\Models\Supplier;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SupplierController extends Controller
{
    public function index()
    {
        $clients = Supplier::all();
        return view('admin.supplier.index', compact('clients'));
    }

    public function create()
    {
        $cities=Cities::all();
        return view('admin.supplier.create',compact('cities'));
    }
    public function store(Request $request)
    {
        $clients = Supplier::create($request->all());
        return redirect()->route('admin.supplier.index');
    }
    public function edit($id)
    {
        $clients=Supplier::find($id);
        $cities=Cities::all();
        return view('admin.supplier.edit', compact('clients','cities'));
    }
    public function update(Request $request, $id)
    {
        $clients=Supplier::find($id);
        $clients->update($request->all());

        return redirect()->route('admin.supplier.index');
    }
    public function destroy($id)
    {
        $clients=Supplier::find($id);
        $clients->delete();
        return back();
    }
}
