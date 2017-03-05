<?php

/**
 * @author Serhio
 *
 */
class Product {
	
	const SHOW_BY_DEFAULT = 3;
	
	/**
	 * Rerurns an array of products
	 */
	public static function getLatestProducts($count = self::SHOW_BY_DEFAULT){
		
		$count = intval($count);
		
		$db = Db::getConnection();
		
		$productsList = array();
		
		$result = $db->query('SELECT id, name, price, image, is_new FROM product '
				. 'WHERE status = "1"'
				. 'ORDER BY id DESC ' 
				. 'LIMIT ' . $count);
		
		$i = 0;
		while ($row = $result->fetch()){
			$productsList[$i]['id'] = $row['id'];
			$productsList[$i]['name'] = $row['name'];
			$productsList[$i]['image'] = $row['image'];
			$productsList[$i]['price'] = $row['price'];
			$productsList[$i]['is_new'] = $row['is_new'];
			$i++;
		}
		
		return $productsList;
		
	}
	
	/**
	 * Rerurns an array of products by category
	 */
	public static function getProductsListByCategory($idCategory = false, $page = 1){
	
		$idCategory = intval($idCategory);
	
		if($idCategory){
			
			$page = intval($page);
			$offset = ($page - 1) * self::SHOW_BY_DEFAULT;
						
			$db = Db::getConnection();
			
			$products = array();
				
			$result = $db->query("SELECT id, name, price, image, is_new FROM product "
					. "WHERE status = '1' AND category_id = '$idCategory' "
					. "ORDER BY id DESC "
					. "LIMIT ".self::SHOW_BY_DEFAULT
					. ' OFFSET '.$offset);
				
			$i = 0;
			while ($row = $result->fetch()){
				$products[$i]['id'] = $row['id'];
				$products[$i]['name'] = $row['name'];
				$products[$i]['image'] = $row['image'];
				$products[$i]['price'] = $row['price'];
				$products[$i]['is_new'] = $row['is_new'];
				$i++;
			}			
			
			return $products;
			
		}
				
	}

	/**
	 * return product
	 *  
	 * @param unknown $id
	 */
	public static function getProductById($id){
		
		$id = intval($id);
		
		if($id){
			$db = Db::getConnection();
			
			$products = array();
			
			$result = $db->query("SELECT * FROM product WHERE id = '$id'");
			
			$result->setFetchMode(PDO::FETCH_ASSOC);
					
			return $result->fetch();
				
		}
		
	}
	
// 	/**
// 	 * Rerurns an count category
// 	 */
// 	public static function getCountCategory($idCategory = false){
	
// 		$idCategory = intval($idCategory);
	
// 		if($idCategory){
			
// 			$db = Db::getConnection();
				
// 			$result = $db->query("SELECT COUNT(*) FROM product "
// 					. "WHERE status = '1' AND category_id = '$idCategory' "	);
				
// 			return ceil($result->fetch()[0] / self::SHOW_BY_DEFAULT);
				
// 		}
	
// 	}

	
	/**
	 * Returns total products
	 */
	public static function getTotalProductsInCategory($categoryId){
		$db = Db::getConnection();
	
		$result = $db->query('SELECT count(id) AS count FROM product '
				. 'WHERE status="1" AND category_id ="'.$categoryId.'"');
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$row = $result->fetch();
	
		return $row['count'];
	}
	
	/**
	 * get products by list id
	 * 
	 * @param unknown $productsIds
	 */
	public static function getProductsByIds($idsArray){
		
		$db = Db::getConnection();
		
		$idsString = (implode(',', $idsArray));
		
		$sql = "SELECT id, name, code, price FROM product WHERE status = '1' AND id IN ($idsString) ";
		
		$result = $db->query($sql);
		
		$result->setFetchMode(PDO::FETCH_ASSOC);
		
		$i = 0;
		$products = array();
		while ($row = $result->fetch()){
			$products[$i]['id'] = $row['id'];
			$products[$i]['name'] = $row['name'];
			$products[$i]['code'] = $row['code'];
			$products[$i]['price'] = $row['price'];
		
			$i++;
		}
				
		return $products;
		
	}
	
