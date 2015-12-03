<?php

	// Add your API key provided by Dark Sky.
	/////////////////////////////////////////
	$api = '<YOUR_API_KEY>';

	// Add a location (e.g. Asheville, NC).
	///////////////////////////////////////
	$location = '35.5938,-82.5579';

	$time = new DateTime('NOW');
	// format [YYYY]-[MM]-[DD]T[HH]:[MM]:[SS]
	/////////////////////////////////////////
	$time = $time->format(DateTime::ATOM);

	$end_point = 'https://api.forecast.io/forecast';

	// Construct URL to return json data.
	/////////////////////////////////////
	$request = $end_point.'/'.$api.'/'.$location.','.$time;

	// Decode json, set output as array
	$response = json_decode(file_get_contents($request), true);

	//var_dump($response);

	$forecast = $response['currently']['summary'] . ", with a temperature of " . round($response['currently']['temperature']) . " degrees.";
?>

<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
    <script>
		// This function gets the width and heighth of the browser window
		// so it can dynamically adjust the width and hegiht of the body element.
		/////////////////////////////////////////////////////////////////////////
    $(function() {
      $(window).on('load resize', function() {
        var width = $(window).width();
        var height = $(window).height();
        $('body').css({
          width: width,
          height: height
        })
      });
    });
    </script>

    <style>
      body {
        font-family: PT Sans;
        color: #fff;
        text-shadow: 1px 1px #aaa;
        background: rgba(242,246,248,1);
        background: -moz-radial-gradient(center, ellipse cover, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 49%, rgba(215,224,230,1) 51%, rgba(181,198,208,1) 99%, rgba(224,239,249,1) 100%);
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(242,246,248,1)), color-stop(49%, rgba(216,225,231,1)), color-stop(51%, rgba(215,224,230,1)), color-stop(99%, rgba(181,198,208,1)), color-stop(100%, rgba(224,239,249,1)));
        background: -webkit-radial-gradient(center, ellipse cover, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 49%, rgba(215,224,230,1) 51%, rgba(181,198,208,1) 99%, rgba(224,239,249,1) 100%);
        background: -o-radial-gradient(center, ellipse cover, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 49%, rgba(215,224,230,1) 51%, rgba(181,198,208,1) 99%, rgba(224,239,249,1) 100%);
        background: -ms-radial-gradient(center, ellipse cover, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 49%, rgba(215,224,230,1) 51%, rgba(181,198,208,1) 99%, rgba(224,239,249,1) 100%);
        background: radial-gradient(ellipse at center, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 49%, rgba(215,224,230,1) 51%, rgba(181,198,208,1) 99%, rgba(224,239,249,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f6f8', endColorstr='#e0eff9', GradientType=1 );
      }
      main {
        height: 90%;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .content {
        -webkit-box-flex: 0;
        -webkit-flex: none;
        -ms-flex: none;
        flex: none;
        max-width: 50%;
        text-align: center;
      }
      h3 {
        color: darkorange;
        text-shadow: none;
      }
    </style>
	</head>
	<body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <main>
      <div class="content">
        <h1>Current Forecast for Asheville, NC:</h1>
        <?php print "<h3>$forecast</h3>"; ?>
      </div>
    </main>

	</body>
</html>
