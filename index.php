
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<body>
	<?php
		require_once('BD.php')
	?>

	<form method="POST" action="BD.php">
		






	<a href="add.php"> Ajouter un nouvel eleve</a><br>
	<table border="1px" cellpadding="5px" cellspacing="0">
		
			<tr>
				<th>id</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Age</th>
				<th>Filière</th>
				<th>Action</th>
			</tr>
			<?php
			//pour la selection des eleves et leur affichage sous forme d'un tableau
				$stmt = $con->prepare("SELECT * FROM eleve");
				$stmt->execute();
				$result = $stmt->fetchAll();
				foreach($result as $row){

				?>
				<tr>

					<td><?=$row['id'];?></td>
					<td><?=$row['nom'];?></td>
					<td><?=$row['prenom'];?></td>
					<td><?=$row['age'];?></td>
					<td><?=$row['filiere'];?></td>
					<td>
						<a href="edit.php?id=<?=$row['id'];?>">Modifier</a> |
						<a href="delete.php?id=<?=$row['id'];?>">Supprimer</a>
					</td>
				</tr>
				<?php
					}
					?>
		
	

	</table>
	




</body>
</html>