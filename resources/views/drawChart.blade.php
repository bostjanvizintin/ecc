@extends('layouts.app')

@section('headscript')
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      $chart = <?php echo json_encode($chart); ?>

			window.onresize = function() {
				drawChart();
			}

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      var data;
      var chart;
      var options;
      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        data = google.visualization.arrayToDataTable($chart);

        // Set chart options
        options = {'title':'Usage'};

        // Instantiate and draw our chart, passing in some options.
        chart = new google.visualization.LineChart(document.getElementById('chart_div'));



        chart.draw(data, options);
      }
      function hideColumns(size) {
				var columns = new Array();
				for (var i = 0; i < size; i++) {
					if(document.getElementById("hideColumn"+(i+1)).checked) {
						columns.push(i+1);
					}

				}

            var view = new google.visualization.DataView(data);
            view.hideColumns(columns);
            chart.draw(view, options);

      }


    </script>
@endsection

@section('content')
	<div class="panel-heading">
			@include('includes.mainButtons')
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-10">
				<a href="{{ route('usage.index') }}">Back</a>
				<div id="chart_div">

				</div>
			</div>
			<div class="col-xs-2">
				@for($i = 1;$i < count($chart[0]);$i++)
					Sensor: {{ $chart[0][$i] }}<input type="checkbox" id="hideColumn{{ $i }}" value="$i" onclick="hideColumns({{ count($chart[0])-1}})"><br>
				@endfor
			</div>
		</div>
	</div>




@endsection
