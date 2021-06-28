<?php
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "GET"){		//ALORS ON VIENS BIEN DU FORMULAIRE PRECEDENT
		require"initNettoyage.php";
		if($_GET['action'] == 'nettoyage'){
			$monNettoyage->suppLignes();
		} else if($_GET['action'] == 'toutEnlever'){
			$monNettoyage->suppTout();
		}
		unset($_SESSION["entreprise"]);
		header("Location: ../gestion.php");
	}
?>