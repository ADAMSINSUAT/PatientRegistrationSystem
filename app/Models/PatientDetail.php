<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table= "patientdetails";

    protected $fillable = [
        'consultation_type',
        'chief_complaint',
        'patients_id',
        'physicians_id',
        'deleted_at'
    ];
}
