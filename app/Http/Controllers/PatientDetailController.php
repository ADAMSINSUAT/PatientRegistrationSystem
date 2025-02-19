<?php

namespace App\Http\Controllers;

use App\Models\Physicians;
use Illuminate\Http\Request;
use App\Models\PatientDetail;

class PatientDetailController extends Controller
{
    public function get($id)
    {
        $patientdetails = PatientDetail::where("patients_id", $id)->get();

        if (count($patientdetails)>0) {
            foreach ($patientdetails as $details) {
                $physician = Physicians::find($details->physicians_id);
                $physicians = Physicians::all();

                $data = [
                    'id' => $details->id,
                    'consultation_type' => $details->consultation_type,
                    'chief_complaint' => $details->chief_complaint,
                    'physician' => $physician->name,
                    'physicians' => $physicians
                ];

                // return response()->json(['status'=>200, 'msg'=>$details]);
                return response()->json(["status" => "success", "message" => $data]);
            }
        } else {
            return response()->json(["status" => "error", "message" => "No patient with that history was found"]);
        }
    }

    public function store(Request $req)
    {
        $data = PatientDetail::create([
            'consultation_type' => $req->consultation_type,
            'chief_complaint' => $req->chief_complaint,
            'patients_id' => $req->patients_id,
            'physicians_id' => $req->physician
        ]);
        if ($data) {
            $msg = "Patient diagnosis successfully saved";
            $type = "success";
        } else {
            $msg = "Patient diagnosis unsuccessfully saved";
            $type = "error";
        }
        return redirect('/')->with($type, $msg);
    }

    public function update(Request $req)
    {
        $patientdetail = PatientDetail::find($req->updatepatientdetails_id);

        $physicianID = Physicians::where('name', $req->update_physician)->value('id');

        if ($patientdetail) {
            $patientdetail->update([
                'consultation_type' => $req->update_consultation_type,
                'chief_complaint' => $req->update_chief_complaint,
                'physicians_id' => $physicianID
            ]);
            return redirect('/')->with('success', 'Patient consultation successfully updated');
        } else {
            return redirect('/')->with('error', 'Patient consultation unsuccessfully updated');
        }
    }

    public function delete($id)
    {
        $patientdetails = PatientDetail::findOrFail($id);
        $patientdetails->delete(); // Soft delete (if SoftDeletes is used)

        return redirect('/')->with('success', 'Patient diagnosis deleted successfully.');

        // return dd($patientdetails);
    }
}
