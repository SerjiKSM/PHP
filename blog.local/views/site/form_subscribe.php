
<div class="course_order">
	<p>ЗАПОЛНИТЕ ФОРМУ</p>
	<form name="subscribe_<?=$course->id?>" method="post" action="https://srs.myrusakov.ru/subscribe?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=freeim2" onsubmit="return SR_submit(this)">
		<div>
			<input type="text" name="name" placeholder="Ваше имя" />
		</div>
		<div>
			<input type="text" name="email" placeholder="Ваш email" />
		</div>
		<div>
			<input type="hidden" name="delivery_id" value="<?=$course->did?>" />
			<input type="submit" name="subscribe_freeim2" value="ПОЛУЧИТЬ ВИДЕОКУРС" />
		</div>
	</form>
</div>
