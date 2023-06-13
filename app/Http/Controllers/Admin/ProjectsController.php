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
use App\Models\ProjectContract;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Projects;
use App\Models\ProjectTypes;
use App\Models\Supplier;
use App\Models\Tasks;
use App\Models\WorkingDays;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectsController extends Controller
{
    public function index()
    {
        $clients = Projects::all();
        return view('admin.projects.index', compact('clients'));
    }

    public function create()
    {
        $clients=Clients::all();
        $suppliers=Supplier::all();

        $contracts=ContractTerms::all();
        $cities=Cities::all();
        $types=ProjectTypes::all();
        return view('admin.projects.create',compact('clients','contracts','suppliers','types','cities'));
    }
    public function store(Request $request)
    {
        $project=new Projects();
        $project->name=$request->name;
        $project->name_ar=$request->name_ar;

        $project->start_date=$request->start_date;
        $project->end_date=$request->end_date;
        $project->client_id=$request->client_id;
        $project->city_id=$request->city_id;
        $project->type_id=$request->type_id;
        $project->supplier_id=$request->supplier_id;
        $project->save();
        foreach ($request->values as $key => $value)
        {
            $pro=new ProjectContract();
            $pro->contract_id=$key;
            $pro->value=$value;
            $pro->project_id=$project->id;

            $pro->save();
        }
        return redirect()->route('admin.projects.index');
    }
    public function edit($id)
    {
        $project=Projects::find($id);
        $clients=Clients::all();
        $cities=Cities::all();
        $types=ProjectTypes::all();
        $suppliers=Supplier::all();

        $contracts=ContractTerms::all();
        $selected=ProjectContract::where('project_id',$id)->get();
        return view('admin.projects.edit', compact('clients','project','selected','contracts','suppliers','cities','types'));
    }
    public function update(Request $request, $id)
    {
        $project=Projects::find($id);
        $project->name=$request->name;
        $project->start_date=$request->start_date;
        $project->end_date=$request->end_date;
        $project->client_id=$request->client_id;
        $project->city_id=$request->city_id;
        $project->supplier_id=$request->supplier_id;
        $project->name_ar=$request->name_ar;

        $project->type_id=$request->type_id;
        $project->save();
        if ($request->values) {
            $check=ProjectContract::where('project_id',$id)->get();
            foreach ($check as $c){
                $c->delete();
            }
            foreach ($request->values as $key => $value) {
                $pro = new ProjectContract();
                $pro->contract_id = $key;
                $pro->value = $value;
                $pro->project_id = $project->id;
                $pro->save();
            }
        }
        return redirect()->route('admin.projects.index');
    }
    public function destroy($id)
    {
        $clients=Projects::find($id);
        $check=ProjectContract::where('project_id',$id)->get();
        foreach ($check as $c){
            $c->delete();
        }
        $clients->delete();
        return back();
    }
    public function createworkingday($id)
    {
        return view('admin.workingday.create',compact('id'));
    }
    public function storeworkingday(Request $request)
    {
        $att=new WorkingDays();
        $att->day=$request->day;
        $att->from=$request->from;
        $att->to=$request->to;
        $att->project_id=$request->project_id;
        $att->save();
        return redirect('/admin/workingday/'.$request->project_id);
    }
    public function editworkingday($id)
    {
        $info=WorkingDays::find($id);
        return view('admin.workingday.edit',compact('info'));
    }
    public function updateworkingday(Request $request,$id)
    {
        $att=WorkingDays::find($id);
        $att->day=$request->day;
        $att->from=$request->from;
        $att->to=$request->to;

        $att->save();
        return redirect('/admin/workingday/'.$att->project_id);
    }
    public function deleteworkingday($id)
    {
        $att=WorkingDays::find($id);
        $att->delete();
        return redirect()->back();
    }
    public function workingday($id)
    {
        $infos=WorkingDays::where('project_id',$id)->get();
        return view('admin.workingday.index',compact('infos','id'));
    }

    public function createtasks($id)
    {
        $users=User::all();
        return view('admin.tasks.create',compact('id','users'));
    }
    public function storetasks(Request $request)
    {
        $att=new Tasks();
        $att->days=$request->days;
        $att->name=$request->name;
        $att->date=$request->date;

        $att->details=$request->details;
        $att->today_rate=$request->today_rate;
        $att->admin_id=$request->admin_id;
        $att->project_id=$request->project_id;
        $att->save();
        return redirect('/admin/tasks/'.$request->project_id);
    }
    public function edittasks($id)
    {
        $info=Tasks::find($id);
        $users=User::all();
        return view('admin.tasks.edit',compact('info','users'));
    }
    public function updatetasks(Request $request,$id)
    {
        $att=Tasks::find($id);
        $att->days=$request->days;
        $att->name=$request->name;
        $att->details=$request->details;
        $att->admin_id=$request->admin_id;
        $att->date=$request->date;

        $att->today_rate=$request->today_rate;
        $att->save();
        return redirect('/admin/tasks/'.$att->project_id);
    }
    public function deletetasks($id)
    {
        $att=Tasks::find($id);
        $att->delete();
        return redirect()->back();
    }
    public function tasks($id)
    {
        $infos=Tasks::where('project_id',$id)->get();
        return view('admin.tasks.index',compact('infos','id'));
    }
}
