@extends('layouts.app')


@section('headscript')
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
         var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);
        
        // Set chart options
        var options = {'title':'Usage'};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
@endsection


@section('content')
  <div class="panel panel-default panel-margin">
    <div class="panel-body">
      <form action="#" method="POST">
        @foreach($sensors as $key => $sensorBox)
          <div class="form-group">
            <h5>{{ $sensors[$key]['name'] }} :: {{ $sensors[$key]['hash'] }}</h5>
            <ul>
            @foreach($sensorBox['sensors'] as $sensor)
              <li><label for="sensor">{{ $sensor['measurementPointName'] }}, {{ $sensor['measurementPointSubName'] }} </label><input type="checkbox" name="sensors[]" value="{{ $sensor['id'] }}"></li>
            @endforeach
            </ul>

        @endforeach

        <label for="startDate">Start date:</label>
        <input class="form-control" type="date" name="startDate"><input class="form-control" type="time" name="startTime">
        <label for="endDate">End date:</label>
        <input class="form-control" type="date" name="endDate"><input class="form-control" type="time" name="endTime">
        {{ csrf_field() }}
        <button class="btn btn-default" type="submit">Show usage</button>
        </div>
      </form>
    </div>
  </div>

   

  	<div id="chart_div">
  		
  	</div>

@endsection
