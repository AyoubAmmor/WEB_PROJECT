<?php 




	$dbhost  = 'localhost'; 
	$dbname  = 'projetweb'; 
	$dbuser  = 'root'; 
	$dbpass  = '';   

	$con = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
	$con->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	 


?>
