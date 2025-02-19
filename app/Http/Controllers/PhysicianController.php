<?php

namespace App\Http\Controllers;

use App\Models\Physicians;
use Illuminate\Http\Request;

class PhysicianController extends Controller
{
    public function index()
    {
        $physicians = Physicians::all();

        return response()->json([
            'status' => 200,
            'message' => $physicians
        ]);
    }
}
