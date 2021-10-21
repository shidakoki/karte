{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'カルテ'を埋め込む --}}
@section('title', 'カルテ')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="patient_box">
           <font color="white">患者ID{{ $patient->id }}</font>
           <font color="white"> 名前{{ $patient->name }}</font>
           @php
             $birthday = $patient->birthday_y . str_pad($patient->birthday_m, 2, 0, STR_PAD_LEFT) .  str_pad($patient->birthday_d, 2, 0, STR_PAD_LEFT);
             $today = date('Ymd');
             $age = floor(($today - $birthday) / 10000);
           @endphp
           <font color="white">年齢{{$age}}</font>
           <font color="white">性別{{ config('const.gender')[$patient->gender] }}</font>
           <font color="white">身長{{ $patient->height }}cm</font>
           <font color="white">体重{{ $patient->weight }}kg</font>
           @php
           $height_m = $patient->height/100;
           $bmi = $patient->weight/($height_m*$height_m);
           $bmi2 = round($bmi,2);
           @endphp
           <font color="white">BMI{{ $bmi2}}</font>
           <font color="white">血液型{{ config('const.bloodtype')[$patient->bloodtype] }}</font><br>
    　　     <font color="white">キーパーソン{{ $patient->keyperson }}</font>
    　　     <font color="white">病名{{ $patient->disease }}</font>
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
                         <option value="3">リハ</option>
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
                    <input type="submit" name="submit1" class="btn btn-primary" value="保存して継続">
                    <input type="submit" name="submit2" class="btn btn-primary" value="保存して終了">
                </form>
            </div>
        </div>
        <a href="{{ action('Admin\KarteController@create', ['patient_id' => $patient->id,'writer_type'=>'1']) }}">１に絞り込み</a>
        <a href="{{ action('Admin\KarteController@create', ['patient_id' => $patient->id,'writer_type'=>'2']) }}">2に絞り込み</a>
        @foreach($kartes as $karte)
            <div class="form-group">
             <label for="exampleInputEmail1">{{ config('const.writer_type')[$karte->writer_type] }}</label>
             <a href="{{ action('Admin\KarteController@update',['id' => $karte->id]) }}">編集</a>
             <a href="{{ action('Admin\KarteController@delete', ['id' => $karte->id]) }}">削除</a>
             <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $karte->text }}</textarea>
            </div>
        @endforeach
    </div>
@endsection