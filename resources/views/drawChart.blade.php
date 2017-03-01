@extends('layouts.app')

@section('headscript')
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      var phpChart = <?php echo json_encode($chart); ?>;
			console.log(phpChart);

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
			<div class="col-md-8">
				<a href="{{ route('usage.index') }}">Back</a>
				<div id="chart_div">

				</div>
			</div>
			<div class="col-xs-4">
				<table>
				@for($i = 1;$i < count($chart[0]);$i++)
					<tr>
						<td>
							Sensor: {{ $chart[0][$i] }}
						<td>
							<input type="checkbox" id="hideColumn{{ $i }}" value="{{ $i }}" onclick="hideColumns({{ count($chart[0])-1}})"><br>
						</td>
						</td>
						<td><a href="{{ route('usage.drawLiveChart', ['idSensor' => $chart[0][$i]]) }}">Show live feed!</a></td>
					</tr>
				@endfor
				</table>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped">
						<thead>
							<tr>
								<th>Senzor</th>
								<th>Max</th>
								<th>Min</th>
								<th>Avg.</th>
								<th>Total</th>
								<th>Total $</th>
								<th>Compared to others</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>163</td>
								<td>0.4</td>
								<td>64</td>
								<td>2532</td>
								<td>2.3€</td>
								<td>0.63</td>
							</tr>
						</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
