
<?php
//    $this->title = 'Одна статья';
use app\components\MyWidget;
?>

<?php $this->beginBlock('block1'); ?>
    <h1>Заголовок страницы</h1>
<?php $this->endBlock(); ?>

<h1>Show action</h1>

<?php //$this->registerJsFile('@web/js/scripts.js') ?>
<?php //$this->registerJsFile('@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']) ?>

<?php //$this->registerJs("$('.container').append('<p>SHOW!!!</p>');") ?>
<?php $this->registerJs("$('.container').append('<p>SHOW!!!</p>');", yii\web\View::POS_LOAD) ?>

<?php $this->registerCss('.container{background: #ccc;}')?>

<?php //foreach($cats as $cat) {
//    echo $cat->name .'<br>';
//}
//?>

<?php //debug($cats) ?>

<?php //echo count($cats->product) ?>

<?php //echo count($cats[0]->product) ?>

<?php //debug($cats) ?>

<?php //echo MyWidget::widget(['name' => 'Вася']);?>
<?php //echo MyWidget::widget();?>

<?php MyWidget::begin()?>
    <h1>Hello world!</h1>
<?php MyWidget::end()?>

<?php MyWidget::begin()?>
<h1>Hello world!</h1>
<?php MyWidget::end()?>

<?php

    foreach ($cats as $cat) {
        echo '<ul>';
        echo '<li>' . $cat->name . '</li>';

        $products = $cat->product;
        foreach ($products as $product) {
            echo '<ul>';
            echo '<li>' . $product->name . '</li>';
            echo '</ul>';
        }
        
        echo '</ul>';
    }
        
?>

<button class="btn btn-success" id="btn">Click me...</button>

<?php

$js = <<<JS

    $('#btn').on('click', function(){
        $.ajax({
            url: 'index.php?r=post/index',
            data: {test: '123456'},
            type: 'POST',
            success: function(res){
                console.log(res);
            },
            error: function() {
              alert('ERROR!');
            }
        });
    });

JS;

$this->registerJs($js);

?>




