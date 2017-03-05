<html>
	<head>
		<title>AJAX example</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name"viewport" content="width=device-width; initial-scale=1.0">
		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		
	</head>

	<body>
		<h1>AJAX example</h1>
		
		<p>Ваше имя:</p>
				
		<input type="text" id="input1">
		
		<br><br>
		
		<p id="hello"></p>
		
		<br>
		
		<button id="send">Асинхронная отправка на обработку (ajax)</button>	
		
		<script type="text/javascript">
			$("#send").click(function(){

				var params = {
					text: $("#input1").val(),		
				}

				$.post("ajax.php", params, function (data) {
					$("#hello").html(data);
				});
						
			});

			
		</script>
		
	</body>
</html>