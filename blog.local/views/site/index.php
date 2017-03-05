<?php

use yii\widgets\LinkPager;

$this->title = "Личный блог Михаила Русакова";

$this->registerMetaTag([
        'name' => 'description',
        'content' => 'Личный блог михаила русакова и его выпуски рассылки.'
]);

$this->registerMetaTag([
        'name' => 'keywords',
        'content' => 'михаил русаков, блог михаила русакова, рассылка михаил русаков'
]);
?>

<?php

foreach ($posts as $post) {
    include "intro_post.php";
}
?>

<br/>
<hr/>

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


