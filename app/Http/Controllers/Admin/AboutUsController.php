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
        
        if ($request->logo) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('logo')->hashName());
            $request->file('logo')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['logo'] = $date . '.' . $ext[1];
        }
        if ($request->image_about_us) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('image_about_us')->hashName());
            $request->file('image_about_us')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['image_about_us'] = $date . '.' . $ext[1];
        }
        if ($request->image_our_service) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('image_our_service')->hashName());
            $request->file('image_our_service')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['image_our_service'] = $date . '.' . $ext[1];
        }
        if ($request->image_easy_quick) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('image_easy_quick')->hashName());
            $request->file('image_easy_quick')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['image_easy_quick'] = $date . '.' . $ext[1];
        }
        if ($request->image_client_reviews) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('image_client_reviews')->hashName());
            $request->file('image_client_reviews')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['image_client_reviews'] = $date . '.' . $ext[1];
        }
        if ($request->image_packages) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('image_packages')->hashName());
            $request->file('image_packages')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['image_packages'] = $date . '.' . $ext[1];
        }
        if ($request->image_contact) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('image_contact')->hashName());
            $request->file('image_contact')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['image_contact'] = $date . '.' . $ext[1];
        }
        if ($request->image_login) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('image_login')->hashName());
            $request->file('image_login')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['image_login'] = $date . '.' . $ext[1];
        }

        $aboutus->update($data);

        return redirect()->back();
    }


}
