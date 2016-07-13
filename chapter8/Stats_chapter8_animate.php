<!DOCUMENT html>
<html>
<head>
	<title>chapter 08 </title>
	<link href="/stock/open/_bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="../prefix.js"></script>
	<script src="Stats.js"></script>


	<script>
		removePrefix(window, 'requestAnimationFrame');

	</script>
	<script>
		function AnimatetionObject( options ){
			this.body = document.createElement('h1');
			this.body.innerText = '★';
			this.body.style.position = 'absolute';

			this.x = options.x || 0 ;
			this.y = options.y || 0 ;
			this.vx = options.vx || 0 ;
			this.vy = options.vy || 0 ;

		}

		AnimatetionObject.prototype.appendTo = function (domElement){
			domElement.appendChild(this.body);
			return this;
		}

		AnimatetionObject.prototype.update = function(){
			this.x += this.vx;
			this.y += this.vy;

			if (this.x < 0 || width < this.x){
				this.vx *= 1;
			}

			if (this.y < 0 || height < this.y){
				this.vy *= 1;
			}

			var x = this.x;
			var y = this.y;
			/*
			* 화면안에서 놀게 하고 싶은데 안되네 ㅠㅠ
			*  계속 올라오기만 하네 ㅋㅋㅋㅋㅋ
			*  아 여려버라 ㅋ
			if( x <= 0 ){
				x *= -1;
			}else if(x >= width ){
				x = width - x%width;
			}
			if( y <= 0 ){
				y *= -1;
			}else if(y >= height ){
				y = height - y%height;
			}*/
			this.body.style.left = x + 'px';
			this.body.style.top = y + 'px';
		}
	</script>
	<script>
		window.addEventListener('load', function(){
			width = window.innerWidth;
			height = window.innerHeight;

			//console.log('load',width,height);
			var objects = [];
			for( var i = 90 ; i < 100 ; i++ ){
				objects.push(new AnimatetionObject({
					x:Math.random() * width,
					y:Math.random() * height,
					vx:Math.random() * 10 - 5,
					vy:Math.random() * 10 - 5
				}).appendTo(document.body));
			}


			var stats = new Stats();

			stats.setMode(0);
			stats.domElement.style.position = 'absolute';
			stats.domElement.style.top = '10px';
			stats.domElement.style.left = '10px';

			document.body.appendChild(stats.domElement);


			var stats2 = new Stats();

			stats2.setMode(1);
			stats2.domElement.style.position = 'absolute';
			stats2.domElement.style.top = '100px';
			stats2.domElement.style.left = '10px';

			document.body.appendChild(stats2.domElement);

			var animate = function(){
				stats.begin();
				stats2.begin();


				objects.forEach(function(item){
					item.update();
				});

				stats.end();
				stats2.end();
				requestAnimationFrame(animate);
			};

			requestAnimationFrame(animate);
		});
	</script>

	<style>
		h1{position:absolute;}
		body{ overflow:hidden;}
	</style>
</head>
<body class="container">

</body>
</html>