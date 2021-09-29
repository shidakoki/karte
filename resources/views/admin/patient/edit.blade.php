@extends('layouts.admin')
@section('title', '患者の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>患者編集</h2>
                <form action="{{ action('Admin\PatientController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $patient_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="gender" rows="20">{{ $patient_form->gender }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">生年月日</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="birthday" rows="20">{{ $patient_form->birthday }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">血液型</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="bloodtype" rows="20">{{ $patient_form->bloodtype }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">身長</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="height" rows="20">{{ $patient_form->height }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">体重</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="weight" rows="20">{{ $patient_form->weight }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">キーパーソン</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="keyperson" rows="20">{{ $patient_form->keyperson }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $news_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($patient_form->histories != NULL)
                                @foreach ($patient_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection