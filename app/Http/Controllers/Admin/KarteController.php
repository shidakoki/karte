<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Karte;

class KarteController extends Controller
{
  public function add(Request $request)
    {
      $patient = Patient::find($request->patient_id);
      $kartes = Karte::where('patient_id', $request->patient_id)->get();
      return view('admin.karte.create', ['patient' => $patient,'kartes' => $kartes]);
    }
  
  public function create(Request $request)
    {
      $this->validate($request, Karte::$rules);
      $karte= new Karte;
      $form = $request->all();
        return view('admin/karte/create');
    }

    public function edit(Request $request)
    {
        return view('admin.karte.edit');
    }

    public function update(Request $request)
    {
      // Validationをかける
      $this->validate($request, Patient::$rules);
      // Kartes Modelからデータを取得する
      $karte = Karte::find($request->id);
      // 送信されてきたフォームデータを格納する
      $karte_form = $request->all();
      unset($karte_form['_token']);

      // 該当するデータを上書きして保存する
      $karte->fill($karte_form)->save();
      
        return redirect('admin/karte/create');
    }
    public function delete(Request $request)
  {
      // 該当するPatient Modelを取得
      $karte = Karte::find($request->id);
      // 削除する
      $karte->delete();
      return redirect('admin/karte/create');
  }  
}
