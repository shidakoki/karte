@extends('layouts.admin')
@section('title', '患者作成')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                 <h2>患者作成</h2>
                <form action="{{ action('Admin\PatientController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <select name="gender" class="form-select" aria-label="Default select example">
                         <option selected>性別選択</option>
                         <option value="1">男</option>
                         <option value="2">女</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">生年月日</label>
                        <div class="mb-3 col col-md-12">
                        <input name="birthday_y" type="number" class="form-control" value="2000">
                        </div>
                        <div class="mb-3 col col-md-12">
                        <input name="birthday_m" type="number" class="form-control" value="1">
                        </div>
                        <div class="mb-3 col col-md-12">
                        <input name="birthday_d" type="number" class="form-control" value="1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">血液型</label>
                        <select class="form-select" name="bloodtype" aria-label="Default select example">
                         <option selected>血液型</option>
                         <option value="1">A</option>
                         <option value="2">B</option>
                         <option value="3">O</option>
                         <option value="4">AB</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">身長</label>
                        <div class="mb-3 col col-md-12">
                        <input name="height" type="number" class="form-control" value="160">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">体重</label>
                        <div class="mb-3 col col-md-12">
                        <input name="weight" type="number" class="form-control" value="60">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">キーパーソン</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="keyperson" rows="5">{{ old('keyperson') }}</textarea>
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection