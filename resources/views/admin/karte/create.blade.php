{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'カルテ'を埋め込む --}}
@section('title', 'カルテ')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="patient_box">
           <font color="white"><span class="patient_profile_item">患者ID{{ $patient->id }}</span></font>&nbsp;
           <font color="white"><span class="patient_profile_item">名前{{ $patient->name }}</span></font>&nbsp;
           @php
             $birthday = $patient->birthday_y . str_pad($patient->birthday_m, 2, 0, STR_PAD_LEFT) .  str_pad($patient->birthday_d, 2, 0, STR_PAD_LEFT);
             $today = date('Ymd');
             $age = floor(($today - $birthday) / 10000);
           @endphp
           <font color="white"><span class="patient_profile_item">年齢{{$age}}</span></font>&nbsp;
           <font color="white"><span class="patient_profile_item">性別{{ config('const.gender')[$patient->gender] }}</span></font>&nbsp;
           <font color="white"><span class="patient_profile_item">身長{{ $patient->height }}cm</span></font>&nbsp;
           <font color="white"><span class="patient_profile_item">体重{{ $patient->weight }}kg</span></font>&nbsp;
           @php
           $height_m = $patient->height/100;
           $bmi = $patient->weight/($height_m*$height_m);
           $bmi2 = round($bmi,2);
           @endphp
           <font color="white"><span class="patient_profile_item">BMI{{ $bmi2}}</span></span></font>&nbsp;
           <font color="white"><span class="patient_profile_item">血液型{{ config('const.bloodtype')[$patient->bloodtype] }}</span></font>&nbsp;<br>
    　　     <font color="white"><span class="patient_profile_item">キーパーソン{{ $patient->keyperson }}</span></font>&nbsp;
    　　     <font color="white"><span class="patient_profile_item">病名{{ $patient->disease }}</span></font>&nbsp;
    　　</div>
    　　<br>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <form action="{{ action('Admin\KarteController@create') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-md-1">職種</label>
                        <select name="writer_type" class="form-select" aria-label="Default select example">
                         <option selected>職種</option>
                         <option value="1">Dr</option>
                         <option value="2">Ns</option>
                         <option value="3">リハ</option>
                         <option value="4">その他</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-1">新規記録</label>
                        <div class="col-md-12">
                            <textarea class="form-control" name="text" rows="5">{{ old('text') }}</textarea>
                　　      </div>
                　　</div>
                　　<input type="hidden" name="patient_id" value="{{$patient->id}}">
                 {{ csrf_field() }}
                    <input type="submit" name="submit1" class="btn btn-primary" value="保存して継続">
                    <input type="submit" name="submit2" class="btn btn-primary" value="保存して終了">
                </form>
            </div>
        </div>
        <a class="badge rounded-pill bg-light" href="{{ action('Admin\KarteController@create', ['patient_id' => $patient->id,'writer_type'=>'0']) }}">ALL</a>
        <a class="badge rounded-pill bg-light" href="{{ action('Admin\KarteController@create', ['patient_id' => $patient->id,'writer_type'=>'1']) }}">Dr</a>
        <a class="badge rounded-pill bg-light" href="{{ action('Admin\KarteController@create', ['patient_id' => $patient->id,'writer_type'=>'2']) }}">NS</a>
        <a class="badge rounded-pill bg-light" href="{{ action('Admin\KarteController@create', ['patient_id' => $patient->id,'writer_type'=>'3']) }}">リハ</a>
        <a class="badge rounded-pill bg-light" href="{{ action('Admin\KarteController@create', ['patient_id' => $patient->id,'writer_type'=>'4']) }}">その他</a>
        @foreach($kartes as $karte)
            <div class="form-group">
              <form action="{{ action('Admin\KarteController@update') }}" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="{{ $karte->id }}">
                      <input type="hidden" name="writer_type" value="{{ $karte->writer_type }}">
                      <input type="hidden" name="patient_id" value="{{$patient->id}}">
                            {{ csrf_field() }}
                    <label for="exampleInputEmail1">{{ config('const.writer_type')[$karte->writer_type] }}</label>
                     <input type="submit" class="link-btn" value="更新">
                     <a href="{{ action('Admin\KarteController@delete', ['id' => $karte->id]) }}">削除</a>
                     <a>{{ $karte->created_at }}</a>
                     <div class="card">
                     <div class="card-body">
                         <textarea class="form-control" name="text" rows="3">{{ $karte->text }}</textarea>
                     </div>
                     </div> 
              </form>
            </div>
        @endforeach
        {{$kartes->appends(request()->input())->links()}}
    </div>
@endsection