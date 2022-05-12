<?php 
	require_once('BD.php');

	if(isset($_POST['ajouter'])){
		$id = $_POST["id"]; // on utilie $_POST pour collecter les infos dans sasies dans les inputs html 
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$age = $_POST["age"];
		$filiere = $_POST["filiere"];
		if(!empty($id)){
			try{
				$stmt = $con->prepare("INSERT INTO eleve (id, nom, prenom, age, filiere) VALUES(:id, :nom, :prenom, :age, :filiere");
				$stmt->execute(array(':id'=>$id,':nom'=>$nom,':prenom'=>$prenom,':age'=>$age,':filiere'=>$filiere));
				header('Location:BD.php');
			}catch(PDOException $ex){
				echo $ex-> getMessage();
			}
		}else{
			echo "Veuillez inserer un id";
		}
	}
 ?>


<form action="" method="post">
	<table>
			<tr>
				<td>Id :</td>
				<td><input type="text" name="id"></td>
			</tr>

			<tr>
				<td>Nom :</td>
				<td><input type="text" name="nom"></td>
			</tr>

			<tr>
				<td>Prenom :</td>
				<td><input type="text" name="prenom"></td>
			</tr>

			<tr>
				<td>Age :</td>
				<td><input type="text" name="age"></td>
			</tr>

			<tr>
				<td>Filiere :</td>
				<td><input type="text" name="filiere"></td>
			</tr>	

		</table>

			<input type="submit" value="Ajouter" name="ajouter">
			<input type="submit" value="Modifier" name="modifier">
			<input type="submit" value="Supprimer" name="supprimer">
	</form>
</form>