<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use app\components\PostOthers;
use app\models\SearchForm;
use yii\widgets\ActiveForm;

AppAsset::register($this);

$action = Yii::$app->controller->action->id;
$model = new SearchForm();
?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!--    <link href="/web/favicon.ico" ref="shortcut icon" type="image/x-icon" />-->
    <link href="/web/favicon.ico" ref="shortcut icon" type="image/x-icon"/>

</head>
<body>
<?php $this->beginBody() ?>

<div id="header">
    <ul class="menu">
        <li>
            <!--            <a href="/author.html">Об авторе</a>-->
            <a href="<?= Yii::$app->urlManager->createUrl(["site/author"]) ?>"
               <?php if ($action == "author") { ?>class="active" <?php } ?> >Об авторе</a>
        </li>
        <li>
            <!--            <a href="/courses.html">Видеокурсы</a>-->
            <a href="<?= Yii::$app->urlManager->createUrl(["site/video"]) ?>"
               <?php if ($action == "video") { ?>class="active" <?php } ?> >Видеокурсы</a>
        </li>
        <li>
            <!--            <a href="/reviews.html">Отзывы</a>-->
            <a href="<?= Yii::$app->urlManager->createUrl(["site/rev"]) ?>"
               <?php if ($action == "rev") { ?>class="active" <?php } ?> >Отзывы</a>
        </li>
        <li>
            <!--            <a href="/subscribe.html">Выпуски рассылки</a>-->
            <a href="<?= Yii::$app->urlManager->createUrl(["site/releases"]) ?>"
               <?php if ($action == "releases") { ?>class="active" <?php } ?>">Выпуски рассылки</a>
        </li>
        <li>
            <!--            <a target="_blank" href="https://myrusakov.ru">Мой сайт</a>-->
            <a target="_blank" href="<?= Yii::$app->urlManager->createUrl(["site/index"]) ?>"
               <?php if ($action == "index") { ?>class="active" <?php } ?> >Мой сайт</a>
        </li>
        <li>
            <!--            <a href="/sites.html">Сайты учеников</a>-->
            <a href="<?= Yii::$app->urlManager->createUrl(["site/sites"]) ?>"
               <?php if ($action == "sites") { ?>class="active" <?php } ?> >Сайты учеников</a>
        </li>
    </ul>
    <div class="clear"></div>
    <div id="header_title">
<!--        <h2><a href="/">блог Михаила Русакова</a></h2>-->
        <h2><a href="<?= Yii::$app->urlManager->createUrl(["/"]) ?>">блог Михаила Русакова</a></h2>
    </div>
    <div id="search">

        <!--        <form name="search" method="get" action="/search.html">-->
        <!--            <div>-->
        <!--                <input type="text" name="q" placeholder="Поиск" />-->
        <!--                <input type="image" src="/web/images/search_icon.png" alt="Поиск" />-->
        <!--            </div>-->
        <!--        </form>-->

        <?php $form = ActiveForm::begin(); ?>

        <div>
            <table>
                <tr>

                    <td>
<!--                        --><?//= $form->field($model, 'q')->textInput(['class' => 'input'])->label('') ?>
                        <?=$form->field($model, 'q', [
                                'inputOptions' => ['placeholder' => $model->getAttributeLabel('Поиск'), ],
                        ])->label(false);?>
                    </td>
                    <td>
                        <input type="image" src="/web/images/search_icon.png" alt="Поиск"/>
                    </td>

                </tr>
            </table>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <div class="clear"></div>
</div>


