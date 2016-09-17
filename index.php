<!DOCTYPE html>
<html>
<head>
	<title>Stamina Calculator - Pad</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

	<script src="jquery-1.11.2.js"></script>

    <script>
		$(document).ready(function() {

			// Stamina Calculator
		    $(".user-stamina").keyup(function() {
		    	var stamina = $(this).val();
		    	minsPerStamina = 3;

		    	if (((Math.floor(stamina) == stamina) && ($.isNumeric(stamina))) || (stamina == "")) {
					time = stamina * minsPerStamina;				

					var hours = Math.floor(time / 60);          
					var mins = time % 60;			

		    		$(".in-mins").val(hours + " hours and " + mins + " mins" );
		    	}

		    	else {
		    		console.log("error");
		    	}
		    }).keyup();

	    });
    </script>    
</head>

<body>
	<div class="container">
		<h1>PaD Space</h1><br>

		<h3>Stamina Calculator</h3>
		<p>Enter number of stamina: <input type="text" class="user-stamina" autofocus></p>
		<p>Converted to time: <input type="text" class="in-mins" readonly></p>

		<br><hr><br>

		<?php 
			include 'database.php';

			date_default_timezone_set('America/New_York');		// Set timezone to New York's
			$today = date("F j");
		?>

		<h3>Today's Metal Schedule (PDT)</h3> 
		<p>Date: <?php echo $today; ?></p>
		<!-- <?php printMetalSchedule(); ?> -->
	</div>

</body>

</html>

<?php
	function printMetalSchedule() {
		$url = 'http://puzzledragonx.com/';
		$content = file_get_contents($url);
		
		$temp_content = explode('<div id="metal1a">' , $content);
		$metal_sched_table = explode('<table id="event"' , $temp_content[1]);

		// echo '<table id="event" ' . $metal_sched_table[1];

		echo findDungeonID($metal_sched_table[1]);

		// $dungeonID = strchr($metal_sched_table[1], 'redirect.asp?d=');
		// $dungeonID = strchr($dungeonID, '" rel="nofollow">', true);
		// echo $dungeonID;

	}

	function findDungeonID($x) {
		// $x = strchr($x, 'redirect.asp?d=');
		// $x = strchr($x, '" rel="nofollow">', true);
		// $x = explode('=', $x);

		$x = explode('redirect.asp?d=', $x);
		$x = strchr($x[1], '" rel="nofollow">', true);

		return $x[1];
	}
?>