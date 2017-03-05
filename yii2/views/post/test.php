<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h1>Action test</h1>

<?php

//\app\controllers\debug(Yii::$app);

//debug(Yii::$app);

?>

<?php if(Yii::$app->session->hasFlash('success')) : ?>
    <?php echo Yii::$app->session->getFlash('success'); ?>
<?php endif; ?>

<?php if(Yii::$app->session->hasFlash('error')) : ?>
    <?php echo Yii::$app->session->getFlash('error'); ?>
<?php endif; ?>

<?php //$form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]) ?>
<?php $form = ActiveForm::begin(['options' => ['id' => 'testForm']]) ?>

<?= $form->field($model, 'name')->label('Имя') ?>
<?//= $form->field($model, 'name')->label('Имя')->passwordInput() ?>
<?= $form->field($model, 'email')->input('email') ?>
<?= yii\jui\DatePicker::widget(['name' => 'attributeName']) ?>
<?= $form->field($model, 'text')->label('Текст сообщения')->textarea(['rows' => 5]) ?>

<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>

<?php $form = ActiveForm::end() ?>
