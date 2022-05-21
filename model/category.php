<?php
class Category{
	

    public static function getMainCategories() {
        $query = "SELECT * FROM `product_categories`" ;
        $db = new Database();
        $categories = $db->getAll($query);
        return $categories;
    }


// далее добавляются так же все методы по работе с категориями

	
}