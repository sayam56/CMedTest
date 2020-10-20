<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use DB;
use Illuminate\Support\Facades\Redirect;

date_default_timezone_set('Asia/Dhaka'); 

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $m = date("m");
        $yy = date("yy");
        $start_date = $yy."/".$m."/1";
        $end_date = $yy."/".$m."/31";
        /* $pres = Prescription::all(); */
        $pres = DB::table('prescriptions')
            ->select('*')
            ->where('prescription_date', '<=',  $end_date)
            ->where('prescription_date', '>',  $start_date)
            ->get();
        
        /* dd($pres); */
        

        return view('home',['data'=>$pres]);

       
    }
}
