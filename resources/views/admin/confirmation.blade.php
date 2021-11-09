@extends('layouts.admin')
@section('title', '登録済み患者一覧')

@section('content')
<div>本当に削除しますか？</div>
<a href="{{ action('Admin\PatientController@delete', ['id' => $patient_id]) }}">削除</a>
@endsection