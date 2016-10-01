<div class="sensorBox-list">
<h5 class="sensorBox-list-heading">
	My sensors:
</h5>
	<ul>
		@foreach(App\SensorBox::all()->toArray() as $sensorBox)
			<li><a href="{{ route('sensorBox.edit', $sensorBox['hash']) }}">{{ $sensorBox['name'] }}</a></li>
		@endforeach
	</ul>
</div>