<?php

class Model {
	//последние товары
	public static function Rosebud_main(){
		// $sql = "SELECT products.*, users.* from `products`, `users` WHERE `products`.sellerId = `users`.idUser  ORDER BY `products`.`idProduct` DESC limit 20";
		$sql = "select products.idProduct, products.name, products.sellerId, products.img, products.price, users.idUser, users.username 
				from products, users 
				where products.sellerId = users.idUser 
				and idProduct not in (select orders.productId from orders) 
				union
				select products.idProduct, products.name, products.sellerId, products.img, products.price, users.idUser, users.username 
				from products, users, orders 
				where orders.productId = products.idProduct 
				and products.sellerId = users.idUser 
				and orders.booked = 0
				order by idProduct DESC limit 20";
		$database = new database();
		$rows = $database->getAll($sql);
		return $rows;
	}
	//список категорий
	public static function getCategoryList(){
		$sql = "SELECT `product_categories`.* from product_categories";		
		$database = new database();
		$rows = $database -> getAll($sql);
		return $rows;
	}
	//товары по ид категории для главной 
	public static function getProductsByCategoryMain(){
		// $sql = "SELECT `products`.* from products";
		// $sql = "SELECT products.*, users.*, product_categories.`idCategory` from `products`, `users`, product_categories WHERE `products`.sellerId = `users`.idUser and products.`categoryId` = product_categories.`idCategory`  ORDER BY `products`.`idProduct` DESC"; //limit 6 не работает, выводит все товары
		
		//работает неправильно
		$sql ="select products.idProduct, products.name, products.sellerId, products.img, products.price, products.categoryId, users.idUser, users.username
			from products, users, product_categories 
			where products.sellerId = users.idUser 
			and idProduct not in (select orders.productId from orders) 
			and products.`categoryId` = product_categories.`idCategory` 
			union 
			select products.idProduct, products.name, products.sellerId, products.img, products.price, products.categoryId, users.idUser, users.username
			from products, users, orders, product_categories 
			where orders.productId = products.idProduct 
			and products.sellerId = users.idUser 
			and orders.booked = 0 
			and products.`categoryId` = product_categories.`idCategory` 
			order by idProduct DESC";
		$database = new database();
		$rows = $database -> getAll($sql);
		return $rows;
	}


	//список всех товаров
	public static function getProductsList(){
		// $sql = "SELECT products.*, users.* from users, products where `products`.categoryId = `product_categories`.idCategory and `products`.sellerId = `users`.idUser order by `products`.idProduct desc;";
		$sql = "select products.idProduct, products.name, products.sellerId, products.img, products.price, users.idUser, users.username 
				from products, users 
				where products.sellerId = users.idUser 
				and idProduct not in (select orders.productId from orders) 
				union
				select products.idProduct, products.name, products.sellerId, products.img, products.price, users.idUser, users.username 
				from products, users, orders 
				where orders.productId = products.idProduct 
				and products.sellerId = users.idUser 
				and orders.booked = 0
				order by idProduct DESC";
		$database = new database();
		$rows = $database -> getAll($sql);
		return $rows;
	}
	//одна категория по ид
	public static function getCategoryDetail($id){
		$sql = "SELECT * FROM `product_categories` WHERE `idCategory`=".$id;
		$database = new database();
		$row = $database->getOne($sql);
		return $row;
	}
	// //товары одной категории
	public static function getProductsByCategory($id){
		// $start = 0;  $per_page = 4;
	 //    $page_counter = 0;
	 //    $next = $page_counter + 1;
	 //    $previous = $page_counter - 1;
		// if(isset($_GET['page'])){
		//     $page = $_GET['page'];
		//     $page_counter =  $_GET['page'];
		//     $start = $start *  16;
		//     $next = $page_counter + 1;
		//     $previous = $page_counter - 1;
		// }
		// $sql = "SELECT products.*, users.* FROM `products`, product_categories, users WHERE `products`.categoryId =`product_categories`.idCategory AND `products`.categoryId=".$id." AND `products`.sellerId = `users`.idUser ORDER BY products.idProduct DESC limit ".$start .", 16";

		// $sql = "SELECT products.*, users.* FROM `products`, product_categories, users WHERE `products`.categoryId =`product_categories`.idCategory AND `products`.categoryId=".$id." AND `products`.sellerId = `users`.idUser ORDER BY products.idProduct DESC";

		$sql ="select products.idProduct, products.name, products.sellerId, products.img, products.price, products.categoryId, users.idUser, users.username
			from products, users, product_categories 
			where products.sellerId = users.idUser 
			and idProduct not in (select orders.productId from orders) 
			and products.`categoryId` = ".$id."
			union 
			select products.idProduct, products.name, products.sellerId, products.img, products.price, products.categoryId, users.idUser, users.username
			from products, users, orders, product_categories 
			where orders.productId = products.idProduct 
			and products.sellerId = users.idUser 
			and orders.booked = 0 
			and products.`categoryId` = ".$id." 
			order by idProduct DESC";
		$database = new database();
	 	$rows = $database -> getAll($sql);
	 	return $rows;
	}
	
