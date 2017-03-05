<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;

$this->title = "Добавить сайт";

$this->registerMetaTag([
	'name' => 'description',
	'content' => 'Добавить сайт на блог Михаила Русакова.'
]);

$this->registerMetaTag([
	'name' => 'keywords',
	'content' => 'добавить сайт, добавить сайт блог, добавить сайт блог михаил русаков'
]);
?>

<div id="other">
	<h1>Заполните форму</h1>

    <?php if(!$same_captcha && $captcha) { ?>
        <p class="message" style="color: red;">Повторите ввод капчи!</p>
    <?php } ?>
    
    <?php if(!$captcha) { ?>
        <p class="message" style="color: red;">Введите капчу!</p>
    <?php } ?>
    
	<?php if($success) { ?>
		<p class="message">Ваш сайт успешно добавлен!</p>
	<?php } ?>
	
	<?php if($error) { ?>
		<p class="message" >Произошла ошибка при добавлении! Проверьте данные и повторите попытку.</p>
	<?php } ?>
	
	<p>Проверка сайта происходит автоматически при добавлении. Обратите внимание, что на добавляемой страницей должно быть упоминание обо мне. Например, "Спасибо Михаилу Русакову!", либо должна быть ссылка на любой из моих сайтов (например, на <b>myrusakov.ru</b>).</p>
	<p>Ежеднено все сайты автоматически проверяются и как только это упоминание/ссылка удаляется, то сайт так же будет сразу удалён из списка.</p>
	
<!--	<form name="add_site" method="post" action="/addsite.html" onsubmit="return checkFormAddSite(this)">-->
	<?php $form = ActiveForm::begin();?>
		<div>
<!--			<input type="text" name="address" placeholder="Адрес сайта" value="" />-->
<!--			--><?//=$form->field($model, 'address')->label('Адрес сайта');?>
            
            <?=$form->field($model, 'address', [
                    'inputOptions' => ['placeholder' => $model->getAttributeLabel('Адрес сайта'), ],
            ])->label(false);?>
            
		</div>
		<div>
<!--			<textarea name="description" placeholder="Описание"></textarea>-->
<!--			--><?//=$form->field($model, 'description')->textarea(['rows' => '6'])->label('');?>

            <?=$form->field($model, 'description', [
                    'inputOptions' => ['placeholder' => $model->getAttributeLabel('Описание'), ],
            ])->textarea(['rows' => '6'])->label(false);?>
            
		</div>
		<div>
<!--			<img class="captcha" src="/views/captcha/captcha.php" alt="Проверочный код" />-->
            <img class="captcha" src="/web/captcha/captcha.php" alt="Проверочный код" />
			<input type="text" name="captcha" placeholder="Проверочный код" />
<!--            --><?//=$form->field($model, 'captcha', [
//                    'inputOptions' => ['placeholder' => $model->getAttributeLabel('Проверочный код'), ],
//            ])->label(false);?>
			<div class="clear"></div>
		</div>
		<div>
<!--			<input type="submit" name="add_site" value="Добавить сайт" />-->
			<?=Html::submitButton('Добавить сайт', ['class' => 'buttonaddsite']);?>
		</div>
<!--	</form>-->
	<?php ActiveForm::end();?>
</div>
