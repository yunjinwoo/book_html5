<!DOCUMENT html>
<html>
<head>
	<title>chapter 04 </title>
	<link href="/stock/open/_bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body class="container">
	<h1>instal search </h1>

	<form action="#/search" method="get" class="form-inline">
		<input type="text" name="keyword" />
		<input type="submit" value="Search" class="btn"/>
	</form>
	<section id="content">

	</section>
	<script>
		$(function(){
			$("form").submit(function(event){
				var keyword = $('input[name=keyword]').val();
				$('input[name=keyword]').val('');

				$.ajax('https://api.instagram.com/v1/tags/' + keyword + '/media/recent?callback=?&count=10',{
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

						history.pushState(data, 'Search - '+keyword, '#/search?keyword='+keyword );
					}
				});

				event.preventDefault();
			});


			if( location.hash.indexOf('#/search?keyword=') >= 0 ){
				$('input[name=keyword]').val(location.hash.replace('#\/search\?keyword=', ''));
				$("form").submit();
			}
		});

		$(window).on('popstate', function(event){
			$("#content").empty();
			if(event.originalEvent.state){

				event.originalEvent.state.data.forEach(function(item){

					$("#content").append('<a href="' + item.link + '"><img src="' + item.images.thumbnail.url + '"></a>');
					$("#content").append('tag : '+ item.tags.join(', ') );
					$("#content").append('<hr />' );
				});
			}
		});


	</script>
</body>
</html>