
<!--for test pagination-->
<!--<?php include "pagination.tpl"; ?>-->

<h3>Статистика за последние 7 дней</h3>
<h3>Результат</h3>
<table class="info">
    <tr class="header">
        <td>Количество заказов</td>
        <td>Счетов на сумму</td>
        <td>Доход</td>
        <td>Купленных DVD</td>
    </tr>
    <tr>
        <td><?=$this->result["count_orders"]?></td>
        <td><?=$this->result["summa_account"]?>  грн.</td>
        <td><?=$this->result["income"]?> грн.</td>
        <td><?=$this->result["count_dvd"]?></td>
    </tr>
</table>