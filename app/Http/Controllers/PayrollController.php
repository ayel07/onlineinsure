<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salesrep;
use App\Models\Payroll;
use PDF;

class PayrollController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $salesReps = Salesrep::where('is_deleted',0)->get();
        $datePeriods = array(
            array('January' => 31),
            array('February' => 29),
            array('March' => 31),
            array('April' => 30),
            array('May' => 31),
            array('June' => 30),
            array('July' => 31),
            array('August' => 31),
            array('September' => 30),
            array('October' => 31),
            array('November' => 30),
            array('December' => 31)
        );

        return view('payroll.add',compact('salesReps','datePeriods'));
    }

    function generate(Request $request){
        $data = $request->all();
        $repId = $request->input('salesrep_id');
        $data['salesrep'] = $repId ? Salesrep::find($repId)->first() : "" ;

        if($data['salesrep']){
            $period = explode("-", $request->input('date_period'));
            $start = str_replace('/', '-', $period[0]);
            $end = str_replace('/', '-', $period[1]);
            // dd(trim($period[0]));
            $payroll = new Payroll;
            $payroll->salesrep_id = $request->input('salesrep_id');
            $payroll->start_period = date('Y-m-d',strtotime($start));
            $payroll->end_period = date('Y-m-d',strtotime($end));
            $payroll->clients = $request->input('clients');
            $payroll->commission = $request->input('commission');
            $payroll->save();
        }

        // dd($data);
        // return view('pdf.payroll', $data);
        $pdf = PDF::loadView('pdf.payroll', $data);
        return $pdf->stream('invoice.pdf');
    }
}
