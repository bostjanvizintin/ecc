<div class="sensorBox-list">
<h5 class="sensorBox-list-heading">
	My notifications:
</h5>
	<ul>
		@foreach(App\Notification::all()->toArray() as $notification)
    			 <li><a href="{{ route('notification.edit', $notification['id'])}}">{{  $notification['name'] }}</a></li>
		@endforeach
	</ul>
</div>