	public static function getRecommendedProducts(){
		$db = Db::getConnection();

        $productsList = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM product '
                . 'WHERE status = "1" AND is_recommended = "1"'
                . 'ORDER BY id DESC ');

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
	}
	
	/**
	 * Возвращает путь к изображению
	 * @param integer $id
	 * @return string <p>Путь к изображению</p>
	 */
	public static function getImage($id)
	{
		// Название изображения-пустышки
		$noImage = 'no-image.jpg';
		// Путь к папке с товарами
		$path = '/upload/images/products/';
		// Путь к изображению товара
		$pathToProductImage = $path . $id . '.jpg';
		if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
			// Если изображение для товара существует
			// Возвращаем путь изображения товара
			return $pathToProductImage;
		}
		// Возвращаем путь изображения-пустышки
		return $path . $noImage;
	}
	
	/**
	 * Возвращает список товаров
	 * @return array <p>Массив с товарами</p>
	 */
	public static function getProductsList()
	{
		// Соединение с БД
		$db = Db::getConnection();
		// Получение и возврат результатов
		$result = $db->query('SELECT id, name, price, code FROM product ORDER BY id ASC');
		$productsList = array();
		$i = 0;
		while ($row = $result->fetch()) {
			$productsList[$i]['id'] = $row['id'];
			$productsList[$i]['name'] = $row['name'];
			$productsList[$i]['code'] = $row['code'];
			$productsList[$i]['price'] = $row['price'];
			$i++;
		}
		return $productsList;
	}
	
	/**
	 * Удаляет товар с указанным id
	 * @param integer $id <p>id товара</p>
	 * @return boolean <p>Результат выполнения метода</p>
	 */
	public static function deleteProductById($id)
	{
		// Соединение с БД
		$db = Db::getConnection();
		// Текст запроса к БД
		$sql = 'DELETE FROM product WHERE id = :id';
		// Получение и возврат результатов. Используется подготовленный запрос
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		return $result->execute();
	}
	
	/**
	 * Редактирует товар с заданным id
	 * @param integer $id <p>id товара</p>
	 * @param array $options <p>Массив с информацей о товаре</p>
	 * @return boolean <p>Результат выполнения метода</p>
	 */
	public static function updateProductById($id, $options)
	{
		// Соединение с БД
		$db = Db::getConnection();
		// Текст запроса к БД
		$sql = "UPDATE product
            SET
                name = :name,
                code = :code,
                price = :price,
                category_id = :category_id,
                brand = :brand,
                availability = :availability,
                description = :description,
                is_new = :is_new,
                is_recommended = :is_recommended,
                status = :status
            WHERE id = :id";
		// Получение и возврат результатов. Используется подготовленный запрос
		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->bindParam(':name', $options['name'], PDO::PARAM_STR);
		$result->bindParam(':code', $options['code'], PDO::PARAM_STR);
		$result->bindParam(':price', $options['price'], PDO::PARAM_STR);
		$result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
		$result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
		$result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
		$result->bindParam(':description', $options['description'], PDO::PARAM_STR);
		$result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
		$result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
		$result->bindParam(':status', $options['status'], PDO::PARAM_INT);
		return $result->execute();
	}
	/**
	 * Добавляет новый товар
	 * @param array $options <p>Массив с информацией о товаре</p>
	 * @return integer <p>id добавленной в таблицу записи</p>
	 */
	public static function createProduct($options)
	{
		// Соединение с БД
		$db = Db::getConnection();
		// Текст запроса к БД
		$sql = 'INSERT INTO product '
				. '(name, code, price, category_id, brand, availability,'
						. 'description, is_new, is_recommended, status)'
								. 'VALUES '
										. '(:name, :code, :price, :category_id, :brand, :availability,'
												. ':description, :is_new, :is_recommended, :status)';
												// Получение и возврат результатов. Используется подготовленный запрос
												$result = $db->prepare($sql);
												$result->bindParam(':name', $options['name'], PDO::PARAM_STR);
												$result->bindParam(':code', $options['code'], PDO::PARAM_STR);
												$result->bindParam(':price', $options['price'], PDO::PARAM_STR);
												$result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
												$result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
												$result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
												$result->bindParam(':description', $options['description'], PDO::PARAM_STR);
												$result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
												$result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
												$result->bindParam(':status', $options['status'], PDO::PARAM_INT);
												if ($result->execute()) {
													// Если запрос выполенен успешно, возвращаем id добавленной записи
													return $db->lastInsertId();
												}
												// Иначе возвращаем 0
												return 0;
	}
	
	/**
	 * Возвращает текстовое пояснение наличия товара:<br/>
	 * <i>0 - Под заказ, 1 - В наличии</i>
	 * @param integer $availability <p>Статус</p>
	 * @return string <p>Текстовое пояснение</p>
	 */
	public static function getAvailabilityText($availability)
	{
		switch ($availability) {
			case '1':
				return 'В наличии';
				break;
			case '0':
				return 'Под заказ';
				break;
		}
	}
	
}









