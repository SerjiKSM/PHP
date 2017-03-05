<div id="cart">
    <h2>Корзина</h2>
    <form name="cart" action="<?=$this->action?>" method="post">
        <table>
            <!-- <tr>
                <td colspan="8" id="cart_top"></td>
            </tr> -->

            <tr>
                <!-- <td class="cart_left"></td> -->
                <td colspan="2">Товар</td>
                <td>Цена за 1 шт.</td>
                <td>Количество</td>
                <td>Стоимость</td>
                <td></td>
                <!-- <td class="cart_right"></td> -->
            </tr>
            <tr>
                <!-- <td class="cart_left"></td> -->
                <td colspan="6">
                    <hr />
                </td>
                <!-- <td class="cart_right"></td> -->
            </tr>

            <?php for($i = 0; $i < count($this->cart); $i++) { ?>
                <tr class="cart_row">
                    <!-- <td class="cart_left"></td> -->
                    <td class="img">
                        <img src="<?=$this->cart[$i]['img']?>" alt="<?=$this->cart[$i]['title']?>" />
                    </td>
                    <td class="title"><?=$this->cart[$i]['title']?></td>
                    <td class="bold"><?=$this->cart[$i]['price']?> ргн.</td>
                   <!-- <td>
                        <table class="count">
                            <tr> -->
                                <td>
                                    <input type="text" name="count_<?=$this->cart[$i]['id']?>" value="<?=$this->cart[$i]['count']?>" /> шт.
                                </td>
                    <!--     <td>шт.</td>
                   </tr>
                </table>
            </td>-->
                    <td class="bold"><?=$this->cart[$i]['summa']?></td>
                    <td>
                        <a href="<?=$this->cart[$i]['link_delete']?>" class="link_delete">x удалить</a>
                    </td>
                    <!-- <td class="cart_right"></td> -->
                </tr>

                <?php if ($i + 1 != count($this->cart)) { ?>
                    <tr>
                        <!-- <td class="cart_left"></td> -->
                        <td class="cart_border" colspan="6">
                            <hr />
                        </td>
                        <!-- <td class="cart_right"></td> -->
                    </tr>
                <?php } ?>

            <?php } ?>



            <tr id="discount">
                <!-- <td class="cart_left"></td> -->
                <td class="" colspan="6">
                   <!-- <form name="discount" action="#" method="post"> -->
                        <table>
                            <tr>
                                <td>Введите номер купона со скудкой<br /><span>(если есть)</span></td>
                                <td>
                                    <input type="text" name="discount" value="<?=$this->discount?>"/>
                                </td>
                                <td class="submit_get_discount">
                                    <!-- <input type="image" src="images/add2cart_blue_ru.gif" alt="Получить скидку" onmouseover="this.src='images/add2cart_red_ru.gif'" onmouseout="this.src='images/add2cart_blue_ru.gif'" /> -->

                                    <input type="submit" value="Получить скидку">
                                </td>
                            </tr>
                        </table>
                   <!-- </form> -->
                </td>

                <!-- <td class="cart_right"></td> -->
            </tr>

            <tr id="summa">
                <td class="cart_left"></td>
                <td class="" colspan="6">
                    <p>Итого <?php if($this->discount) { ?> (с учетом скидки)<?php } ?>: <span><?=$this->summa?> грн.</span></p>
                </td>
                <td class="cart_right"></td>
            </tr>

            <tr>
                <td class="cart_left"></td>
                <td class="left" colspan="2">
                    <!-- <form name="recalc" action="#" method="post" >-->
                        <p><input type="submit" value="Пересчитать"></p>
                    <!-- </form>-->
                </td>

                <td  colspan="4">
                    <!-- <form name="recalc" action="#" method="post" >-->
                      <input type="hidden" name="func" value="cart" />
                    <!--  <p> -->
                    <!--  <input type="submit" value="Оформить заказ" class="right"> -->
                    <!--  </p> -->

                     <a href="<?=$this->link_order?>">
                         <img src="/images/buttonorder.png" alt="Оформить заказ" onmousemove="this.src='/images/buttonorderclick.png'" onmouseout="this.src='/images/buttonorder.png'">
                     </a>

                  <!-- </form>-->
                </td>
                <td class="cart_right"></td>
            </tr>
            <tr>
                <td colspan="8" id="cart_bottom"></td>
            </tr>
        </table>
    </form>
</div>