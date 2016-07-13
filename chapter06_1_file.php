<!DOCUMENT html>
<html>
<head>
	<title>chapter 06 </title>
	<link href="/stock/open/_bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body class="container">
	<h1>file-input</h1>
	<div id="file-input-div"></div>

	<input type="file" id="file-input" multiple="multiple"/>
	<script>
		var fileinput = document.getElementById('file-input');
		fileinput.onchange = function(){
			var files = this.files;
			for( var i = 0 ; i < files.length ; i++ ){
				var file = files[i];
				appendLog(file, 'file-input-div');
			}
		}
	</script>

	<hr />

	<h1>file-read text console.log</h1>
	<div id="file-read-div"></div>
	<input type="file" id="file-read" multiple="multiple"/>
	<script>
		var fileread = document.getElementById('file-read');
		fileread.onchange = function(){
			var files = this.files;
			for( var i = 0 ; i < files.length ; i++ ){
				var file = files.item(i);

				appendLog(file, 'file-read-div');

				var reader = new FileReader();
				reader.onload = function(){
					console.log(reader.result);
				}

				reader.readAsText(file);
			}
		}
	</script>


	<hr />

	<h1>file-read image</h1>
	<div id="file-read2-div"></div>
	<input type="file" id="file-read2" multiple="multiple"/>
	<script>
		var fileread = document.getElementById('file-read2');
		fileread.onchange = function(){
			var files = this.files;
			for( var i = 0 ; i < files.length ; i++ ){
				var file = files.item(i);

				appendLog(file, 'file-read2-div');
				var reader = new FileReader();
				reader.onload = function(){
					var image = document.createElement('img');

					image.width = 400;
					image.height = 300;
					image.src = this.result;

					document.getElementById('file-read2-div').appendChild(image);
				}

				reader.readAsDataURL(file);
			}
		}
	</script>



	<hr />

	<h1>file-read createObjectURL</h1>
	<div id="file-read3-div"></div>
	<input type="file" id="file-read3" multiple="multiple"/>
	<script>
		var fileread = document.getElementById('file-read3');
		fileread.onchange = function(){
			var files = this.files;
			for( var i = 0 ; i < files.length ; i++ ){
				var file = files.item(i);

				appendLog(file, 'file-read3-div');

				var objectURL = URL.createObjectURL(file);
				var image = document.createElement('img');

				image.width = 400;
				image.height = 300;
				image.src = objectURL;

				document.getElementById('file-read3-div').appendChild(image);
			}
		}
	</script>
<script>
	function appendLog(file, print_id){
		// console.log(file);

		var output = '<hr />';
		output += '<p>name : '+ file.name +'</p>';
		output += '<p>type : '+ file.type +'</p>';
		output += '<p>size : '+ file.size +'</p>';
		output += '<p>lastModifiedDate : '+ file.lastModifiedDate +'</p>';
		document.getElementById(print_id).innerHTML += output;
	}

</script>
</body>
</html>