<?php 
	require_once('BD.php');

	if(isset($_POST['modifier'])){
		$id = $_POST["id"]; // on utilie $_POST pour collecter les infos dans sasies dans les inputs html 
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$age = $_POST["age"];
		$filiere = $_POST["filiere"];
		if(!empty($id)){
			try{
				$stmt = $con->prepare("UPDATE eleve set nom = :nom, prenom = :prenom, age = :age, filiere = :filiere WHERE id = :id");
				$stmt->execute(array(':id'=>$id,':nom'=>$nom,':prenom'=>$prenom,':age'=>$age,':filiere'=>$filiere));
				if ($stmt){
					header('Location:index.php');
				}
				
			}catch(PDOException $ex){
				echo $ex-> getMessage();
			}
		}else{
			echo "Veuillez inserer un id";
		}
	}


 		$id = 0; 
		$nom = "";
		$prenom = "";
		$age = 0;
		$filiere = "";
		if (isset($_GET['id'])){
			$id = $_GET['id'];
			$stmt = $con->prepare("SELECT * FROM eleve WHERE id = :id");
			$stmt->execute(array('id' => $id));
			$row = $stmt->fetch();
			$id = $row['id'];
			$nom = $row['nom'];
			$prenom = $row['prenom'];
			$age = $row['age'];
			$filiere = $row['filiere'];
		

		}

 ?>



<form action="" method="post">
	<table>
			<tr>
				<td>Id :</td>
				<td><input type="text" name="id" value="<?=$id;?>"></td>
			</tr>

			<tr>
				<td>Nom :</td>
				<td><input type="text" name="nom" value="<?=$nom;?>"></td>
			</tr>

			<tr>
				<td>Prenom :</td>
				<td><input type="text" name="prenom" value="<?=$prenom;?>"></td>
			</tr>

			<tr>
				<td>Age :</td>
				<td><input type="text" name="age" value="<?=$age;?>"></td>
			</tr>

			<tr>
				<td>Filiere :</td>
				<td><input type="text" name="filiere" value="<?=$filiere;?>"></td>
			</tr>	

		</table>

			
			<input type="submit" value="Modifier" name="modifier">
			
	</form>
</form>