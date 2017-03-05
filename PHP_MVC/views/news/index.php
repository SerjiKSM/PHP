

<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="/template/css/style.css" />
		
	</head>

	<body>
		<h1>Hello Serji!</h1>
		<div id="content">
				
			<?php foreach ($newsList as $newsItem): ?>
				<div class="post">
					<h2 class="title"><a href="/news/<?php echo $newsItem['id'];?>"><?php echo $newsItem['title'];?></a></h2>
					<p class="byline"><?php echo $newsItem['date'];?></p>
					<div class="entry">
						<!-- <p style="color: red;  font-size: 100%;"><?php echo $newsItem['short_content'];?></p>  -->
						<p class="letter"><?php echo $newsItem['short_content'];?></p>
					</div>	
					<div class="meta">
						<p class="links"><a href="/news/<?php echo $newsItem['id'];?>" class="comments">Red more</a></p>
					</div>
				</div>
			<?php endforeach; ?>	
				
		</div>
	</body>
</html>



