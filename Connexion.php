
<html>

<head>
  <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Sign in</title>
</head>

<body>

  <?php
    include"BD.php";
  ?>

  <span><img src="Logo.png" width="150" height="175" id="im1"/></span>

  <header>
    
    <?php
  session_start();
  try{

    if(isset($_POST["login"])){
      if(empty($_POST["username"]) || empty($_POST["password"])){
        $message = '<label>Veuillez remplir tous les champs</label>';
      }
      else{
        $query = "SELECT * FROM professeur WHERE login = :login AND password = :password";
        $statement = $con->prepare($query);
        $statement->execute(array('login'=>$_POST["username"],'password'=>$_POST["password"]));
        $count = $statement->rowCount();
        if($count > 0){
          $_SESSION["username"] = $_POST["username"];
          header("location:index.php");
        }
        else{
          $message = "<label>Le Usernam ou le Password est invalide</label>";
          }
        }
      }
    }
   catch(PDOException $error){
      $message = $error->getMessage();
    }


  ?>
    <center>
    <span><h1 id="h11">AAM Data School<br/>
    <font style="font-size:23px">Excellence et innovation</font></span>
    </h1>
  </center>
  </header>


      <nav>
      
      <ul class="uu">
      <li><a href=""><img src="https://img.icons8.com/small/16/000000/youtube--v1.png" width="20" height="20"/></a></li>

            <li><a href=""><img src="https://img.icons8.com/carbon-copy/50/000000/twitter--v2.png" width="20" height="20"/></a></li>

        <li><a href=""><img src="https://img.icons8.com/ios/50/000000/facebook--v2.png" width="20" height="20"/></a></li>

        <li><a href = "Connexion.html" onclick="attention()">Connexion</a></li>
        <li><a href = "evenement.html">Infos Utiles</a></li>
        <li><a href = "club.html">Clubs</a></li>
        <li><a href = "Fieliere.html">Filières</a></li>
        <li><a class="active" href = "AAM.html">Acceuil</a></li>

            </ul> 
          
      </nav>

<?php 
  if(isset($message)){
    echo '<label>'.$message.'</label>';
  }
  
 ?>

    
  <div class="main">
    <p class="sign" align="center">Se conecter</p>
    <form class="form1" method="POST">
      <input class="un " type="text" align="center" placeholder="Username" name="username">
      <input class="pass" type="password" align="center" placeholder="Password" name="password">
      <input type="submit" name="login" class="submit" align="center" value="Se connecter">
            
                
    </div>
     
</body>













</html>



