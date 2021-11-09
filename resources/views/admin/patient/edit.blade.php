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
                        <select name="gender" class="form-select" aria-label="Default select example">
                         <option selected>性別選択</option>
                         <option value="1" @if ($patient_form->gender == "1") selected @endif>男</option>
                         <option value="2" @if ($patient_form->gender == "2") selected @endif>女</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">生年月日</label>
                        <div class="mb-3 col col-md-12">
                        <input name="birthday_y" type="number" class="form-control" value="{{ $patient_form->birthday_y}}">
                        </div>
                        <div class="mb-3 col col-md-12">
                        <input name="birthday_m" type="number" class="form-control" value="{{ $patient_form->birthday_m}}">
                        </div>
                        <div class="mb-3 col col-md-12">
                        <input name="birthday_d" type="number" class="form-control" value="{{ $patient_form->birthday_d}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">血液型</label>
                        <select class="form-select" name="bloodtype" aria-label="Default select example">
                         <option value="0" selected>血液型</option>
                         <option value="1"@if ($patient_form->bloodtype == "1") selected @endif>A</option>
                         <option value="2"@if ($patient_form->bloodtype == "2") selected @endif>B</option>
                         <option value="3"@if ($patient_form->bloodtype == "3") selected @endif>O</option>
                         <option value="4"@if ($patient_form->bloodtype == "4") selected @endif>AB</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">身長</label>
                        <div class="mb-3 col col-md-12">
                        <input name="height" type="number" class="form-control" value="{{ $patient_form->height}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">体重</label>
                        <div class="mb-3 col col-md-12">
                        <input name="weight" type="number" class="form-control" value="{{ $patient_form->weight}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">キーパーソン</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="keyperson" rows="5">{{ $patient_form->keyperson}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">病名</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="disease" rows="5">{{ $patient_form->disease}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $patient_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection