<?php
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['entreprise'])){
		session_start();
		$_SESSION["entreprise"] = $_POST['entreprise'];
		header("Location: ../index.php");
	}
	else{
		header("Location: ../index.php?error=erreurCompany");
	}
?>