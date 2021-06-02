<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salesrep;

class SalesrepController extends Controller
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
        return view('salesreps.view',compact('salesReps'));
    }

    function addform(){
        return view('salesreps.add');
    }

    function add(Request $request){
        if($request->input('firstname')){
            $salesrep = new Salesrep;
            $salesrep->firstname = $request->input('firstname');
            $salesrep->lastname = $request->input('lastname');
            $salesrep->commission_percentage = $request->input('commission_percentage');
            $salesrep->tax_rate = $request->input('tax_rate');
            $salesrep->bonuses = $request->input('bonuses');
            $salesrep->save();
            return redirect("/salesreps");
        }
    }
}