	//search
	public static function getSearch($text){
		//$sql = "SELECT products.*, `product_categories`.*, users.* from products, product_categories, users where `products`.categoryId =`product_categories`.idCategory and `products`.sellerId = `users`.idUser and `products`.name like '%".$text."%' order by `products`.idProduct desc";
		$sql="SELECT products.idProduct, products.name, products.sellerId, products.img, products.price, products.categoryId, users.idUser, users.username 
		from products, users, product_categories 
		where products.sellerId = users.idUser 
		and idProduct not in (select orders.productId from orders) 
		and products.name like '%".$text."%' 
		union 
		SELECT products.idProduct, products.name, products.sellerId, products.img, products.price, products.categoryId, users.idUser, users.username 
		from products, users, orders, product_categories  
		where orders.productId = products.idProduct  
		and products.sellerId = users.idUser  
		and orders.booked = 0  
		and products.name like '%".$text."%' 
		order by idProduct DESC";
		$database = new database();
		$rows = $database ->getAll($sql);
		return $rows;
	}

	public static function filterResult($text, $categoryId, $minPrice, $maxPrice){
		// $sql = "SELECT products.`idProduct`, products.`name`, products.`sellerId`, products.`img`, products.`price`, users.`idUser`, users.`username`
		// 	from products, users
		// 	where products.`sellerId` = users.`idUser`";
		// if($text !=""){
		// 	$sql .= " AND products.`name` LIKE '%".$text."%'";
		// }
		// if($categoryId>0){
		// 	$sql .= " AND products.`categoryId`=".$categoryId;
		// }
		// if($minPrice!="" && $minPrice>0){
		// 	$sql .= " AND products.price >= ".$minPrice;
		// }
		// if($maxPrice!="" && $maxPrice>0){
		// 	$sql .= " AND products.price <= ".$maxPrice;
		// }

		$query = "";
		if($text !=""){
			$query .= " AND products.`name` LIKE '%".$text."%'";
		}
		if($categoryId>0){
			$query .= " AND products.`categoryId`=".$categoryId;
		}
		if($minPrice!="" && $minPrice>0){
			$query .= " AND products.price >= ".$minPrice;
		}
		if($maxPrice!="" && $maxPrice>0){
			$query .= " AND products.price <= ".$maxPrice;
		}
		$sql = "SELECT products.idProduct, products.name, products.sellerId, products.img, products.price, users.idUser, users.username 
		from products, users 
		where products.sellerId = users.idUser 
		and idProduct not in (select orders.productId from orders) ";
		$sql .= $query;
		$sql .= " union
		select products.idProduct, products.name, products.sellerId, products.img, products.price, users.idUser, users.username 
		from products, users, orders 
		where orders.productId = products.idProduct 
		and products.sellerId = users.idUser and orders.booked = 0 ";
		$sql .= $query;
		$database= new database();
		$rows = $database->getAll($sql);
		return $rows;
	}


	//описание товара
	public static function getProductDetail($id){
		$sql = "SELECT products.*, `product_categories`.*, users.* FROM `products`, product_categories, users WHERE
			`products`.categoryId=`product_categories`.idCategory AND `products`.sellerId=`users`.idUser AND products.`idProduct`=".$id;
		$database= new database();
		$row = $database->getOne($sql);
		return $row;
		}

	public static function isProductAvailable($id){
		$sql = "SELECT orders.*, products.* from orders, products where orders.`productId` = $id";
		$database= new database();
		$row = $database->getOne($sql);
		return $row;
	}	

	//вывод товаров той же категории, нужно взять категорию товара	
	// public static function getRelatedProducts($id){
	// 	// $sql = "SELECT products.*, users.*, product_categories.* FROM `products`, users, product_categories WHERE `products`.categoryId = ".$id['categoryId']." AND `products`.sellerId=`users`.idUser ORDER BY products.idProduct DESC limit 5 ";
	// 	$sql = "SELECT products.*, users.*, product_categories.* FROM `products`, users, product_categories WHERE `products`.categoryId = ".$id['categoryId']."  ORDER BY products.idProduct DESC limit 5 ";//AND `products`.sellerId=`users`.idUser
	// 	$database = new database();
	// 	$related = $database->getAll($sql);
	// 	return $related;
	// }


	public static function getUserDetail($id){
		$sql = "SELECT users. *, products.* from users, products WHERE users.`idUser` =".$id;
		$database = new database();
		$row = $database->getOne($sql);
		return $row;
	}
	public static function getUsersProducts($id){
		$sql = "SELECT products.*, users.* from products, users where `products`.sellerId = `users`.idUser And `products`.sellerId =".$id." order by `products`.idProduct DESC";
		$sql = "select products.idProduct, products.name, products.sellerId, products.img, products.price, products.categoryId, users.idUser, users.username 
			from products, users
			where products.sellerId = users.idUser 
			and `products`.sellerId =".$id."
			and idProduct not in (select orders.productId from orders) 
			union 
			select products.idProduct, products.name, products.sellerId, products.img, products.price, products.categoryId, users.idUser, users.username 
			from products, users, orders
			where orders.productId = products.idProduct 
			and products.sellerId = users.idUser 
			and orders.booked = 0 
			and `products`.sellerId =".$id."
			order by idProduct DESC";
		$database = new database();
		$products = $database->getAll($sql);
		return $products;
	}
	// public static function getReviews($id){
	// 	$sql = "SELECT seller_reviews.*, users.* from seller_reviews, users WHERE `seller_reviews`.userId=users.`idUser` and seller_reviews.`sellerId` =".$id." ORDER BY `seller_reviews`.date DESC";
	// 	$database = new database();
	// 	$reviews = $database ->getAll($sql);
	// 	return $reviews;
	// }



}
?>