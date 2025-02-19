<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();

        if ($patients) {
            return view('patient.dashboard', ['patients' => $patients]);
        }

        return view('patient.dashboard');
    }

    public function store(Request $req)
    {
        // dd($req->first_name, $req->middle_name, $req->last_name, $req->birthdate, $req->age, $req->gender);
        // return redirect('/');

        $data = Patient::create([
            'first_name' => $req->first_name,
            'middle_name' => $req->middle_name,
            'last_name' => $req->last_name,
            'birthdate' => $req->birthdate,
            'age' => $req->age,
            'gender' => $req->gender,
            'patientdetails_id'=>0
        ]);
        if ($data) {
            $msg = "Patient successfully saved";
            $type = "success";
        } else {
            $msg = "Patient unsuccessfully saved";
            $type = "error";
        }
        return redirect('/')->with($type, $msg);
    }
}
