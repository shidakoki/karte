<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Karte;
use Carbon\Carbon;

class KarteController extends Controller
{
  public function add(Request $request)
    {
      $writer_type = $request->writer_type;
      $patient = Patient::find($request->patient_id);
      if ($writer_type == 0){
        $kartes = Karte::where('patient_id', $request->patient_id)->paginate(2);
        }
      else{
        $kartes = Karte::where('patient_id', $request->patient_id)
        ->where('writer_type','=',$request->writer_type)
        ->paginate(2);
        }
      return view('admin.karte.create', ['patient' => $patient,'kartes' => $kartes]);
    }
  
  public function create(Request $request)
    {
      //dump($request);
      $transition_target = 0;
      if ($request->has('submit1')) {
       echo 'submit1からのPOSTです。';
       $transition_target = 0;
       //保存して継続のボタン=submit1
      }
      if ($request->has('submit2')) {
       echo 'submit2からのPOSTです。';
       $transition_target = 1;
       //保存して終了ボタン＝submit2
      }
      $this->validate($request, Karte::$rules);
      $karte= new Karte;
      $form = $request->all();
      unset($form['submit1']);
      unset($form['submit2']);
      //return;
      // データベースに保存する
      $karte->fill($form);
      $karte->save();
      //dd($karte,$form);
      if ($transition_target == 0) {
        return redirect()->back();
        //保存して継続のボタンからcreate/karteに移動
      } else {
        return redirect('admin/patient');
        //保存して終了ボタンからpatientに移動
      }
    }

    public function edit(Request $request)
    {
        return view('admin.karte.edit');
    }

    public function update(Request $request)
    {
      // Validationをかける
      $this->validate($request, Karte::$rules);
      // Kartes Modelからデータを取得する
      $karte = Karte::find($request->id);
      // 送信されてきたフォームデータを格納する
      $karte_form = $request->all();
      unset($karte_form['_token']);
      // 該当するデータを上書きして保存する
      $karte->fill($karte_form)->save();
      
        return redirect('admin/karte/create?'.'patient_id='.$karte_form["patient_id"]);
    }
    public function delete(Request $request)
  {
      //$this->validate($request, Karte::$rules_delete);
      $karte_form = $request->all();
      // 該当するPatient Modelを取得
      $karte = Karte::find($request->id);

      // 削除する
      $karte->delete();
      // dump($karte_form);
      // return;
      // return redirect()->back();
      return redirect('admin/karte/create?'.'patient_id='.$karte_form["patient_id"]);
  }  
}
