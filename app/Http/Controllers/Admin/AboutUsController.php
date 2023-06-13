<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\AboutUs;
use App\Models\Appointment;
use App\Models\Cities;
use App\Models\ContractTerms;
use App\Models\Permission;
use App\Models\User;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class AboutUsController extends Controller
{
    public function edit($id)
    {
        $aboutus=AboutUs::find($id);

        return view('admin.aboutus.edit', compact('aboutus'));
    }


    public function update(Request $request, $id)
    {
        $aboutus=AboutUs::find($id);
        $data = $request->all();

        if ($request->image) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('image')->hashName());
            $request->file('image')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['image_about_us'] = $date . '.' . $ext[1];
        }

        $aboutus->update($data);

        return redirect()->back();
    }


}
