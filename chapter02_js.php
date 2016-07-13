<!DOCUMENT html>
<html>
<head>
	<title>chapter 02 </title>
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

	<textarea id="textarea2" rows="5"></textarea>
	<script>
		var Enter = 13;
		var textarea2 = document.getElementById("textarea2");

		textarea2.onkeypress = function(){
			/*  엔터가 입력됨
			 if(event.keyCode == Enter && event.shiftKey == false ){
			 	this.value = "";
			 }
			 }*/

			if(event.keyCode == Enter && event.shiftKey == false ){
				var t = this;

				//1. 스로틀 기법 ( Throttle )
				//setTimeout(function(){
				//	t.value='';
				//},0);

				// 2.기본이벤트 제거
				this.value = '';
				return false;
			}

		}
	</script>

	<hr />
	console view
	<script>
		/* 실행시 콘솔에 노출된다.
		Object.prototype.iterate = function(callback){
			for( var key in this){
				callback(key, this[key], this);
			}
		};
		*/

		// jQuery 는 each 와 충돌을 막고자 iterate() 메서드로 했다네???
		Object.defineProperties(Object.prototype, {
			iterate:{
				value: function(callback){
					for( var key in this){
						callback(key, this[key], this);
					}
				}
			}
		});


		({
			 name:'rint'
			,hobby:['Guitar', 'Piano']
		}).iterate(function(key,item){
			console.log(key,item);
		});
	</script>
	
	<hr />
	strict 모드
	<script>
		var object = {
			 one:10
			,one:20
		}
		
		
		function(x,x,x){}
		console.log(object);
	</script>
	<script>
		'use strict';
		var object = {
			one: 30
		//	, one: 40
		};
		//function(x,x,x){}
		console.log(object);
	</script>
	<script>
		(function(){
			'use strict';
		});
		var object = {
			one: 30
			, one: 40
		};
		function(x,x,x){}
		console.log(object);
	</script>
</body>
</html>