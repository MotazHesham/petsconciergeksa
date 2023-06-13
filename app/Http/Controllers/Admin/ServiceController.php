<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Cities;
use App\Models\ContractTerms;
use App\Models\Permission;
use App\Models\Service;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }


    public function create()
    {

        return view('admin.service.create');
    }


    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->image) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('image')->hashName());
            $request->file('image')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['image'] = $date . '.' . $ext[1];
        }

        $service = Service::create($data);
        return redirect()->route('admin.service.index');
    }


    public function edit($id)
    {
        $service=Service::find($id);

        return view('admin.service.edit', compact('service'));
    }


    public function update(Request $request, $id)
    {
        $service=Service::find($id);
        $data = $request->all();

        if ($request->image) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('image')->hashName());
            $request->file('image')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['image'] = $date . '.' . $ext[1];
        }

        $service->update($data);

        return redirect()->route('admin.service.index');
    }


    public function destroy($id)
    {
        $service=Service::find($id);
        $service->delete();
        return back();
    }
}
