<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
			google.load("visualization", "1", {packages:["corechart"]});
			google.setOnLoadCallback(drawChart);
			function drawChart() {
				var data = google.visualization.arrayToDataTable([
					['Location', 'Timestamp', 'Count'],
<?php
include_once('config.php');
include 'dbconnection.php'; //for the database logins and passwords

$con=mysqli_connect($server,$user,$pass,$dbname)
	or die("<br>Cannot connect to DB\n");

if (!$con) {
	die('Could not connect: ' . mysql_error());
}

mysql_select_db($database, $con);

$result = mysql_query("select * from Attendance_Sheet");

$output = array();

while($row = mysql_fetch_array($result)) {
	// create a temp array to hold the data
	$temp = array();

	// add the data
	$temp[] = '"' . $row['location'] . '"';
	$temp[] = '"' . $row['timestamp'] . '"';
	$temp[] = (int) $row['count'];

	// implode the temp array into a comma-separated list and add to the output array
	$output[] = '[' . implode(', ', $temp) . ']';
}

// implode the output into a comma-newline separated list and echo
echo implode(",\n", $output);

mysql_close($con);
?>
				]);

				// parse the data table for a list of locations
				var locations = google.visualization.data.group(data, [0], []);
				// build an array of data column definitions
				var columns = [1];
				for (var i = 0; i < locations.getNumberOfRows(); i++) {
					var loc = locations.getValue(i, 0);
					columns.push({
						label: loc,
						type: 'number',
						calc: function (dt, row) {
							// include data in this column only if the location matches
							return (dt.getValue(row, 0) == loc) ? dt.getValue(row, 2) : null;
						}
					});
				}
				
				// create a DataView based on the DataTable to get the correct snapshot of the data for the chart
				var view = new google.visualization.DataView(data);
				// set the columns in the view to the columns we constructed above
				view.setColumns(columns);
				
				var options = {
					title: 'Selfcheck Stats'
				};

				var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
				// draw the chart using the DataView instead of the DataTable
				chart.draw(view, options);
			}
		</script>
	</head>
	<body>
		<div id="chart_div" style="width: 900px; height: 500px;"></div>
	</body>
</html>