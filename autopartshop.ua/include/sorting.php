<?php
	$sorting = $_GET["sort"];   
 
	switch ($sorting)
	{
	    case 'price-asc';
	    $sorting = 'price ASC';
	    $sort_name = 'От дешевых к дорогим';
	    break;

	    case 'price-desc';
	    $sorting = 'price DESC';
	    $sort_name = 'От дорогих к дешевым';
	    break;
	    
	    case 'popular';
	    $sorting = 'count DESC';
	    $sort_name = 'Популярное';
	    break;
	    
	    case 'news';
	    $sorting = 'datetime DESC';
	    $sort_name = 'Новинки';
	    break;
	    
	    case 'brand';
	    $sorting = 'brand';	
	    $sort_name = 'От А до Я';
	    break;
	    
	    default:
	    $sorting = 'products_id DESC';
	    $sort_name = 'Без сортировки';
	    break;                           
	}  
 ?>