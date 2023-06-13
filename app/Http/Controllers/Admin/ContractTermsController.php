<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Clients;
use App\Models\ContractTerms;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContractTermsController extends Controller
{
    public function index()
    {
        $clients = ContractTerms::all();
        return view('admin.contract.index', compact('clients'));
    }

    public function create()
    {

        return view('admin.contract.create');
    }
    public function store(Request $request)
    {
        $clients = ContractTerms::create($request->all());
        return redirect()->route('admin.contract.index');
    }
    public function edit($id)
    {
        $clients=ContractTerms::find($id);
        return view('admin.contract.edit', compact('clients'));
    }
    public function update(Request $request, $id)
    {
        $clients=ContractTerms::find($id);
        $clients->update($request->all());

        return redirect()->route('admin.contract.index');
    }
    public function destroy($id)
    {
        $clients=ContractTerms::find($id);
        $clients->delete();
        return back();
    }
}
