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
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CitiesController extends Controller
{
    public function index()
    {
        $clients = Cities::all();
        return view('admin.cities.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.cities.create');
    }
    public function store(Request $request)
    {
        $clients = Cities::create($request->all());
        return redirect()->route('admin.cities.index');
    }
    public function edit($id)
    {
        $clients=Cities::find($id);
        return view('admin.cities.edit', compact('clients'));
    }
    public function update(Request $request, $id)
    {
        $clients=Cities::find($id);
        $clients->update($request->all());

        return redirect()->route('admin.cities.index');
    }
    public function destroy($id)
    {
        $clients=Cities::find($id);
        $clients->delete();
        return back();
    }
}
