@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
             <div class="panel panel-default">
		<div class="panel-heading">
			当前已有{{count($users)}}位同学报名
		</div>
                <div class="panel-body">
			@foreach ($users as $user)
				<button class="btn btn-info">{{$user->name}}</button>

			@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
