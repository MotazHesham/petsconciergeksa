<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Category;
use App\Models\Cities;
use App\Models\ContractTerms;
use App\Models\Gallery;
use App\Models\Permission;
use App\Models\Service;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all();
        return view('admin.gallery.index', compact('gallery'));
    }


    public function create()
    {
        $categories = Category::all();

        return view('admin.gallery.create', compact('categories'));
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

        $gallery = Gallery::create($data);
        return redirect()->route('admin.gallery.index');
    }


    public function edit($id)
    {
        $gallery = Gallery::find($id);
        $categories = Category::all();

        return view('admin.gallery.edit', compact('gallery', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $gallery=Gallery::find($id);
        $data = $request->all();

        if ($request->image) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('image')->hashName());
            $request->file('image')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['image'] = $date . '.' . $ext[1];
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index');
    }


    public function destroy($id)
    {
        $gallery=Gallery::find($id);
        $gallery->delete();
        return back();
    }
}
