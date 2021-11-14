@extends('layouts.admin')
@section('title', '削除')

@section('content')
　<div class="delete-btn">
　   <a href="{{  $confirmation_url }}">本当に削除しますか？</a>
  </div>s
@endsection
