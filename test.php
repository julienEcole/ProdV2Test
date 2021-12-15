<?php 

	include("includes/class/nettoyage.php");

	echo"apres include <br />";

	$monNetoyage = new nettoyage("DESKTOP-TJ0RBEU","ProdV2","test","test");


	
	echo"apres creation objet <br />";

	$monNetoyage->AjouterTables("Employee");
	$monNetoyage->AjouterTables("TeamMember","Employee","EmployeeId");
	$monNetoyage->AjouterTables("Site","Company");
	$monNetoyage->AjouterTables("SiteItem","Site");

	echo("table Employee ajoutee a la liste des tables <br />");

	$monNetoyage->_idCompany = "EGI ARRAS CODIAL";
	echo("mon attribut _idCompany est affecté et vaut : $monNetoyage->_idCompany <br />");

	echo("test de ma fonction getNbLignes <br />");
	$monNetoyage->getNbLignes();
	$monNetoyage->afficheTableau();

	echo("test de ma fonction getNbLignesRemoved <br />");
	$monNetoyage->suppLignes(1);
	echo("apres suppression : <br/>");
	$monNetoyage->afficheTableau();

	echo("Le tableau de tout ce qui me reste");
	$monNetoyage->getNbLignes();
	$monNetoyage->afficheTableau();

	echo"apres fonction a tester";
?>