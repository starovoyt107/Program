<?php
	include("include/db_connect.php");
	include("functions/functions.php");

	$cat = clearString($_GET["cat"]);
	$type = clearString($_GET["type"]);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="trackbar/trackbar.css">
	<link rel="stylesheet" href="css/reset.css">
	<script type="text/javascript" src="/js/jquery-2.2.4.min.js"></script>
	<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
	<script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>
	<script type="text/javascript" src="/js/shop-script.js"></script>
	<script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script>
	<title>Поиск по параметрам</title>
</head>
<body>
	<div id="block-body">
		<!-- Подключение шапки сайта -->
		<?php
			include("include/block-header.php"); 
		 ?>
		 <!-- Подключение блоков категорий товаров, фильтра параметров и новостей -->
		<div id="block-right">
			<?php
				include("include/block-category.php");	 
				include("include/block-parameter.php");
				include("include/block-news.php");
			 ?>
		</div>
		<!-- Блок отображения основного контента сайта -->
		<div id="block-content">
			<div id="block-sorting">
				<p id="nav-breadcrumbs">
					<a href="index.php">Главная страница</a><span> \ Все товары</span>
				</p>
				<ul id="options-list">
					<li>Вид: </li>
					<li><img id="style-grid" src="/images/icon-grid.png" alt="icon-grid"></li>
					<li><img id="style-list" src="/images/icon-list.png" alt="icon-list"></li>
					<li>Сортировать: </li>
					<li><a id="select-sort">
						<?php
							echo "$sort_name"; 
						 ?>
					</a>
						<ul id="sorting-list">
							<li><a href="view_cat.php?cat='.$cat.' & type='.$type.' & sort=price-asc">От дешевых к дорогим</a></li>
							<li><a href="view_cat.php?cat='.$cat.' & type='.$type.' & sort=price-desc">От дорогих к дешевым</a></li>
							<li><a href="view_cat.php?cat='.$cat.' & type='.$type.' & sort=popular">Популярное</a></li>
							<li><a href="view_cat.php?cat='.$cat.' & type='.$type.' & sort=news">Новинки</a></li>
							<li><a href="view_cat.php?cat='.$cat.' & type='.$type.' & sort=brand">От А до Я</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<ul id="block-product-grid">
				<?php
					if($_GET["brand"]){
						$check_brand = implode(',',$_GET["brand"]); 
					}

					$start_price = (int)$_GET["start_price"];
					$end_price = (int)$_GET["end_price"];

					if(!empty($check_brand) || !empty($end_price)){
						if(!empty($check_brand)) $query_brand = " AND brand_id IN($check_brand)";
						if(!empty($end_price)) $query_price = " AND price BETWEEN $start_price AND $end_price";
					}

					$result =  mysqli_query($link, "SELECT * FROM  `table_products` WHERE visible='1' $query_brand $query_price ORDER BY products_id DESC");
	                if(mysqli_num_rows($result) > 0) {
	                    $row = mysqli_fetch_array($result);
	                    do {
	                    	if ($row["image"] != "" && file_exists("./uploads_images/".$row["image"])) {
	                    		$img_path = './uploads_images/'.$row["image"];
	                    		$max_width = 200;
	                    		$max_height = 200;
	                    		list($width, $height) = getimagesize($img_path);
	                    		$ratioh = $max_height/$height;
	                    		$ratiow = $max_width/$width;
	                    		$ratio = min($ratioh, $ratiow);
	                    		$width = intval($ratio*$width);
	                    		$height = intval($ratio*$height);
	                    	} else {
	                    		$img_path = "/images/no-image.png";
	                    		$width = 110;
	                    		$height = 200;
	                    	}

	                        echo('
	                        	<li>
	                        		<div class="block-images-grid"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" alt="img"></div>
	                        		<p class="style-title-grid">
	                        			<a href="#">'.$row["title"].'</a>
	                        		</p>
	                        		<ul class="reviews-and-counts">
	                        			<li><img src="/images/eye-icon.png" alt="eye"><p>0</p></li>
	                        			<li><img src="/images/comment-icon.png" alt="comment"><p>0</p></li>
	                        		</ul>
	                        		<a href="#" class="add-cart-style-grid"></a>
	                        		<p class="style-price-grid">
	                        			<strong>'.$row["price"].'</strong> грн
	                        		</p>
	                        		<div class="mini-features">
										'.$row["mini_features"].'
	                        		</div>
	                        	</li>
	                        ');
	                    } while ($row = mysqli_fetch_array($result));
				 ?>
			</ul>
			<ul id="block-product-list">
				<?php
					$result =  mysqli_query($link, "SELECT * FROM  `table_products` WHERE visible='1' $query_brand $query_price ORDER BY products_id DESC");
	                if(mysqli_num_rows($result) > 0) {
	                    $row = mysqli_fetch_array($result);
	                    do {
	                    	if ($row["image"] != "" && file_exists("./uploads_images/".$row["image"])) {
	                    		$img_path = './uploads_images/'.$row["image"];
	                    		$max_width = 150;
	                    		$max_height = 150;
	                    		list($width, $height) = getimagesize($img_path);
	                    		$ratioh = $max_height/$height;
	                    		$ratiow = $max_width/$width;
	                    		$ratio = min($ratioh, $ratiow);
	                    		$width = intval($ratio*$width);
	                    		$height = intval($ratio*$height);
	                    	} else {
	                    		$img_path = "/images/noimages80x70.png";
	                    		$width = 80;
	                    		$height = 70;
	                    	}

	                        echo('
	                        	<li>
	                        		<div class="block-images-list"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" alt="img"></div>
	                        		<p class="style-title-list">
	                        			<a href="#">'.$row["title"].'</a>
	                        		</p>
	                        		<ul class="reviews-and-counts-list">
	                        			<li><img src="/images/eye-icon.png" alt="eye"><p>0</p></li>
	                        			<li><img src="/images/comment-icon.png" alt="comment"><p>0</p></li>
	                        		</ul>
	                        		<p class="style-title-list">
	                        			<a href="#">'.$row["title"].'</a>
	                        		</p>
	                        		<a href="#" class="add-cart-style-list"></a>
	                        		<p class="style-price-list">
	                        			<strong>'.$row["price"].'</strong> грн
	                        		</p>
	                        		<div class="style-text-list">
										'.$row["mini_description"].'
	                        		</div>
	                        	</li>
	                        ');
	                    } while ($row = mysqli_fetch_array($result));
	                  }
					} else {
						echo '<h3>Категория не создана или недоступна!</h3>';
					}
				 ?>
			</ul>
		</div>
		<!-- Подключение нижней части сайта -->
		<?php
			include("include/block-footer.php"); 
		 ?>
	</div>
</body>
</html>
