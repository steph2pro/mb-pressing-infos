<?php

	require('config.php');
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
		exit(); 
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="style/admin.css" />
	<link rel="stylesheet" type="text/css" href="./style/menu.css">
	<script type="text/javascript" src="./script/menu.js" defer></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" defer></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" defer></script>
	<link rel="stylesheet" href="./style/admin.css" />
	<link rel="stylesheet" href="./style/admin2.css" />
	</head>
	<body>
		<!--MENUE !-->
	<label for="ch" id="lab"></label>
	<input type="checkbox" id="ch">
	<nav>
		<a href="index.html" class="log"><img src="./images/logo.jpg" class="logo"> <b class="textlogo">MB Pressing</b> </a>
		<a href="index.html"><ion-icon name="home"></ion-icon>Accueil</a>
		<a href="apropos.html"><ion-icon name="body-outline"></ion-icon>A Propos</a>
		<a href="services.html"><ion-icon name="bag-check"></ion-icon>Nos Services</a>
		<a href="contacter.html"><ion-icon name="call"></ion-icon>contact</a>
		<a href="login.php"><ion-icon name="boat-outline"></ion-icon> Espace Admin</a>
	</nav>

	<section>
		<div class="sucess">
		<h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
		<p>C'est votre tableau de bord.</p>
		<a href="logout.php" class="btn">Déconnexion</a>
		</div>



		<table class="table">
			<thead>
				<th>numero</th>
				<th>Email</th>
				<th>Sujet</th>
				<th>Message</th>
				<th>date d'envoie</th>
			</thead>
			<tbody>
			<?php
				 $sql="select * from messages";
				 $req=mysqli_query($conn,$sql);
				 $i=1;
				 while($mess= mysqli_fetch_assoc($req)){
			?>
			
				<tr>
					<td data-label="Numero"><?= $i++ ?></td>
					<td data-label="Email"><?php echo $mess['email']?></td>
					<td data-label="Sujet"><?php echo $mess['sujet']?></td>
					<td data-label="Message"><?php echo $mess['message']?></td>
					<td data-label="Date"><?php echo $mess['date_creation']?></td>
				</tr>
				
				<?php
					}
				?>
			</tbody>
		</table>
	</section>
	</body>
</html>