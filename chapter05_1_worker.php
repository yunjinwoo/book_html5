<!DOCUMENT html>
<html>
<head>
	<title>chapter 05 </title>
	<link href="/stock/open/_bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body class="container">
	<h1>html5 worker</h1>

	<div id="result"></div>
	<div id="time"></div>
	<script>
		var worker = new Worker('worker.js');

		worker.onmessage = function(event){
			$("#result").append($('<div></div>').html('Result: '+event.data));

			worker.terminate();
			clearInterval(timer);
		}

		var time = 0;
		var timer = setInterval(function(event){
			$("#time").text('Seconds: '+ time++);
		},1000);

		worker.postMessage('42');
	</script>
</body>
</html>