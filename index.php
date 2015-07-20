<!DOCTYPE html>
<html>
<head>
	<title>Stamina Calculator - Pad</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

	<script src="jquery-1.11.2.js"></script>

    <script>
		$( document ).ready(function() {
		    $( ".user-stamina" ).keyup(function() {

		    	var stamina = $( this ).val();

		    	if ( ((Math.floor(stamina) == stamina) && ($.isNumeric(stamina))) || (stamina == "") ) {
					time = stamina * 5;				

					var hours = Math.floor( time / 60);          
					var mins = time % 60;			

		    		$( ".in-mins" ).val( hours + " hours and " + mins + " mins"  );
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
		<h1>My PAD Space</h1><br>

		<h3>Stamina Calculator</h3>
		<p>Enter number of stamina: <input type="text" class="user-stamina" autofocus></p>
		<p>Converted to time: <input type="text" class="in-mins" readonly></p>

		<hr>

		<h3>Today's Metal Schedule (PDT)</h3> 

		<?php 
			$url = 'http://puzzledragonx.com/';
			$content = file_get_contents($url);
			// echo $content;
			
			$temp_content = explode( '<div id="metal1a">' , $content );
			$metal_sched = explode( '<table id="event"' , $temp_content[1] );
			echo '<table id="event" ' . $metal_sched[2];
		?>

	</div>

</body>

</html>