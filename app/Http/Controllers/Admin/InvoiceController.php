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
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\Permission;
use App\Models\ProjectContract;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Projects;
use App\Models\ProjectTypes;
use App\Models\Supplier;
use App\Models\Tasks;
use App\Models\WorkingDays;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends Controller
{
    public function index()
    {
        $clients = Invoice::all();
        return view('admin.invoice.index', compact('clients'));
    }

    public function create()
    {
        $projects=Projects::all();
        $banks=Bank::all();
        return view('admin.invoice.create',compact('projects','banks'));
    }
    public function details($id)
    {
        $invoice=Invoice::find($id);
        $month=date('Y-m-d');
        $project=Projects::find($invoice->project_id);
//        return $project->clients;
        $tasks=InvoiceDetails::where('invoice_id',$invoice->id)->get();
        $banks=Bank::all();
        return view('admin.invoice.details', compact('month','project','tasks','invoice','banks'));
    }
    
    public function returnedInvoiceDetails($id)
    {
        $invoice=Invoice::find($id);
        $month=date('Y-m-d');
        $project=Projects::find($invoice->project_id);
//        return $project->clients;
        $tasks=InvoiceDetails::where('invoice_id',$invoice->id)->get();
        $banks=Bank::all();
        return view('admin.invoice.returned_details', compact('month','project','tasks','invoice','banks'));
    }
    public function store(Request $request)
    {
//        $digits = 3;
//        $random= rand(pow(10, $digits-1), pow(10, $digits)-1);
//        $num="FA-".date('m-Y').'-'.$random;
        $invoice=new Invoice();
        $invoice->num=$request->num;
        $invoice->project_id=$request->project_id;
        $invoice->bank_id=$request->bank_id;

        $invoice->save();
        if ($request->albums) {
            for ($i = 0; $i < count($request->albums); $i++) {
                $pro = new InvoiceDetails();
                $pro->name = $request->albums[$i]['name'];
                $pro->working = $request->albums[$i]['working'];
                $pro->daily = $request->albums[$i]['daily'];
                $pro->over_time_hours = $request->albums[$i]['hours']??0;
                $pro->over_time_rate = $request->albums[$i]['rate']??0;
                $pro->absense_days = $request->albums[$i]['absense_days']??0;
                $pro->absense_rate = $request->albums[$i]['absense_rate']??0;
                $pro->invoice_id = $invoice->id;
                $pro->save();
            }
        }
        $month=date('Y-m-d');
        $project=Projects::find($invoice->project_id);
        $tasks=InvoiceDetails::where('invoice_id',$invoice->id)->get();
        $banks=Bank::all();
        return view('admin.getInvoice2',compact('month','project','tasks','invoice','banks'));
    }
    public function edit($id)
    {
        $invoice=Invoice::find($id);
        $projects=Projects::all();
        $banks=Bank::all();
        return view('admin.invoice.edit', compact('invoice','projects','banks'));
    }
    public function update(Request $request, $id)
    {
        $invoice=Invoice::find($id);
        $invoice->num=$request->num;
        $invoice->project_id=$request->project_id;
        $invoice->bank_id=$request->bank_id;

        $invoice->save();

        return redirect()->route('admin.invoice.index');
    }
    
    public function returnInvoice(Request $request)
    {
        $data = $request->input();
        $invoice_id = $data['invoice_id'];
        $invoice = Invoice::find($invoice_id);
        $invoice->returned = 1;
        $invoice->returned_date = $data['date_of_returned'];
        $invoice->returned_number = $data['returned_invoice_number'];
        $invoice->save();
        
        return redirect()->route('admin.returned.invoice.details',['id'=>$invoice->id]);
    }
    public function destroy($id)
    {
        $clients=Invoice::find($id);
        $check=InvoiceDetails::where('invoice_id',$id)->get();
        foreach ($check as $c){
            $c->delete();
        }
        $clients->delete();
        return back();
    }

}
