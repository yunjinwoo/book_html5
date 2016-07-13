<!DOCUMENT html>
<html>
<head>
	<title>chapter 04 </title>



	<link href="/stock/open/_bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="sammy.js"></script>

</head>
<body class="container">
	<header>
		<h1>Tweeter Search</h1>

		<form action="#/search" method="get" class="form-inline">
			<input type="text" name="keyword" />
			<input type="submit" value="Search" class="btn"/>
		</form>
	</header>
	<section id="content">

	</section>
	<script>
		var app = Sammy(function(){
			this.get('#/search', function(){
				$('input[name=keyword]').val('');

				var keyword = this.params['keyword'];
				//$.ajax('https://search.twitter.com/search.json?q='+keyword+'&callback=?',{
				$.ajax('https://api.instagram.com/v1/tags/' + keyword + '/media/recent?callback=?&count=2',{
					dataType:'JSONP',
					data:{access_token:'16384709.6ac06b4.49b97800d7fd4ac799a2c889f50f2587'},
					success:function(data){
						console.log( data );
						$("#content").empty();

						data.data.forEach(function(item){

							$("#content").append('<a href="' + item.link + '"><img src="' + item.images.thumbnail.url + '"></a>');
							$("#content").append('tag : '+ item.tags.join(', ') );
							$("#content").append('<hr />' );

						});
					}
				});
			});
		});
		
	</script>

	<hr/>
	<h1>Sammy.js basic</h1>
	<pre>

- 뒤로가기... ajax 사용때...
	</pre>


	<a href="#/white">white</a>
	<a href="#/red">red</a>

	<script>
		var app = Sammy(function(){
			this.get('#/white', function(){
				$('html').css('background','');
			});
			this.get('#/red', function(){
				$('html').css('background','red');
			});
		});

		$(function(){
			//app.run('#/white');
		});
	</script>

	<hr />

	<h2>Sammy.js param</h2>
	<script>
		var app = Sammy(function(){
			this.get('#/form', function(){
				var template = $("#form").text();

				$("body").append(template);
			});

			this.get('#/result', function(){
				var name = this.params['name2'];

				$("#result_end").empty();
				$("<h3></h3>").text(name).appendTo("#result_end");

				setTimeout(function(){
					history.back();
				},2*1000);
			});
		});


		$(function(){
			app.run('#/form');
		});
	</script>
	<div id="result_end">
		<script id="form" type="text/template">
			<form action="#/result" method="get">
				<label>Name</label>
				<input type="text" name="name2" />
				<input type="submit" />
			</form>
		</script>

	</div>
</body>
</html>