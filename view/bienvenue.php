<?php
session_start();
if(isset($_SESSION["utilisateur"])){
	echo "bienvenue "."<br>";
	echo "<a href='connexion.html'>deconnexion</a>";
}
else{
	header('location:connexion.html');
}
?>