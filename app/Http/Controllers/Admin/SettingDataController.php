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
use App\Models\SettingData;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class SettingDataController extends Controller
{
    public function edit($id)
    {
        $clients=SettingData::find($id);
        return view('admin.settingData.edit', compact('clients'));
    }
    public function update(Request $request, $id)
    {
        $clients=SettingData::find($id);
        $clients->update($request->all());
        return redirect()->back();
    }
}
