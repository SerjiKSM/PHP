<?php

use yii\widgets\LinkPager;

$this->title = "Выпуски рассылки от Михаила Русакова";

$this->registerMetaTag([
	'name' => 'description',
	'content' => "Все выпуски рассылки от Михаила Русакова."
]);

$this->registerMetaTag([
	'name' => 'keywords',
	'content' => "рассылка русаков, выпуски рассылки, выпуски рассылки русаков, выпуски рассылки михаил русаков"
]);
?>

<div id="other">
	
    <?php include "like.php";?>
    
	<h1>Выпуски рассылки</h1>
    
	<p class="center">
		<img src="/web/images/subscribe.png" alt="Выпуски рассылки" />
	</p>
    
	<p>В этом разделе я решил выложить все выпуски своей рассылки. Раньше их видели только мои подписчики, но письма очень часто теряются, не доходят, случайно удаляются. В результате, человек просто не получил очень важный для него выпуск.</p>
	<p>Чтобы исправить эту проблему, я просто буду выкладывать в этом разделе все новые выпуски своей рассылки. Разумеется, узнавать о выходе новых выпусков будут только мои подписчики. Поэтому если Вы не хотите постоянно проверять появились ли новые выпуски или нет, просто подпишитесь на мою рассылку.</p>
	<p>Чтобы стать моим подписчиком, достаточно выбрать любой из мини-курсов, которые Вас заинтересует. Если Вы заинтересовали оба, то можете подписаться на оба, это не запрещается.</p>
	<p>Что такое мини-курс? Мини-курс - это бесплатная серия секретных видеоуроков, которые недоступны остальным пользователям. Эти видеоуроки направлены на то, чтобы Вы получили максимум знаний по выбранной теме курса.</p>
	<p>Итак, чтобы стать моим подписчиком и получить секретные видеоуроки, заполните форму рядом с одним из представленных курсов.</p>
	<div id="minicourses">
        
        <?php foreach ($minicourses as $course) { ?>
            <div class="course">
                <h4><?=$course->title?></h4>
                <img src="<?=$course->img?>" alt="<?=$course->title?>" />

<!--                <form name="subscribe_freelanding_--><?//=$course->img?><!--" method="post" action="https://srs.myrusakov.ru/subscribe?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=freelanding" onsubmit="return SR_submit(this)">-->
                <form name="subscribe_freelanding_<?=$course->id?>" method="post" action="../../web/test.php" onsubmit="return SR_submit(this)">
                    <div>
                        <input type="text" name="name" placeholder="Ваше имя" />
                    </div>
                    <div>
                        <input type="text" name="email" placeholder="Ваш email" />
                    </div>
                    <div>
                        <input type="hidden" name="delivery_id" value="<?=$course->did?>" />
                        <input type="submit" name="subscribe_freelanding" value="ПОЛУЧИТЬ ВИДЕОКУРС" />
                    </div>
                </form>
                
            </div>
        <?php } ?>
		
		<div class="arrows">
			<div>
				<div class="left">
					<img src="/web/images/arrow_left.png" alt="" />
				</div>
				<div>Бесплатные курсы</div>
				<div class="right">
					<img src="/web/images/arrow_right.png" alt="" />
				</div>
			</div>
		</div>
	</div>
</div>


<h4 id="post_other">Выпуски рассылки</h4>

<?php foreach ($posts as $post) { ?>
    <?php include "intro_post.php"?>
<?php } ?>

<div id="pagination">
    <!--<div id="pages">-->
    <table>
        <tr>
            <td>
                <span>Страница <?=$active_page?> из <?=$count_pages?>   </span>
            </td>

            <td>
                <?= LinkPager::widget([
                        'pagination' => $pagination,
                        'firstPageLabel' => 'В начало',
                        'lastPageLabel' => 'В конец',
                        'prevPageLabel' => '&laquo;'
                ]) ?>
            </td>

        </tr>
    </table>
    <div class="clear"></div>
</div>
