<?php

	require_once('BD.php');
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		try{
			$stmt = $con->prepare("DELETE FROM eleve WHERE id = ? ");
			$stmt->execute(array($id));
			header('Location:index.php');
			}
			catch(PDOException $ex){
				echo $ex->getMessage();
			}
		}
	


?>