<div id="content">

    <div id="slider">
        <div class="slider_item">
            <img src="/web/images/courses/reactjs.png" alt="React JS, Redux, ES2015<br />с Нуля до Гуру"/>
            <div class="slider_content">
                <h3>React JS, Redux, ES2015<br/>с Нуля до Гуру</h3>
                <p>Данный курс - это обширный курс по JavaScript и фреймворку ReactJS, который позволит Вам с нуля
                    создавать мощные современные, динамические JavaScript-приложения.
                    Вы узнаете о тонкостях работы с "профессиональным" JavaScript.
                    А в практической части с полного нуля будет создано мощное и быстрое динамическое приложение, где Вы
                    на практике познакомитесь, как создавать очень гибкую и расширяемую архитектуру, для разработке
                    функционала любой сложности.</p>
            </div>
            <div class="more"><a target="_blank"
                                 href="https://srs.myrusakov.ru/reactjs?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=reactjs">УЗНАТЬ
                    ПОДРОБНЕЕ</a></div>
        </div>
        <div class="slider_item">
            <img src="/web/images/courses/landing.png" alt="Создание и продвижение<br />лендинга под ключ"/>
            <div class="slider_content">
                <h3>Создание и продвижение<br/>лендинга под ключ</h3>
                <p>Данный курс научит Вас создавать профессиональные лендинги на любую тематику с нуля и под ключ.
                    Помимо теории Вы так же своими глазами будете видеть, как создаётся лендинг: заказывается дизайн,
                    верстаются страницы, программируется клиентская часть и Admin-панель, а после лендинг размещается в
                    Интернете. Так же Вы узнаете, как продвигаются лендинги и, самое главное, Вы увидите, как это
                    делается на примере созданного лендинга до первых клиентов.</p>
            </div>
            <div class="more"><a target="_blank"
                                 href="https://srs.myrusakov.ru/landing?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=landing">УЗНАТЬ
                    ПОДРОБНЕЕ</a></div>
        </div>
        <div class="slider_item">
            <img src="/web/images/courses/im2.png" alt="Создание Интернет-магазина<br />на OpenCart 2.0"/>
            <div class="slider_content">
                <h3>Создание Интернет-магазина<br/>на OpenCart 2.0</h3>
                <p>Данный курс обучит Вас созданию любых Интернет-магазинов на OpenCart 2. Разбираются абсолютно все
                    возможности данного движка с примерами, далее создаётся полноценный Интернет-магазин, где Вы уже всё
                    увидите своими глазами. И, наконец, созданный Интернет-магазин будет размещён в Интернете. Также Вы
                    получите очень ценные Бонусы сопоставимые с самим курсом: "Как сэкономить на Яндекс.Директ до 50%",
                    "Дропшиппинг" и "Как раскрутить Интернет-магазин".</p>
            </div>
            <div class="more"><a target="_blank"
                                 href="https://srs.myrusakov.ru/im2?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=im2">УЗНАТЬ
                    ПОДРОБНЕЕ</a></div>
        </div>
        <div class="slider_item">
            <img src="/web/images/courses/yii.png" alt="Фреймворк Yii 2.0 с нуля.<br />Пример создания сайта"/>
            <div class="slider_content">
                <h3>Фреймворк Yii 2.0 с нуля.<br/>Пример создания сайта</h3>
                <p>Видеокурс "Фреймворк Yii 2.0 с нуля. Пример создания сайта" обучит Вас созданию профессиональных
                    сайтов с использованием фреймворка Yii. В курсе есть 2 раздела: теоретический и практический. В
                    теоретическом разделе будут разобраны возможности фреймворка Yii с примерами их использования, а в
                    практической части будет создан сайт Blog.MyRusakov.ru с помощью полученных знаний из теоретического
                    раздела.</p>
            </div>
            <div class="more"><a target="_blank"
                                 href="https://srs.myrusakov.ru/yii?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=yii">УЗНАТЬ
                    ПОДРОБНЕЕ</a></div>
        </div>
        <div class="slider_item">
            <img src="/web/images/courses/fl.png" alt="Заработок на создании<br />сайтов под заказ"/>
            <div class="slider_content">
                <h3>Заработок на создании<br/>сайтов под заказ</h3>
                <p>В этом курсе Вы узнаете все мои секреты успешного заработка на создании сайтов под заказ. Из курса Вы
                    узнаете, какие грубейшие ошибки допускают новички, из-за чего 99% терпят неудачу. Узнаете, как
                    правильно заполнить профиль, как правильно писать заказчику, как собирать отзывы. Подробнейший план
                    действий также прилагается. И, наконец, к курсу идёт бесплатный Бонус, который расскажет Вам 3
                    способа, как раскрутить аккаунт на фрилансе буквально за 1 день.</p>
            </div>
            <div class="more"><a target="_blank"
                                 href="https://srs.myrusakov.ru/fl?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=fl">УЗНАТЬ
                    ПОДРОБНЕЕ</a></div>
        </div>
        <div class="slider_item">
            <img src="/web/images/courses/wp.png" alt="WordPress 4.<br />Пример создания блога"/>
            <div class="slider_content">
                <h3>WordPress 4.<br/>Пример создания блога</h3>
                <p>Этот курс научит Вас создавать любые сайты на самой популярной CMS - WordPress. В курсе Вы узнаете
                    абсолютно всё, что необходимо для успешного создания любых сайтов на WordPress, а также увидите
                    пример создания реального блога.
                    После создания блога он размещается в Интернете, опять же на Ваших глазах. Таким образом, приобретя
                    данный курс, Вы, не обладая никакими начальными знаниями по созданию сайтов, уже сможете их делать,
                    а также выкладывать в Интернет. </p>
            </div>
            <div class="more"><a target="_blank"
                                 href="https://srs.myrusakov.ru/wp?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=wp">УЗНАТЬ
                    ПОДРОБНЕЕ</a></div>
        </div>
        <div class="slider_item">
            <img src="/web/images/courses/php2.png" alt="Создание движка на<br />PHP и MySQL 2.0"/>
            <div class="slider_content">
                <h3>Создание движка на<br/>PHP и MySQL 2.0</h3>
                <p>Этот курс научит Вас создавать профессиональные движки для сайтов на PHP и MySQL с использованием ООП
                    и паттерна MVC.
                    В курсе разобрана вся теория по структуре движка: как всё устроено, какие должны быть объекты, какая
                    у них иерархия и как они взаимодействуют между собой.
                    В практической части будет создан движок с чистого листа для сайта MyRusakov.ru. Будет создано ядро,
                    все адаптеры, все вспомогательные классы, а также классы для работы с объектами базы данных.</p>
            </div>
            <div class="more"><a target="_blank"
                                 href="https://srs.myrusakov.ru/php2?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=php2">УЗНАТЬ
                    ПОДРОБНЕЕ</a></div>
        </div>
        <div class="slider_item">
            <img src="/web/images/courses/html5.png" alt="HTML5 и CSS3<br />с Нуля до Гуру"/>
            <div class="slider_content">
                <h3>HTML5 и CSS3<br/>с Нуля до Гуру</h3>
                <p>Данный курс научит Вас создавать сайты с использованием HTML5 и CSS3. Из курса Вы узнаете, что нового
                    появилось в этих Web-технологиях с разбором множества примеров. И, самое главное, целый раздел
                    посвящён вёрстке на HTML5 и CSS3 сайта MyRusakov.ru. Таким образом, Вы увидите, как верстается
                    реальная страница. И, наконец, Вы узнаете, как адаптировать сайт под мобильные устройства:
                    смартфоны, планшеты и просто мобильные телефоны. Всё это так же на примере MyRusakov.ru. </p>
            </div>
            <div class="more"><a target="_blank"
                                 href="https://srs.myrusakov.ru/html5?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=html5">УЗНАТЬ
                    ПОДРОБНЕЕ</a></div>
        </div>
        <div class="slider_item">
            <img src="/web/images/courses/javascript.png" alt="JavaScript, jQuery и Ajax<br />с Нуля до Гуру"/>
            <div class="slider_content">
                <h3>JavaScript, jQuery и Ajax<br/>с Нуля до Гуру</h3>
                <p>Это практический курс, который содержит всё необходимое по языку JavaScript, библиотеке JQuery и
                    технологии Ajax.
                    В курсе Вы узнаете всё, что нужно знать для успешного программирования по JavaScript. Вы увидите
                    массу примеров создания популярных скриптов различной сложности. А ввиду большого количества
                    упражнений, идущих к курсу, Вы сможете сами научиться программировать на JavaScript. Помимо этого, к
                    курсу прилагаются несколько полезных бесплатных Бонусов.</p>
            </div>
            <div class="more"><a target="_blank"
                                 href="https://srs.myrusakov.ru/javascript?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=javascript">УЗНАТЬ
                    ПОДРОБНЕЕ</a></div>
        </div>
        <div class="slider_item">
            <img src="/web/images/courses/im.png" alt="Создание Интернет-магазина<br />на PHP и MySQL"/>
            <div class="slider_content">
                <h3>Создание Интернет-магазина<br/>на PHP и MySQL</h3>
                <p>Это уникальный курс по созданию Интернет-магазина с нуля. Создание идёт с самого начала, то есть от
                    идеи. Далее создаётся дизайн всех необходимых страниц, после делается их вёрстка. Затем создаётся
                    движок на PHP и MySQL, после делается Admin-панель и, наконец, готовый сайт размещается в Интернете.
                    Всё создание сайта будет происходить на Ваших глазах, поэтому Вы легко сможете повторить весь
                    процесс создания сложного функционального сайта уже при разработке своего портала. </p>
            </div>
            <div class="more"><a target="_blank"
                                 href="https://srs.myrusakov.ru/im?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=im">УЗНАТЬ
                    ПОДРОБНЕЕ</a></div>
        </div>
        <div class="slider_item">
            <img src="/web/images/courses/php.png" alt="PHP и MySQL<br />с Нуля до Гуру"/>
            <div class="slider_content">
                <h3>PHP и MySQL<br/>с Нуля до Гуру</h3>
                <p>Данный курс - это более 20-ти часов видеоуроков по изучению PHP и MySQL. Ключевой момент курса - это
                    создание движка для сайта с нуля. Каждая строчка комментируется. Практически для каждого урока
                    имеются упражнения. Причём данные упражнения направлены не только на закрепление материала, но и на
                    реализацию реальных задач, встающих перед Web-разработчиками при создании сайтов. После курса Вы
                    сможете без проблем создавать движки для любых сайтов.</p>
            </div>
            <div class="more"><a target="_blank"
                                 href="https://srs.myrusakov.ru/php?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=php">УЗНАТЬ
                    ПОДРОБНЕЕ</a></div>
        </div>
        <div class="slider_item">
            <img src="/web/images/courses/makeup.png" alt="Вёрстка<br />сайта с нуля"/>
            <div class="slider_content">
                <h3>Вёрстка<br/>сайта с нуля</h3>
                <p>Это уникальная информация по созданию страниц любой сложности. Вы узнаете всё, что нужно по HTML и
                    CSS, а также увидите множество примеров по вёрстке страниц. А также почти к каждому уроку идут
                    упражнения для закрепления материала, поэтому в отличном результате можете быть уверены! Пройдя
                    данный курс, Вы сможете верстать страницы с любым по сложности дизайном. Помимо курса, Вы получите
                    Бонус, который расскажет, как заработать на вёрстке сайтов.</p>
            </div>
            <div class="more"><a target="_blank"
                                 href="https://srs.myrusakov.ru/makeup?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=makeup">УЗНАТЬ
                    ПОДРОБНЕЕ</a></div>
        </div>
        <div class="slider_item">
            <img src="/web/images/courses/kurs.png" alt="Создание и Раскрутка<br />сайта от А до Я"/>
            <div class="slider_content">
                <h3>Создание и Раскрутка<br/>сайта от А до Я</h3>
                <p>Данный курс - это 246 видеоуроков общей продолжительностью более 50-ти часов по теме создания,
                    размещения в Интернете и раскрутке сайта. В уроке рассмотрены следующие необходимые любому
                    профессиональному Web-мастеру языки: HTML, CSS, JavaScript, PHP, SQL (с использованием MySQL) и XML.
                    Также в Видеокурсе "Создание и Раскрутка сайта от А до Я" показывается весь процесс создания и
                    раскрутки реального сайта - MyRusakov.ru. И, наконец, почти к каждому уроку идут упражнения.</p>
            </div>
            <div class="more"><a target="_blank"
                                 href="https://srs.myrusakov.ru/kurs?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=kurs">УЗНАТЬ
                    ПОДРОБНЕЕ</a></div>
        </div>
        <div class="clear"></div>
        <div id="bullets">
            <div class="active"></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <div id="left">
        <?= $content ?>
    </div>

    <div id="right">

        <?php if ($action == "index") { ?>
            <div id="author">
                <h4>Автор блога</h4>
                <img src="/web/images/author.png" alt="Михаил Русаков"/>
                <p>Михаил Русаков</p>
                <a target="_blank" href="https://vk.com/myrusakov">СТРАНИЦА АВТОРА</a>
            </div>
        <?php } else { ?>
            <h3>Другие записи</h3>
            <?php if ($action == "post") {
                $post_id = Yii::$app->getRequest()->getQueryParam('id');
            } else {
                $post_id = null;
            } ?>
            <?= PostOthers::widget(['id' => $post_id]) ?>
        <?php } ?>

        <div class="courses" id="courses">
            <div class="course">
                <h4>Создание и продвижение лендинга для начинающих</h4>
                <img src="/web/images/courses/freelanding.png" alt="Создание и продвижение лендинга для начинающих"/>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/freelanding?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=freelanding">ПОЛУЧИТЬ
                        БЕСПЛАТНО</a>
                </p>
            </div>
            <div class="course">
                <h4>Создание Интернет-магазина на OpenCart 2.0</h4>
                <img src="/web/images/courses/freeim2.png" alt="Создание Интернет-магазина на OpenCart 2.0"/>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/freeim2?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=freeim2">ПОЛУЧИТЬ
                        БЕСПЛАТНО</a>
                </p>
            </div>
            <div class="course">
                <h4>Пример создания сайта на фреймворке Yii 2.0</h4>
                <img src="/web/images/courses/freeyii.png" alt="Пример создания сайта на фреймворке Yii 2.0"/>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/freeyii?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=freeyii">ПОЛУЧИТЬ
                        БЕСПЛАТНО</a>
                </p>
            </div>
            <div class="course">
                <h4>Заработок на создании сайтов</h4>
                <img src="/web/images/courses/freefl.png" alt="Заработок на создании сайтов"/>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/freefl?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=freefl">ПОЛУЧИТЬ
                        БЕСПЛАТНО</a>
                </p>
            </div>
            <div class="course">
                <h4>Пример создания блога на WordPress</h4>
                <img src="/web/images/courses/freewp.png" alt="Пример создания блога на WordPress"/>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/freewp?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=freewp">ПОЛУЧИТЬ
                        БЕСПЛАТНО</a>
                </p>
            </div>
            <div class="course">
                <h4>HTML5 и CSS3 для начинающих</h4>
                <img src="/web/images/courses/freehtml5.png" alt="HTML5 и CSS3 для начинающих"/>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/freehtml5?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=freehtml5">ПОЛУЧИТЬ
                        БЕСПЛАТНО</a>
                </p>
            </div>
            <div class="course">
                <h4>Создание движка на PHP для начинающих</h4>
                <img src="/web/images/courses/freephp2.png" alt="Создание движка на PHP для начинающих"/>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/freephp2?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=freephp2">ПОЛУЧИТЬ
                        БЕСПЛАТНО</a>
                </p>
            </div>
            <div class="course">
                <h4>Видеокурс по основам JavaScript</h4>
                <img src="/web/images/courses/freejs.png" alt="Видеокурс по основам JavaScript"/>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/freejs?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=freejs">ПОЛУЧИТЬ
                        БЕСПЛАТНО</a>
                </p>
            </div>
            <div class="course">
                <h4>Создание сайта от начала и до конца</h4>
                <img src="/web/images/courses/book.png" alt="Создание сайта от начала и до конца"/>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/book?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=book">ПОЛУЧИТЬ
                        БЕСПЛАТНО</a>
                </p>
            </div>
            <div class="course">
                <h4>Создание Интернет-магазина с нуля</h4>
                <img src="/web/images/courses/freeim.png" alt="Создание Интернет-магазина с нуля"/>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/freeim?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=freeim">ПОЛУЧИТЬ
                        БЕСПЛАТНО</a>
                </p>
            </div>
            <div class="course">
                <h4>Мини-курс по вёрстке сайтов</h4>
                <img src="/web/images/courses/freemakeup.png" alt="Мини-курс по вёрстке сайтов"/>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/freemakeup?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=freemakeup">ПОЛУЧИТЬ
                        БЕСПЛАТНО</a>
                </p>
            </div>
            <div class="course">
                <h4>Видеокурс по основам PHP</h4>
                <img src="/web/images/courses/freephp.png" alt="Видеокурс по основам PHP"/>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/freephp?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=freephp">ПОЛУЧИТЬ
                        БЕСПЛАТНО</a>
                </p>
            </div>
            <div class="course">
                <h4>Видеокурс по основам HTML</h4>
                <img src="/web/images/courses/html.png" alt="Видеокурс по основам HTML"/>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/html?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=html">ПОЛУЧИТЬ
                        БЕСПЛАТНО</a>
                </p>
            </div>
            <div class="arrows">
                <div>
                    <div class="left">
                        <img src="/web/images/arrow_left.png" alt=""/>
                    </div>
                    <div>Бесплатные курсы</div>
                    <div class="right">
                        <img src="/web/images/arrow_right.png" alt=""/>
                    </div>
                </div>
            </div>
        </div>
        <div class="courses" id="online">
            <div class="course">
                <h4>Этапы создания и продвижения лендинга</h4>
                <img src="/web/images/online/landingsteps.png" alt="Этапы создания и продвижения лендинга"/>
                <p>После данного семинара:</p>
                <ul class="ul_mark">
                    <li>Вы увидите мои лендинги и их результаты.</li>
                    <li>Вы узнаете, какие этапы создания и продвижения у лендингов.</li>
                    <li>Вы получите 2 различных пошаговых бизнес-плана, основанных на создании лендингов.</li>
                    <li>Вы узнаете, как автоматизировать продвижение: создали лендинг, настроили продвижение, и годами
                        он работает уже без Вас.
                    </li>
                </ul>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/landingsteps?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=landingsteps">БЕСПЛАТНАЯ
                        ЗАПИСЬ</a>
                </p>
            </div>
            <div class="course">
                <h4>11 шагов к созданию своей Web-студии</h4>
                <img src="/web/images/online/11steps.png" alt="11 шагов к созданию своей Web-студии"/>
                <p>После данного семинара:</p>
                <ul class="ul_mark">
                    <li>Вы будете знать, какое главное отличие богатых от бедных.</li>
                    <li>Вы получите бесплатный подарок с Вашим финансовым планом и пошаговый чеклист для его
                        достижения.
                    </li>
                    <li>Вы узнаете множество моих личных историй про несколько моих бизнесов, в том числе, и
                        неудачных.
                    </li>
                    <li>Вы увидите прозрачную схему из 11-ти шагов к созданию своей успешной Web-студии.</li>
                </ul>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/11steps?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=11steps">БЕСПЛАТНАЯ
                        ЗАПИСЬ</a>
                </p>
            </div>
            <div class="course">
                <h4>Как создать профессиональный Интернет-магазин?</h4>
                <img src="/web/images/online/createim.png" alt="Как создать профессиональный Интернет-магазин?"/>
                <p>После данного семинара:</p>
                <ul class="ul_mark">
                    <li>Вы будете знать, как создать Интернет-магазин.</li>
                    <li>Вы получите бесплатный подарок с подробным описанием каждого шага.</li>
                    <li>Вы сможете уже приступить к созданию Интернет-магазина.</li>
                </ul>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/createim?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=createim">БЕСПЛАТНАЯ
                        ЗАПИСЬ</a>
                </p>
            </div>
            <div class="course">
                <h4>5 шагов и профессиональный сайт готов!</h4>
                <img src="/web/images/online/5steps.png" alt="5 шагов и профессиональный сайт готов!"/>
                <p>После данного семинара:</p>
                <ul class="ul_mark">
                    <li>Вы будете иметь чёткий план действий.</li>
                    <li>Вы сможете начать создавать сайт.</li>
                    <li>Вы сможете легко ориентироваться в информации по созданию сайтов.</li>
                </ul>
                <p class="more">
                    <a target="_blank"
                       href="https://srs.myrusakov.ru/5steps?utm_source=Blog.MyRusakov.ru&amp;utm_campaign=5steps">БЕСПЛАТНАЯ
                        ЗАПИСЬ</a>
                </p>
            </div>
            <div class="arrows">
                <div>
                    <div class="left">
                        <img src="/web/images/arrow_left.png" alt=""/>
                    </div>
                    <div>Бесплатные семинары</div>
                    <div class="right">
                        <img src="/web/images/arrow_right.png" alt=""/>
                    </div>
                </div>
            </div>
        </div>
        <div id="recommendations">
            <h4>Рекомендую</h4>
            <div>
                <a target="_blank" class="more" href="http://2domains.ru/">2DOMAINS.RU</a>
                <img src="/web/images/2domains.png" alt=""/>
                <p>Одно из лучших мест, где можно зарегистрировать на себя доменное имя. Цена .RU и .РФ всего 99 рублей.
                    Все домены покупаю только у них!</p>
            </div>
            <div>
                <a target="_blank" class="more" href="http://hostia.ru/billing/host.php?uid=11034">HOSTIA.RU</a>
                <img src="/web/images/hostia.png" alt=""/>
                <p>На мой взгляд, лучший хостинг в Рунете. Я перепробовал много их, то они были медленными, то
                    отключались часто, то была высокая цена. Hostia.ru - это отличная скорость, высокая надёжность и при
                    этом низкая цена (от 0.88$ в месяц).</p>
            </div>
        </div>


    </div>

    <div class="clear"></div>

