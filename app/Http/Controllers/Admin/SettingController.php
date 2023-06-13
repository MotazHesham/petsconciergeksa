<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Clients;
use App\Models\ContractTerms;
use App\Models\Permission;
use App\Models\Setting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
//    public function index()
//    {
//        $clients = Clients::all();
//        return view('admin.clients.index', compact('clients'));
//    }
//
//    public function create()
//    {
//
//        return view('admin.clients.create');
//    }
//    public function store(Request $request)
//    {
//        $clients = Clients::create($request->all());
//        return redirect()->route('admin.clients.index');
//    }
    public function edit($id)
    {
        $setting=Setting::find($id);
        return view('admin.setting.edit', compact('setting'));
    }
    public function update(Request $request, $id)
    {
        $clients=Setting::find($id);
        $clients->update($request->all());

        return redirect()->back();
    }
//    public function destroy($id)
//    {
//        $clients=Clients::find($id);
//        $clients->delete();
//        return back();
//    }
}
