<?php
	$link = mysqli_connect("localhost", "root", "", "db_shop");
	if (!$link) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	mysqli_set_charset($link, "utf8");
?>