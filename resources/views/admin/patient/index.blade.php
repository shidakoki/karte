@extends('layouts.admin')
@section('title', '登録済み患者一覧')

@section('content')
    <div class="container">
        <div class="alert alert-success" role="alert">
        <div class="mx-auto" style="width: 200px;">
            <h2>患者一覧</h2>
        </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\PatientController@add') }}" role="button" class="btn btn-primary">患者作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\PatientController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="alert alert-warning" role="alert">名前</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-patient col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="10%">名前</th>
                                <th width="10%">性別</th>
                                <th width="15%">生年月日</th>
                                {{--<th width="10%">血液型</th>
                                <th width="10%">身長・体重</th>
                                <th width="20%">キーパーソン</th>--}}
                                <th width="30%">病名</th>
                                <th width="15%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $patient)
                                <tr>
                                    <th>{{ $patient->id }}</th>
                                    <td>{{ \Str::limit($patient->name, 100) }}</td>
                                    <td>{{ config('const.gender')[$patient->gender] }}</td>
                                    <td>{{ \Str::limit($patient->birthday_y, 100) }} / {{ \Str::limit($patient->birthday_m, 100) }} / {{ \Str::limit($patient->birthday_d, 100) }}</td>
                                    {{--<td>{{ config('const.bloodtype')[$patient->bloodtype] }}</td>
                                    <td>
                                        <div> {{ \Str::limit($patient->height, 100) }} ・ {{ \Str::limit($patient->weight, 100) }}</div>
                                    </td>
                                    <td>{{ \Str::limit($patient->keyperson, 100) }}</td>--}}
                                    <td>{{ \Str::limit($patient->disease, 100) }}</td>
                                    <td>
                                        <a class= "a_hrefvar" href="{{ action('Admin\KarteController@add', ['patient_id' => $patient->id]) }}">カルテ</a>
                                        <a class= "a_hrefvar" href="{{ action('Admin\PatientController@edit', ['id' => $patient->id]) }}">編集</a>
                                        <a class= "a_hrefvar" href="{{ action('ConfirmationController@index', ['confirmation_url' => action('Admin\PatientController@delete', ['id' => $patient->id])]) }}">削除</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection