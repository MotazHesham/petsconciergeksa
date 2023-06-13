<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Category;
use App\Models\Cities;
use App\Models\Clients;
use App\Models\ContractTerms;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return redirect()->route('admin.category.index');
    }
    public function edit($id)
    {
        $category=Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category=Category::find($id);
        $category->update($request->all());

        return redirect()->route('admin.category.index');
    }
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return back();
    }
}
