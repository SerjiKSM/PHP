
<?php include ROOT . '/views/layouts/header.php';?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Каталог</h2>
					<div class="panel-group category-products">
						<?php foreach ($categories as $categoryItem): ?>
							<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a href="/category/<?php echo $categoryItem['id']; ?>">
											<?php echo $categoryItem['name']; ?>
										</a>
								</h4>
							</div>
						</div>
						<?php endforeach; ?>
					</div>

				</div>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items">
					<!--features_items-->
					<h2 class="title text-center">Товары корзины</h2>
			
					<?php if ($productsInCart):?>	
						<p>Вы выбрали такие товары:</p>
						<table class="table table-bordered">
	
							<tr>
								<th>Код</th>
								<th>Товар</th>
								<th>Количество</th>
								<th>Цена</th>
								<th>Сумма</th>
								<th>Удалить</th>
							</tr>
								
							<?php foreach ($products as $product):?>	
								<tr class="success">
									<td><?php echo $product['code']; ?></td>
									<td><a href="/product/<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
									</td>
									
									<td>										
										<!-- 
										<input type="text" value="<?php echo $productsInCart[$product['id']]; ?>" id="amount_<?php echo $product['id']; ?>" onchange="calculateAmount(<?php echo $product['id']; ?>);" />
										 -->
										<input type="text" value="<?php echo $productsInCart[$product['id']]; ?>" id="amount_<?php echo $product['id']; ?>" onchange="calculateAmount(<?php echo $product['id']; ?>);" />										 									
									</td>
									
									<td>
										<span id="itemPrice_<?php echo $product['id']; ?>" value="<?php echo $product['price']; ?>">
											<?php echo $product['price']; ?>
										</span>	
									</td>
									<td class="sum">										
										<span                 id="itemRealPrice_<?php echo $product['id']; ?>">
											<?php echo $product['price'] * $productsInCart[$product['id']]; ?>
										</span>
									</td>  
									<td>
                                        <a class="btn btn-default checkout" href="/cart/delete/<?php echo $product['id'];?>">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
								</tr>
							<?php endforeach;?>
								<tr>
									<td colspan="4">Общая стоимость:</td>
									<td id="itemtotalPrice">
										<span id="itemtotalPrice_<?php echo $product['id']; ?>">
											<?php echo $totalPrice; ?>
										</span>		
									</td>	
								</tr>	
								
						</table>
						
						<a class="btn btn-default checkout" href="/cart/checkout"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
					<?php else: ?>
						<p>Корзина пуста!</p>
						
						<a class="btn btn-default checkout" href="/"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a>
					<?php endif;?>
				</div>
				
			</div>
		</div>
	</div>
</section>

<?php include ROOT . '/views/layouts/footer.php';?>