<!DOCUMENT html>
<html>
<head>
	<title>chapter 09 </title>
	<link href="/stock/open/_bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="prefix.js"></script>


	<script>
		removePrefix(navigator, 'getUserMedia');
	</script>

	<script>
		window.addEventListener('load', function(){
			// getUserMedia() no longer works on insecure origins. To use this feature,
			// you should consider switching your application to a secure origin,
			// such as HTTPS. See https://goo.gl/rStTGz for more details.

			navigator.getUserMedia(
					{	video:true,	audio:true }
					,function(stream){
						var source = URL.createObjectURL(stream);
						var video = document.createElement('video');

						video.src = source;
						video.autoplay = true;

						document.body.appendChild(video);
					}
					,function(err){console.log("err " , err.name);
					});

				/*
				* ({ audio: true, video: { width: 1280, height: 720 }
				 },
				 function(stream) {
				 var video = document.querySelector('video');
				 video.src = window.URL.createObjectURL(stream);
				 video.onloadedmetadata = function(e) {
				 video.play();
				 };
				 },
				 function(err) {
				 console.log("The following error occurred: " + err.name);
				 });
				 */
			});
	</script>

	<style>
		h1{position:absolute;}
		body{ overflow:hidden;}
	</style>
</head>
<body class="container">
	<h3>이 챕터는 오류가 있는거 같네... 테스트 불가 ㅠ P165-171</h3>
</body>
</html>