<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style/admin.css" />
	<link rel="stylesheet" type="text/css" href="./style/menu.css">
	<script type="text/javascript" src="./script/menu.js" defer></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" defer></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" defer></script>
</head>
<body>
<?php
require('config.php');
session_start();

if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){
	    $_SESSION['username'] = $username;
	    header("Location: admin.php");
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
?>

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
	
<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title"><a href="">MB Pressing</a></h1>
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">

<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>


</section>
</body>
</html>