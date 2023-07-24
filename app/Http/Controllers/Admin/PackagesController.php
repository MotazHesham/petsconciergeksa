<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Cities;
use App\Models\ContractTerms;
use App\Models\Packages;
use App\Models\Permission;
use App\Models\Service;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PackagesController extends Controller
{
    public function index()
    {
        $services = Packages::all(); 
        return view('admin.package.index', compact('services'));
    }


    public function create()
    {
        $services = Service::all();
        return view('admin.package.create',compact('services'));
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['services_id'] = json_encode($request->services_id);
        Packages::create($data);
        toast(trans('flash.global.success_title'),'success');
        return redirect()->route('admin.package.index');
    }


    public function edit($id)
    {
        $services = Service::all();
        $package = Packages::find($id);

        return view('admin.package.edit', compact('services', 'package'));
    }


    public function update(Request $request, $id)
    {
        $package = Packages::find($id);
        $data = $request->all();
        $data['services_id'] = json_encode($request->services_id);

        $package->update($data);

        toast(trans('flash.global.update_title'),'success');
        return redirect()->route('admin.package.index');
    }


    public function destroy($id)
    {
        $service=Packages::find($id);
        $service->delete();
        return back();
    }
}
