<!DOCUMENT html>
<html>
<head>
	<title>chapter 07 </title>
	<link href="/stock/open/_bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>

	<style>
		h2{
			display:inline;
			/* 구형 브라우저 - user-select:none; */
		}
		h2.active{ background:darkred; }

		div{
			width:300px;
			height:100px;
			border:3px solid black;
		}
		div.active{
			border:3px dashed black;
			background:orange;
		}
	</style>
</head>
<body class="container">
	<h1>Drag Basic</h1>

	<div class="drop1"></div>
	<h2 draggable="true">Drag it!</h2>

	<table class="table">
	<thead>
	<tr>
		<td>이벤트 이름</td>
		<td>설명</td>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>drag</td><td>자신이 드래그 중일 때</td>
	</tr>
	<tr>
		<td>dragstart</td><td>자신이 드래그 시작</td>
	</tr>
	<tr>
		<td>dragend</td><td>자신이 드래그 종료</td>
	</tr>
	<tr>
		<td>dragenter</td><td>자신의 영역에서 드래그가 들어왔을 때</td>
	</tr>
	<tr>
		<td>dragleave</td><td>자신의 영역에서 드래그가 벗어났을 때</td>
	</tr>
	<tr>
		<td>dragover</td><td>자신의 영역에서 드래그가 일어날때</td>
	</tr>
	<tr>
		<td>drop</td><td>자신의 영역에서 드래그가 종료했을때</td>
	</tr>
	</tbody>
	</table>

<script>
	$(document).ready(function(){
		$("h2").on({
			 dragstart:function(event){
				 $(this).addClass('active');
			 }
			,dragend:function(event){
				$(this).removeClass('active');
			}
		});

		$("div.drop1").on({
			 dragenter:function(event){
				 $(this).addClass('active');
			 }
			,dragleave:function(event){
				$(this).removeClass('active');
			}
			,dragover:function(event){
				event.preventDefault();
			}
			,drop:function(event){
				$("h2.active").appendTo(this);
			}
		});
	});
</script>

<hr />
<style>
	#dropzone{
		height:100px;
		border:3px solid black;
	}
</style>
<script src="prefix.js"></script>
<script>
	removePrefix(window, 'URL');
</script>
<script>
	$(function(){
		$("#dropzone").on({
			 dragover:function(event){
				event.preventDefault();
			}
			,drop:function(event){
				var files = event.originalEvent.dataTransfer.files;

				for(var i = 0 ; i <files.length; i++ ){
					var file = files[i];

					$("<img />", {
						src:URL.createObjectURL(file)
					}).appendTo($("#dropzone_result"));
				}

				event.preventDefault();
			}
		});
	});
</script>
<div id="dropzone">drop zone</div>
<div id="dropzone_result">drop result</div>
</body>
</html>