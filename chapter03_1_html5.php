<!DOCUMENT html>
<html>
<head>
	<title>chapter 03 </title>
</head>
<body>
	<h1>h1 첫번째</h1>
	<h1>h1 두번째</h1>
	<script>
		window.addEventListener('load', function(){
			var header = document.querySelector('h1');

			header.style.color = 'white';
			header.style.backgroundColor = 'black';
		});
	</script>

	<hr />


	<h2>h2 첫번째</h2>
	<h2>h2 두번째</h2>
	<script>
		window.addEventListener('load', function(){
			var header = document.querySelectorAll('h2');

			header[0].style.color = 'white';
			header[0].style.backgroundColor = 'black';
			
			header[1].style.color = 'blue';
			header[1].style.backgroundColor = 'black';
		});
	</script>

	<hr />


	<img class="fullscreen" src="/insta/insta.jpg" />
	<div class="fullscreen">
		<h1>Lorem ipsum dolor sit amet,</h1>
		<p>Lorem ipsum dolor sit amet,</p>
	</div>
	<script>
		window.addEventListener('load', function(){
			var elements = document.querySelectorAll('.fullscreen');

			for(var i = 0 ; i < elements.length ; i++ ){
				elements[i].onclick = function(){
					if( this.requestFullscreen ){
						this.requestFullscreen();
					}else if( this.msRequestFullscreen ){ // ie용
						this.msRequestFullscreen();
					}else if( this.webkitRequestFullscreen ){ // 크롬,사파리
						this.webkitRequestFullscreen();
					}else if( this.mozRequestFullscreen ){ // 파폭
						this.mozRequestFullscreen();
					}else if( this.oRequestFullscreen ){ // 오페라
						this.oRequestFullscreen();
					}
				}
			}
		});
	</script>

	<style>
		/* HTML5 문서의 fulllscreen 모드 */
		div.fullscreen:fullscreen{ width:60%; border-radius:10px;}

		/* 웹 브라우저 제조사의  fullscreen 모드 */
		div.fullscreen:full-screen{ width:60%; border-radius:10px;}
		div.fullscreen:-ms-full-screen{ width:60%; border-radius:10px;}
		div.fullscreen:-webkit-full-screen{ width:60%; border-radius:10px;}
		div.fullscreen:-moz-full-screen{ width:60%; border-radius:10px;}
		div.fullscreen:-o-full-screen{ width:60%; border-radius:10px;}
	</style>
	<hr />


</body>
</html>