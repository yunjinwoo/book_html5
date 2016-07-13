<!DOCUMENT html>
<html>
<head>
	<title>chapter 03 </title>
</head>
<body>
	<h1>Remove Prefix</h1>
	<pre>

 - 공통으로 쓰기위해서 만들어진 함수같은데...
 - 동작을 안하네 ㅠㅠㅠㅠㅠ
	</pre>
	<script src="prefix.js"></script>
	<script>
		removePrefix(window, 'URL');
		removePrefix(navigator, 'getUserMedia');
		//이건 안되네;;; removePrefix(document.querySelector('.fullscreen'), 'RequestFullscreen');
	</script>


	<div class="fullscreen">
		<h1>Lorem ipsum dolor sit amet,</h1>
		<p>Lorem ipsum dolor sit amet,</p>
	</div>
	<script>
		window.addEventListener('load', function(){
			var elements = document.querySelectorAll('.fullscreen');

			for(var i = 0 ; i < elements.length ; i++ ){
				elements[i].onclick = function(){
					alert(window.URL());
				}
			}
		});
	</script>
	<hr />


</body>
</html>