@extends('layouts.app')

@section('headscript')
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      var phpChart = <?php echo json_encode($chart); ?>;
			var idSensor = <?php echo json_encode($idSensor); ?>;
			var latestUpdate = <?php echo json_encode($latestUpdate); ?>;

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
        data = google.visualization.arrayToDataTable(phpChart);

        // Set chart options
        options = {'title':'Usage'};

        // Instantiate and draw our chart, passing in some options.
        chart = new google.visualization.LineChart(document.getElementById('chart_div'));


        chart.draw(data, options);
      }

			function test() {
				var url = '/usage/ajax/' + idSensor + '/' + latestUpdate;

				$.get(url, function(data) {
					if(data != 0) {
						latestUpdate = data.time.date;
						phpChart.push([latestUpdate, data.value]);

						if(phpChart.length > 11) {
							phpChart.splice(2,1);
						}

						drawChart();
					}
				});
			}

			window.setInterval(function(){
			  test();
			}, 1000);

    </script>

@endsection

@section('content')
	<div class="panel-heading">
			@include('includes.mainButtons')
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-8">
				<a href="{{ route('usage.index') }}">Back</a>
				<div id="chart_div">

				</div>
			</div>
			<div class="col-xs-4">
			</div>
		</div>
	</div>
@endsection
