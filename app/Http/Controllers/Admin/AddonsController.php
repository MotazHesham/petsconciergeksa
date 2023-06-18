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
use Carbon\Carbon;

class AddonsController extends Controller
{
    public function update_status(Request $request){ 
        $type = $request->type;
        $addons_active = Addons::where('active',1)->get();
        if($addons_active->count() < 6 || $request->status == 0){
            $receipt = Addons::findOrFail($request->id);
            $receipt->$type = $request->status;
            $receipt->save();
            return 1;
        }else{
            return 0;
        }
    }

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
        $data = $request->all(); 
        if ($request->icon) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('icon')->hashName());
            $request->file('icon')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['icon'] = $date . '.' . $ext[1];
        }
        $addon = Addons::create($data);
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
        $data = $request->all(); 
        if ($request->icon) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('icon')->hashName());
            $request->file('icon')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['icon'] = $date . '.' . $ext[1];
        }
        $addon->update($data);

        return redirect()->route('admin.addon.index');
    }
    public function destroy($id)
    {
        $addon=Addons::find($id);
        $addon->delete();
        return back();
    }
}
