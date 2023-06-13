<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Bank;
use App\Models\Cities;
use App\Models\Clients;
use App\Models\ContractTerms;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BanksController extends Controller
{
    public function index()
    {
        $clients = Bank::all();
        return view('admin.bank.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.bank.create');
    }
    public function store(Request $request)
    {
        $clients = Bank::create($request->all());
        return redirect()->route('admin.bank.index');
    }
    public function edit($id)
    {
        $clients=Bank::find($id);
        return view('admin.bank.edit', compact('clients'));
    }
    public function update(Request $request, $id)
    {
        $clients=Bank::find($id);
        $clients->update($request->all());

        return redirect()->route('admin.bank.index');
    }
    public function destroy($id)
    {
        $clients=Bank::find($id);
        $clients->delete();
        return back();
    }
}
