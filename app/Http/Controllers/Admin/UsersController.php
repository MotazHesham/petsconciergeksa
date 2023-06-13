<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {

        $users = User::where('id','!=','1')->orderBy('id')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {

        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {

        return view('admin.users.edit', compact( 'user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {


        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
