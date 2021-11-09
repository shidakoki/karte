<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use Carbon\Carbon;

class PatientController extends Controller
{
    public function add()
  {
      return view('admin.patient.create');
  }

  // 以下を追記
  public function create(Request $request)
  {
      // 以下を追記
      // Varidationを行う
      $this->validate($request, Patient::$rules);
      $patient= new Patient;
      $form = $request->all();
     
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      // データベースに保存する
      $patient->fill($form);
      $patient->save();
      // admin/patient/createにリダイレクトする
      return redirect('admin/patient');
  }  
  // 以下を追記
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Patient::where('name', $cond_title)->get();
      } else {
          // それ以外はすべての患者を取得する
          $posts = Patient::all();
      }

      return view('admin.patient.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
  
  public function edit(Request $request)
  {
      // patient Modelからデータを取得する
      $patient = Patient::find($request->id);
      if (empty($patient)) {
        abort(404);    
      }
      return view('admin.patient.edit', ['patient_form' => $patient]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Patient::$rules);
      // Patient Modelからデータを取得する
      $patient = Patient::find($request->id);
      // 送信されてきたフォームデータを格納する
      $patient_form = $request->all();
      unset($patient_form['_token']);

      // 該当するデータを上書きして保存する
      $patient->fill($patient_form)->save();
      return redirect('admin/patient');
  }
  
  public function delete(Request $request)
  {
      // 該当するPatient Modelを取得
      $patient = Patient::find($request->id);
      // 削除する
      $patient->delete();
      return redirect('admin/patient/');
  }  
}
