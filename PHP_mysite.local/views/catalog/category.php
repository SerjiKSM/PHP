
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
										<a href="/category/<?php echo $categoryItem['id']; ?>" 
											class="<?php if($categoryId == $categoryItem['id']) echo 'active'; ?>">
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
					<h2 class="title text-center">Последние товары</h2>
					<?php foreach ($categoryProducts as $productItem): ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
																				
										<!-- <img src="/template/images/home/product1.jpg" alt="" /> -->
										<img src="<?php echo Product::getImage($productItem['id']); ?>" alt="" />
										
										<h2><?php echo $productItem['price']; ?> грн.</h2>
										<p>
											<a href="/product/<?php echo $productItem['id']; ?>">
												<?php echo $productItem['name']; ?>
											</a>
										</p>
											<!--<a href="/cart/add/<?php echo $productItem['id']; ?>" class="btn btn-default add-to-cart" data-id="<?php echo $productItem['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a> -->
											<a href="" class="btn btn-default add-to-cart" data-id="<?php echo $productItem['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
									</div>
									<?php if ($productItem['is_new']): ?>
										<img alt="" class="new" src="/template/images/home/new.png" />
									<?php endif;?>	
								</div>
							</div>
						</div>
					<?php endforeach;?>
					
					<div id="nav">
						<!-- Постраничная навигация -->
	                    <?php echo $pagination->get(); ?>
					</div>
					
				</div><!--features_items-->
				
			</div>
		</div>
	</div>
</section>

<?php include ROOT . '/views/layouts/footer.php';?>

