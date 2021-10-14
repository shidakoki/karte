{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'カルテ'を埋め込む --}}
@section('title', 'カルテ')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="patient_box">
           患者ID{{ $patient->id }}
           名前{{ $patient->name }}
           @php
             $birthday = $patient->birthday_y . str_pad($patient->birthday_m, 2, 0, STR_PAD_LEFT) .  str_pad($patient->birthday_d, 2, 0, STR_PAD_LEFT);
             $today = date('Ymd');
             $age = floor(($today - $birthday) / 10000);
           @endphp
           年齢{{$age}}
           性別{{ config('const.gender')[$patient->gender] }}
           身長{{ $patient->height }}cm
           体重{{ $patient->weight }}kg
           @php
           $height_m = $patient->height/100;
           $bmi = $patient->weight/($height_m*$height_m);
           $bmi2 = round($bmi,2);
           @endphp
           BMI{{ $bmi2}}
           血液型{{ config('const.bloodtype')[$patient->bloodtype] }}
    　　     キーパーソン{{ $patient->keyperson }}
    　　     病名{{ $patient->disease }}
    　　</div>
    　　<div>
    　　    <a href="{{ action('Admin\KarteController@create') }}" role="button" class="btn btn-primary">保存して継続</a>
    　　    <a href="{{ action('Admin\PatientController@index') }}" role="button" class="btn btn-primary">保存して終了</a>
    　　</div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ action('Admin\KarteController@create') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-md-2">職種</label>
                        <select name="writer_type" class="form-select" aria-label="Default select example">
                         <option selected>職種</option>
                         <option value="1">Dr</option>
                         <option value="2">Ns</option>
                         <option value="3">PT</option>
                         <option value="4">その他</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">新規記録</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="text" rows="5">{{ old('text') }}</textarea>
                　　      </div>
                　　</div>
                　　<input type="hidden" name="patient_id" value="{{$patient->id}}">
                 {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
        @foreach($kartes as $karte)
            <tr>
               <th>{{ config('const.writer_type')[$karte->writer_type] }}</th>
               <td>{{ \Str::limit($karte->text, 20) }}</td>
                  <a href="{{ action('Admin\KarteController@update',['id' => $karte->id]) }}">編集</a>
                  <a href="{{ action('Admin\KarteController@delete', ['id' => $karte->id]) }}">削除</a>
               </td>
               </tr>
        @endforeach
    </div>
@endsection