
@extends('layouts.master')

@section('title')
Log in dev
@endsection

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="form-group">
			<form action=" {{ route('login') }}" method="post">
				<div class="form-group">
					<label for="email">e-mail:</label>
					<input class="form-control" name="email" type="text"></input>
				</div>
				<div class="form-group">
					<label for="password">password:</label>
					<input class="form-control" type="password" name="password"></input>
				</div>
				 {{ csrf_field() }}
				<button class="btn btn-primary" type="submit">Log in</button>
			</form>
		</div>
	</div>
</div>
@endsection
