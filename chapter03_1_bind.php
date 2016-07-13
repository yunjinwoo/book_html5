<!DOCUMENT html>
<html>
<head>
	<title>chapter 03 </title>
</head>
<body>
	<h1 id="header">Start Time : </h1>
	<script>
		var header = document.getElementById("header");

		/* 반응없음
		header.onclick = function(){
			setInterval(function(){
				this.innerHTML += '*';
			}, 1000);
		}*/

		header.onclick = function(){
			setInterval(function(){
				this.innerHTML += '*';
			}.bind(this), 1000);
		}
	</script>

	<hr />
</body>
</html>