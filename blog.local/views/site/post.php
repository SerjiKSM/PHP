<?php

$this->title = $post->title;

$this->registerMetaTag([
	'name' => 'description',
	'content' => $post->meta_desc
]);

$this->registerMetaTag([
	'name' => 'keywords',
	'content' => $post->meta_key
]);
?>

<div class="post" id="post_full">
   
    <h4 > <?php if($post->is_release) { ?> Выпуск №<?=$post->number?>. <?php } ?> </h4 >
    
    <h1><?=$post->title?></h1>
    
    <div class="img">
        <img src="<?=$post->img?>" alt="<?=$post->title?>" />
    </div>
    
    <div class="info">
        <div class="date"><?=$post->date?> г.</div>
        <div class="hits">
            <img src="/web/images/hits.png" alt="" />Просмотров: <?=$post->hits?>
        </div>
        <div class="clear"></div>
    </div>
    
    <div class="text">
     
        <p><?=$post->intro_text?></p>
        
        <p><?=$post->full_text?></p>
        
    </div>
    
    <div id="social" >
        <h3>Рекомендуйте этот пост друзьям:</h3>
        <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
        <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
        <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus" data-counter="" data-image="https://blog.myrusakov.ru/images/posts/seo-im.png" data-description="Как раскрутить Интернет-магазин."></div>
    </div>
    <div id="subscribe">
        <h3>Чтобы не пропустить свежие выпуски, заполните форму ниже:</h3>
        <form name="subscribe" action="https://blog.myrusakov.ru/subscribe.html?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=update&amp;utm_content=post_123" method="post" onsubmit="return SR_submit(this)">
            <div>
                <input type="text" name="name" placeholder="Ваше имя" />
            </div>
            <div>
                <input type="text" name="email" placeholder="Ваш email" />
            </div>
            <div>
                <input type="hidden" name="delivery_id" value="4" />
                <input type="submit" name="subscribe" value="ПОЛУЧАТЬ СВЕЖИЕ ВЫПУСКИ" />
            </div>
        </form>
    </div>
</div>
<div id="comments">
    <h4>Добавить комментарий:</h4>
    <div id="comments_vk">
        <div id="vk_comments"></div>
    </div>
</div>


