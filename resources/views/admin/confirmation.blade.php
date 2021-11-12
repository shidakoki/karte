@extends('layouts.admin')
@section('title', '登録済み患者一覧')

@section('content')
<div>本当に削除しますか？</div>
<a class= "a_hrefvar" href="{{ $confirmation_url }}">削除</a>
{{--<a class= "a_hrefvar" href="{{ action('Admin\PatientController@delete', ['id' => $patient_id]) }}">削除</a>
--}}@endsection