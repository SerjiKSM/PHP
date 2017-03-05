
<div class="post" >
		<h4 > <?php if($post->is_release) { ?> Выпуск №<?=$post->number?>. <?php } ?> </h4 >
		<h1 > <?=$post->title?> </h1 >
		<div class="img" >
			<img src = "<?=$post->img?>" alt = "<?=$post->title?>" />
		</div >
		<div class="text" >
			<p > <?=$post->intro_text?> </p >
		</div >
		<div class="more" >
			<a href = "<?=$post->link?>" >< ЧИТАТЬ ПОЛНОСТЬЮ ></a >
			<a href = "<?=Yii::$app->urlManager->createUrl(["site/releases"])?>" >< ДРУГИЕ ВЫПУСКИ ></a >
		</div >
		<div class="info" >
			<div class="date" > <?=$post->date?> г .</div >
			<div class="hits" >
				<img src = "/web/images/hits.png" alt = "" />Просмотров: <?=$post->hits?>
			</div >
			<div class="clear" ></div >
		</div >
</div >


	


