<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>
    <!--<title><?=$this->title?></title>*}-->
        <title><?php echo $this->title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="<?=$this->meta_desc?>" />
        <meta name="keywords" content="<?=$this->meta_key?>" />
        <link type="text/css" rel="stylesheet" href="styles/main.css" />
        <!-- [if IE 8]
            <link type="text/css" rel="stylesheet" href="styles/ie8.css" />
        [endif] -->
    <script type="text/javascript" src="js/functions.js"></script>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>

<body>



<div id="container">
    <div id="banner_bird">
        <a href="http://rich-birds.org/?i=1834041" target=_blank><img src="http://rich-birds.com/img/banners/brsl_728x90_03.gif" alt="Заработай на своих яйцах!"></a>
    </div>

    <div id="header">

        <img src="images/section_s.png" alt="Шапка" />



        <div>
            <p class="red">8-800-123-45-67</p>
            <p class="blue">Время работы с 09:00 до 21:00<br />без перерыва и выходных</p>
        </div>



        <div class="cart">
            <!-- <a class="cart_title">Корзина</a> -->

            <p class="cart_title">Корзина</p>
            <p class="blue">Текущий заказ</p>
            <p>В корзине <span><?=$this->cart_count?></span> <?=$this->cart_word?><br />на сумму <span><?=$this->cart_summa?></span> грн</p>
            <img src="images/shopping-cart.png" alt="Корзина" align="right" />
            <a href="<?=$this->cart_link?>">Перейти в корзину</a>

        </div>	<!-- cart -->

        <div id="video">
            <iframe src="https://www.youtube.com/embed/6BUMoSlREV8" frameborder="0" allowfullscreen></iframe>
        </div>

    </div> <!-- header -->

    <div id="topmenu">
        <ul>
            <li>
                <a class="chose" href="<?=$this->index?>">ГЛАВНАЯ</a>
            </li>
            <li>
                <a class="razdelitel">|</a>
                <!-- <img src="images/section_bg.png" alt="Разделитель" /> -->
            </li>
            <li>
                <a class="chose" href="<?=$this->link_delivery?>">ОПЛАТА И ДОСТАВКА</a>
            </li>
            <li>
                <a class="razdelitel">|</a>
                <!-- <img src="images/section_bg.png" alt="Разделитель" /> -->
            </li>
            <li>
                <a class="chose" href="<?=$this->link_contacts?>">КОНТАКТЫ</a>
            </li>
            <li>
                <a class="razdelitel">|</a>
                <!-- <img src="images/section_bg.png" alt="Разделитель" /> -->
            </li>
        </ul>
        <div id="search">
            <form name="search" action="<?=$this->link_search?>" method="get">
                <table>
                    <tr>
                        <td class="input_left"></td>
                        <td>
                            <input type="text" name="q" value="поиск" onfocus="if(this.value == 'поиск') this.value = ''" onblur="if(this.value == '') this.value = 'поиск'"/>
                        </td>
                        <td class="input_right"></td>
                    </tr>
                </table>
            </form>
        </div> <!-- search -->
    </div> <!-- topmenu -->
    <div id="content">
        <div id="left">
            <div id="menu">
                <div class="header">
                    <h3>Разделы</h3>
                </div> <!-- header -->
                <div id="items">

                    <?php for($i = 0; $i < count($this->items); $i++) { ?>

                        <p <?php if($i + 1 == count($this->items)) {?> class="last" <?php }?>>
                             <a href="<?php echo $this->items[$i]['link']?>"><?php echo $this->items[$i]["title"]?></a>
                        </p>

                    <?php } ?>

                </div> <!-- items -->

                <div class="bottom">

                </div> <!-- bottom -->

            </div> <!-- menu -->

            <div id="banners_mycashbar">
                <a href="http://www.mycashbar.com/?id=20591" target="_blank"><img src="http://www.mycashbar.com/300x250.gif" border=0  ></a>
            </div>



        </div> <!-- left -->

        <div id="right">

            <?php include "content_".$this->content.".tpl"; ?>

        </div> <!-- right -->

        <div class="clear">

        </div>



        <div id="footer">
            <div id="pm">
                <table>
                    <tr>
                        <td>Способы оплаты:</td>
                        <td>
                            <img src="images/american-express-curved-32px.png" alt="Способы оплаты">
                        </td>
                        <td>
                            <img src="images/mastercard-straight-32px.png" alt="Способы оплаты">
                        </td>
                        <td>
                            <img src="images/visa-electron-curved-32px.png" alt="Способы оплаты">
                        </td>
                        <td>
                            <img src="images/western-union-curved-32px.png" alt="Способы оплаты">
                        </td>
                        <td>
                            <img src="images/switch-curved-32px.png" alt="Способы оплаты">
                        </td>
                    </tr>
                </table>
            </div>	<!-- pm -->


            <div id="copy">
                <p class="label_footer">Copyright &copy; Site.ru. Все права защищены.</p>
                <p class="counter">
                    <!-- <img src="images/footer.png" alt="футер"> -->
                    <img src="images/counter.png" alt="Счетчик">
                </p>
            </div>

        </div> <!-- footer -->

    </div> <!-- content -->

</div> <!-- container -->

</body>

</html>