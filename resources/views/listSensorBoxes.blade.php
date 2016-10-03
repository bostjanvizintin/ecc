@extends('layouts.app')

@section('content')
	<ul>
		@foreach($sensorBoxes as $sensorBox)
			<li><a href="{{ route('sensor.create')}}">{{ $sensorBox->hash }}</a></li>
		@endforeach
	</ul>
@endsection