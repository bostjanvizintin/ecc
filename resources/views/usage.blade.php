@extends('layouts.app')

@section('content')
  <div class="panel-heading">
      @include('includes.mainButtons')
  </div>
  <div class="panel panel-default panel-margin">
    <div class="panel-body">
      <form action="#" method="POST">
        @foreach($sensors as $key => $sensorBox)
          <div class="form-group">
            <h5>{{ $sensors[$key]['name'] }} :: {{ $sensors[$key]['hash'] }} <input type="checkbox" name="selectAll" value="selectAll{{ $sensors[$key]['name']}}"></h5>
            <ul>
            @foreach($sensorBox['sensors'] as $sensor)
              <li><label for="sensor">{{ $sensor['measurementPointName'] }}, {{ $sensor['measurementPointSubName'] }} </label><input type="checkbox" name="sensors[]" value="{{ $sensor['id'] }}"></li>
            @endforeach
            </ul>

        @endforeach
        <div class="form-group">
          <label for="startDate">Start date:</label>
          <input class="form-control" type="date" name="startDate"><input class="form-control" type="time" name="startTime" value="00:00">
        </div>
        <div class="form-group">
          <label for="endDate">End date:</label>
          <input class="form-control" type="date" name="endDate"><input class="form-control" type="time" name="endTime" value="00:00">
        </div>
        <div class="form-group">
          <label for="interval">Interval:</label>
          <select class="form-control" name="interval">
            <option value="60">Minute</option>
            <option value="3600">Hour</option>
            <option value="86400" selected="selected">Day</option>
            <option value="604800">Week</option>
            <option value="2419200">Month</option>
          </select>
        </div>
        <div class="form-group">
          <label for="type">Current/Total usage:</label><br>
          Current:<input type="radio" name="chartType" value="current">
          Total:<input type="radio" name="chartType" value="total">
        </div>
        {{ csrf_field() }}
        <button class="btn btn-default" type="submit">Show usage</button>
        </div>
      </form>
    </div>
  </div>



  	<div id="chart_div">

  	</div>

@endsection
