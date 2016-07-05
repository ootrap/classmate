@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="alert alert-warning">
                <i class="fa fa-warning"></i> 亲爱的同学们，在这个简易的页面里，一旦您提交信息后将无法再次更改，所以请务必核对信息后再提交。填报成功会有提示，否则请到页面最下方查找出错信息。
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">已有{{$counts}}人报名 <a href="/list">查看名单</a></div>

                <div class="panel-body">
                    {{ Form::open(array('action' => 'HomeController@showInfo', 'files' => true)) }}
                    <div class="form-group">
                        <label for="name">
                        姓名
                        </label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control"  placeholder="输入您的真实姓名" required>
                    </div>
                    <div class="form-group">
                        <label for="unit">
                            单位
                        </label>
                        <input type="text" value="{{ old('unit') }}" class="form-control" name="unit" placeholder="输入您的单位名称" required>
                    </div>
                    <div class="form-group">
                        <label for="address">
                            快递地址
                        </label>
                        <input type="text" value="{{ old('address') }}" class="form-control" name="address" placeholder="输入地址便于获取惊喜" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">
                            联系电话(手机或固话)
                        </label>
                        <input type="tel" class="form-control" name="mobile" placeholder="请填写真实的联系方式" value="{{ old('mobile') }}" required>
                    </div>
                    <div class="form-group">
                    <label for="photo">
                            上传或拍摄您的照片
                        </label>
                    {{Form::file('photo')}}                        
                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button class="btn btn-success btn-lg center" type="submit">提交</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
