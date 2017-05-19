<?php
	function clearString($cl_str){
		$link = mysqli_connect("localhost", "root", "", "db_shop");
		$cl_str = strip_tags($cl_str);
		$cl_str = mysqli_real_escape_string($link, $cl_str);
		$cl_str = trim($cl_str);
		return $cl_str;
	} 
 ?>