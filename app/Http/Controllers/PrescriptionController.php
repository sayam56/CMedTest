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
        $this->middleware('auth', ['except' => ['jsonApi']]);

        
    }

    public function create(Request $request)
    {
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
        return Redirect::to('/home')->with('created','New Prescription Created');

       
    }
    public function fetch($pres_id)
    {
        
        $fetch=DB::table('prescriptions')->where('id',$pres_id)->first();
        /* dd($fetch); */
        return view('edit',['fetch'=>$fetch]);
       
    }

    public function update(Request $request)
    {
        $data = $request->input();
        $pres_id= $data['id'];
        /* dd($data); */
        DB::table('prescriptions')->where('id',$pres_id)->update([
            'prescription_date'=>$data['date'],
            'patient_name'=>$data['name'],
            'patient_age'=>$data['age'],
            'patient_gender'=>$data['gender'],
            'patient_diagnosis'=>$data['diagnosis'],
            'patient_medicines'=>$data['medicines'],
            'nextVisit_date'=>$data['nextDate'],
        ]);

    
    return Redirect::to('/home')->with('updated','Prescription Updated');

       
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
        $json= file_get_contents("https://rxnav.nlm.nih.gov/REST/interaction/interaction.json?rxcui=341248");
        $data =  json_decode($json);
        $array = $data->interactionTypeGroup[0]->interactionType[0]->interactionPair;
        /* dd($array[0]); */
        return view('api',['array'=>$array]);

       
    }

    public function filterList(Request $request)
    {
        $data = $request->input();
        $start_date = $data["start_date"];
        $end_date = $data["end_date"];
        $pres = DB::table('prescriptions')
            ->select('*')
            ->where('prescription_date', '<=',  $end_date)
            ->where('prescription_date', '>',  $start_date)
            ->get();
        
        /* dd($data); */
        

        return view('home',['data'=>$pres])->with('filter','Filtered');  
    }


    public function jsonApi()
    {
        $pres = Prescription::all();
       
        return response()->json($pres);
    }
}
