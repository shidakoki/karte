<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
   public function index(Request $request)
    {
      $form = $request->all();
      $patient_id = $form["patient_id"];
      return view('admin.confirmation', ['patient_id' => $patient_id]);
    }
}