</div>

<footer>
    <p>
        <img src="/web/images/logo_footer.png" alt=""/>
    </p>
    <p>
        <!--        <img id="footer_img" src="/web/images/logo_arrow.png" alt="" />-->
        <img src="/web/images/logo_arrow.png" alt=""/>
        <a href="/"><span>блог Михаила Русакова</span></a>
    </p>
    <ul class="menu">
        <li>
<!--            <a href="/author.html">Об авторе</a>-->
            <a href="<?= Yii::$app->urlManager->createUrl(["site/author"]) ?>" <?php if ($action == "author") { ?>class="active" <?php } ?> >Об авторе</a>
        </li>
        <li>
<!--            <a href="/courses.html">Видеокурсы</a>-->
            <a href="<?= Yii::$app->urlManager->createUrl(["site/video"]) ?>" <?php if ($action == "video") { ?>class="active" <?php } ?> >Видеокурсы</a>
        </li>
        <li>
<!--            <a href="/reviews.html">Отзывы</a>-->
            <a href="<?= Yii::$app->urlManager->createUrl(["site/rev"]) ?>"  <?php if ($action == "rev") { ?>class="active" <?php } ?> >Отзывы</a>
        </li>
        <li>
<!--            <a href="/subscribe.html">Выпуски рассылки</a>-->
            <a href="<?= Yii::$app->urlManager->createUrl(["site/releases"]) ?>"  <?php if ($action == "releases") { ?>class="active" <?php } ?>">Выпуски рассылки</a>
        </li>
        <li>
<!--            <a target="_blank" href="https://myrusakov.ru">Мой сайт</a>-->
            <a target="_blank" href="<?= Yii::$app->urlManager->createUrl(["site/index"]) ?>" <?php if ($action == "index") { ?>class="active" <?php } ?> >Мой сайт</a>
        </li>
        <li>
<!--            <a href="/sites.html">Сайты учеников</a>-->
            <a href="<?= Yii::$app->urlManager->createUrl(["site/sites"]) ?>"  <?php if ($action == "sites") { ?>class="active" <?php } ?> >Сайты учеников</a>
        </li>
    </ul>

    <div class="clear"></div>

    <div id="copy">
        <p>&copy; Blog.MyRusakov.ru <?= date("Y") ?> г.</p>
        <p>ВСЕ ПРАВА ЗАЩИЩЕНЫ.</p>
    </div>

</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

	