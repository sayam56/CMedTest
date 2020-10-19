<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prescription;
use Illuminate\Support\Facades\DB;

class PrescriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prescriptions = [
            [
                'uploaderID' => '1',
                'prescription_date' => '15/06/20',
                'patient_name' => 'Sample user',
                'patient_age' => '19',
                'patient_gender' => 'Male',
                'patient_diagnosis' => 'Acute bronchitis',
                'patient_medicines' => 'Mucinex',
                'nextVisit_date' => '15/07/20'
            ],
            [                       
                'uploaderID' => '1',
                'prescription_date' => '16/06/20',
                'patient_name' => 'Sample user 2',
                'patient_age' => '20',
                'patient_gender' => 'Female',
                'patient_diagnosis' => 'Asthma',
                'patient_medicines' => 'Fluticasone (Flovent HFA),Budesonide (Pulmicort Flexhaler)',
                'nextVisit_date' => '16/07/20'
            ],
            [
                'uploaderID' => '1',
                'prescription_date' => '21/06/20',
                'patient_name' => 'Sample user3',
                'patient_age' => '39',
                'patient_gender' => 'Male',
                'patient_diagnosis' => 'Diabetes, Hyperlipidemia ,Hypertension',
                'patient_medicines' => 'Sulfonylureas, Thiazolidinediones',
                'nextVisit_date' => '15/07/20'
            ],

        ];

        foreach ($prescriptions as $key => $value) {
            DB::table('prescriptions')->insert([
                $key => $value
            ]); 
        }
    }
}
