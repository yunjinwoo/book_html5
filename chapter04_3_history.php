<!DOCUMENT html>
<html>
<head>
	<title>chapter 03 </title>
	<link href="/stock/open/_bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body class="container">
	<h1>push state</h1>

	<h2>Count - 0</h2>
	<button class="push">click</button>

	<script>
		$(function(){
			var count = 1;

			$("button.push").bind('click', function(){
				$("h2").text('Count - '+count);

				history.pushState({
					data:count
				}, 'Push State', '#'+count );

				count += 1 ;
			});
		});

		$(window).on('popstate', function(event){
			if(event.originalEvent.state){
				$("h2").text('Count - '+event.originalEvent.state.data);
			}
		});
	</script>

</body>
</html>