<!DOCUMENT html>
<html>
<head>
	<title>chapter 09 </title>
	<link href="/stock/open/_bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="glfx.js"></script>



	<style>
		h1{position:absolute;}
		body{ overflow:hidden;}
	</style>
</head>
<body class="container">

<script>
	var canvas = fx.canvas();
	document.body.appendChild(canvas);


	var image = new Image();
	image.onload  = function(){
		var texture = canvas.texture(image);
		//canvas.draw(texture).update();
		canvas.draw(texture).hexagonalPixelate(0,1,8).update();

	};
	image.src = "test.png";

</script>

<br />
<br /><a href="http://evanw.github.io/glfx.js">http://evanw.github.io/glfx.js</a>
<br /><a href="http://evanw.github.io/glfx.js/demo/#hexagonalPixelate">http://evanw.github.io/glfx.js/demo/#hexagonalPixelate</a>


</body>
</html>