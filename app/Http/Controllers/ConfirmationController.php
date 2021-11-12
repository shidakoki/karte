<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
   public function index(Request $request)
    {
      $form = $request->all();
      $confirmation_url = $form['confirmation_url'];
    //   $patient_id = $form["patient_id"];
    //   $confirmation_url = action('Admin\PatientController@delete', ['id' => $patient_id]);
      return view('admin.confirmation', ['confirmation_url' => $confirmation_url]);
    }
}
