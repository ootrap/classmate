@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="alert alert-warning">
                <i class="fa fa-warning"></i> 亲爱的同学们，这个页面是临时做出来的，没有做修改功能。这意味着，一旦您提交后将无法再次更改，所以，请务必核对信息后再提交，见笑了。
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">请核实您的信息</div>

                <div class="panel-body">
                     {{ Form::open(array('action' => 'HomeController@post', 'files' => true)) }}
                    <div class="form-group">
                        <label for="name">
                        姓名
                        </label>
                        <input type="text" value="{{$result['name']}}" name="name" class="form-control"  placeholder="输入您的真实姓名" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="unit">
                            单位
                        </label>
                        <input type="text" value="{{$result['unit']}}" class="form-control" name="unit" placeholder="输入您的单位名称" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="address">
                            快递地址
                        </label>
                        <input type="text" value="{{$result['address']}}" class="form-control" name="address" placeholder="输入地址便于获取惊喜" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="mobile">
                            联系电话(手机或固话)
                        </label>
                        <input type="tel" pattern="^((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)$" class="form-control" name="mobile" value="{{$result['mobile']}}" placeholder="长途固话格式0000-88888888" readonly="true">
                    </div>
                    <div class="form-group">
                    <label for="photo">
                            证件照
                        </label>
                        <div class="media">
                            <img src="{{url($result['photo'])}}" alt="">
                        </div>
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
                    <a class="btn btn-danger btn-lg center" href="{{URL::previous()}}">重新填写</a>
                    <a class="btn btn-success btn-lg center" href="{{url('post?name=').$result['name']}}">确认无误,提交</a>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
