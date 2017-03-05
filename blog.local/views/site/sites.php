<?php

$this->title = "Сайты моих учеников";

$this->registerMetaTag([
	'name' => 'description',
	'content' => 'Список сайтов моих учеников.'
]);

$this->registerMetaTag([
	'name' => 'keywords',
	'content' => 'список сайтов, список сайтов ученики, список сайтов ученики михаил русаков'
]);
?>

<div id="other">
	<h1>Сайты моих учеников</h1>
	<p class="center">
		<img src="/web/images/sites.png" alt="Сайты моих учеников" />
	</p>
	<p>Ниже идёт список сайтов, которые были созданы моими учениками. Добавить ещё сайт можно <a href="<?=Yii::$app->urlManager->createUrl(['site/addsite'])?>">здесь</a>. Обратите внимание, что обязательным условием является наличие какой-нибудь фразы на главной страницы сайта, свидетельствующей о том, что сайт принадлежит Вам и Вы его создали благодаря моим урокам! Например, это может быть "Спасибо Михаилу Русакову!". Как альтернативу можно просто поставить ссылку на мой сайт <b>myrusakov.ru</b>, либо на любой другой из моих сайтов.</p>
	<ul id="sites" class="ul_mark">
			
		<?php $number = 0; foreach ($sites as $site) { $number++ ?>
		
			<li><a target="_blank" rel="external" href="<?=$site->address?>"><?=$site->address?></a> - <span><?=$site->description?></span></li>
		
		<?php } ?>
		
	</ul>
</div>
