<!DOCUMENT html>
<html>
<head>
	<title>chapter 04 </title>
	<link href="/stock/open/_bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body class="container">
	<h1>hash change</h1>

	<a href="#point_a">point_a</a>
	<a href="#point_b">point_b</a>

	<script>
		window.addEventListener('hashchange', function(){
				alert(location.hash);
		});
	</script>
	<hr />

	<a href="#/">white</a>
	<a href="#/red">red</a>
	<a href="#/green">green</a>
	<a href="#/blue">blue</a>

	<script>
		(function(){
			var router = {};

			location.get = function(url, callback){
				if ( router[url] ){
					router[url].push(callback);
				}else{
					router[url] = [callback];
				}

				return location;
			}

			window.addEventListener('hashchange', function(url, callback){
				if(router[location.hash]){
					router[location.hash].forEach(function(item){
						item();
					});
				}
			});
		})();


		window.onload = function(){
			console.log( location.get );
			location.get('#/', function(){
				document.body.style.background = 'white';
			}).get('#/red', function(){
				document.body.style.background = 'red';
			}).get('#/green', function(){
				document.body.style.background = 'green';
			}).get('#/blue', function(){
				document.body.style.background = 'blue';
			});

			location.hash = '#/';
		};
	</script>
</body>
</html>