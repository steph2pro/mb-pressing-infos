<?php 
//connection
$db = new PDO('mysql:host=localhost;dbname=pressing;charset=utf8','root','',[
PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);


function postMessage(){
	global $db;
	//1. analyser les donne envoyer en post(auteur et contenue)

	if(!array_key_exists('email', $_POST) || !array_key_exists('sujet', $_POST)|| !array_key_exists('message', $_POST)){
		echo json_encode(["status" => "erreur", "message" => "votre message n'as pas ete envoyer"]);
		return;
	}
	$email=$_POST['email'];
	$sujet=$_POST['sujet'];
	$message=$_POST['message'];
	//2. creer une requete qui permet d'inserer des donnees
	$query=$db->prepare('INSERT INTO messages SET email=:email, sujet=:sujet,message=:message,date_creation=NOW()');
	$query->execute([
		"email" =>$email,
		"sujet" => $sujet,
		"message"=>$message

	]);

	//3.donner un statu de success ou d'erreur en format json
	echo json_encode(["status" => "success"]);
}
postMessage();