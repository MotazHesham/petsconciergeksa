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
use App\Models\ProjectTypes;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectTypesController extends Controller
{
    public function index()
    {
        $clients = ProjectTypes::all();
        return view('admin.types.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.types.create');
    }
    public function store(Request $request)
    {
        $clients = ProjectTypes::create($request->all());
        return redirect()->route('admin.types.index');
    }
    public function edit($id)
    {
        $clients=ProjectTypes::find($id);
        return view('admin.types.edit', compact('clients'));
    }
    public function update(Request $request, $id)
    {
        $clients=ProjectTypes::find($id);
        $clients->update($request->all());

        return redirect()->route('admin.types.index');
    }
    public function destroy($id)
    {
        $clients=ProjectTypes::find($id);
        $clients->delete();
        return back();
    }
}
