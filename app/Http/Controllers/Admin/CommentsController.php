<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Comments;
use App\Models\Cities;
use App\Models\Clients;
use App\Models\ContractTerms;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comments::orderBy('id','DESC')->get();
        return view('admin.comments', compact('comments'));
    }

    public function edit($id)
    {
        $comment=Comments::find($id);
        return view('admin.comments', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $comment=Comments::find($id);
        $data = $request->all();
        $data['flag'] = 1;
        $comment->update($data);

        return redirect()->back();
    }
    public function destroy($id)
    {
        $comment=Comments::find($id);
        $comment->delete();
        return back();
    }
}
