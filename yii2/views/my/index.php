
<h1>Action index</h1>

<h2>ID = <?=$id?></h2>

<br>

<h2><?=$hello?></h2>

<br>

<?php print_r($names) ?>

<?php foreach ($names as $key => $value) { ?>
    
    <h3><?php echo $value ?></h3>
    
    <br>
<?php } ?>

<?php foreach ($cars as $car) { ?>

    <h3><?php echo $car ?></h3>

    <br>
<?php } ?>