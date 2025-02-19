<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'age',
        'gender',
        'birthdate',
        'deleted_at'
    ];
    public function patientdetails(){
        return $this->hasOne(PatientDetail::class, 'patientdetails_id', 'id');
    }
}
