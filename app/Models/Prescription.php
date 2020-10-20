<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Prescription extends Model
{
    use HasFactory;

    protected $table = "prescriptions";
    protected $fillable = [
        'prescription_date',
        'patient_name',
        'patient_age',
        'patient_gender',
        'patient_diagnosis',
        'patient_medicines',
        'nextVisit_date',
    ];
}
