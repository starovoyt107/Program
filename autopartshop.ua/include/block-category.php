<div id="block-category">
	<p class="header-title">Категории товаров</p>
	<ul>
		<li><a id="index1"><img src="/images/cars-parts.png" alt="cars" class="ico">Автозапчасти</a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=autopart"><strong>Все модели</strong></a></li>
				<?php
					$result =  mysqli_query($link, "SELECT * FROM  `category` WHERE type='autopart'");
					if(mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_array($result);
						do {
							echo('
								<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
							');
						} while ($row = mysqli_fetch_array($result));
					}	
				 ?>
			</ul>
		</li>
		<li><a id="index2"><img src="/images/moto-parts.png" alt="moto" class="ico">Мотозапчасти</a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=motopart"><strong>Все модели</strong></a></li>
				<?php
					$result =  mysqli_query($link, "SELECT * FROM  `category` WHERE type='motopart'");
					if(mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_array($result);
						do {
							echo('
								<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
							');
						} while ($row = mysqli_fetch_array($result));
					}	
				 ?>
			</ul>
		</li>
		<li><a id="index3"><img src="/images/oil.png" alt="oil" class="ico">Масла</a>
			<ul class="category-section">
				<li><a href="view_cat.php?type=oil"><strong>Все модели</strong></a></li>
				<?php
					$result =  mysqli_query($link, "SELECT * FROM  `category` WHERE type='oil'");
					if(mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_array($result);
						do {
							echo('
								<li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
							');
						} while ($row = mysqli_fetch_array($result));
					}	
				 ?>
			</ul>
		</li>
		
	</ul>
</div>