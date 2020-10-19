<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use DB;
use Illuminate\Support\Facades\Redirect;

class PrescriptionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $pres = new Prescription;
        $data = $request->input();

        $insert[]= [

                'prescription_date'=>$data['date'],
                'patient_name'=>$data['name'],
                'patient_age'=>$data['age'],
                'patient_gender'=>$data['gender'],
                'patient_diagnosis'=>$data['diagnosis'],
                'patient_medicines'=>$data['medicines'],
                'nextVisit_date'=>$data['nextDate'],
    
              ];

        if(!empty($insert)){
            DB::table('prescriptions')->insert($insert);

        }
        return Redirect::to('/home');

       
    }

    public function delete($pres_id)
    {
        DB::table('prescriptions')->where('id',$pres_id)->delete();
        return 'success';

       
    }

    public function generateReport()
    {
        $report = DB::select("select prescription_date, count(id) as  pres_count from prescriptions group by prescription_date");
        return view('report',['report'=>$report]);

       
    }

    public function apiList()
    {
        $json=file_get_contents("https://rxnav.nlm.nih.gov/REST/interaction/interaction.json?rxcui=341248");
        $data =  json_decode($json);

        dd($data);
        /* return view('api'); */

       
    }
}
