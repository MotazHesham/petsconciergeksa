<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Addons;
use App\Models\Category;
use App\Models\Cities;
use App\Models\Clients;
use App\Models\ContractTerms;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddonsController extends Controller
{
    public function index()
    {
        $addons = Addons::all();
        return view('admin.addon.index', compact('addons'));
    }

    public function create()
    {
        return view('admin.addon.create');
    }
    public function store(Request $request)
    {
        $addon = Addons::create($request->all());
        return redirect()->route('admin.addon.index');
    }
    public function edit($id)
    {
        $addon=Addons::find($id);
        return view('admin.addon.edit', compact('addon'));
    }
    public function update(Request $request, $id)
    {
        $addon=Addons::find($id);
        $addon->update($request->all());

        return redirect()->route('admin.addon.index');
    }
    public function destroy($id)
    {
        $addon=Addons::find($id);
        $addon->delete();
        return back();
    }
}
