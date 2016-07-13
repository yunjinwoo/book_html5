<!DOCUMENT html>
<html>
<head>
	<title>chapter 06 </title>
	<link href="/stock/open/_bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body class="container">
	<h1>Blob 와 worker</h1>
	<script>
		var blob = new Blob(['Normal Text'], {
			type: 'text/plain'
		});
	</script>

	<button id="btn_ajax">XMLHttpRequest</button>
	<script>
		$("#btn_ajax").click(function(){
			var request = new XMLHttpRequest();
			request.open('GET', URL.createObjectURL(blob), false);
			request.send();

			$("body").append($("<h3></h3>").html(request.response));
			//alert(request.response);
		});

	</script>

	<button id="btn_ajax2">inline worker</button>
	
	<script type="text/worker">
		onmessage = function(event){
			postMessage( 'ECHO:' + event.data );
		}
	</script>


	<script>
		var text = document.querySelector('script[type="text/worker"]').textContent;
		var blob2 = new Blob([text], {
			type: 'text/javascript'
		});


		var worker = new Worker(URL.createObjectURL(blob2));
		worker.onmessage = function(event){
			$("body").append($("<h3></h3>").html(event.data));

			worker.terminate();
		}

		setTimeout(function(){
			worker.postMessage('setTimeout- inline worker');
		}, 1000);



		var worker2 = new Worker(URL.createObjectURL(blob2));
		worker2.onmessage = function(event){

			setTimeout(function(){
				$("body").append($("<h3></h3>").html(event.data));
			}, 1500);

			worker2.terminate();
		}

		worker2.postMessage('inline worker');
	</script>

</body>
</html>