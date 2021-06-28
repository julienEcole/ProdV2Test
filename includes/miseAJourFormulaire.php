
<!--<html>	

    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="miseEnForme/style.css" />
        <title>Formulaire de connexion PHP/MySQL</title>
    </head>
	<body>-->
<?php 

	if(isset($_POST['entreprise'])){	//a voir si je dois ajouter une condition pour vérifier la compatibilité de ça avec $monNettoyage
		$_SESSION['entreprise'] = $_POST['entreprise'];
		require("initNettoyage.php");	//j'aurais besoin de ma librairie et d'un objet bien initialiser pour faire le formulaire.
		$listeLigne = $monNettoyage->getNbLignes();
		$listeLigneRemoved = $monNettoyage->getNbLignesRemoved();	//j'aurais besoin d'une copie conforme de mon objet pour faire le formulaire

		echo"<table> 
				<tr> 
					<td> Table </td>
					<td> Nombre de ligne dans la table </td>
					<td> Nombre de ligne a nettoyer dans la table </td>
					<td> Nombre de ligne restant apres le nettoyage </td>
				</tr>";
		foreach($listeLigne as $nomTable => $value){	//TODO
			//pb venant de l'interrieur de la boucle
			echo"<tr> <td> $nomTable </td> <td> ".
			$value." </td> <td> ".
			($listeLigneRemoved[$nomTable])."</td> <td> ".
			($value - $listeLigneRemoved[$nomTable])."</td> </tr>";
		}
		echo"</table>
			<form action='purge.php?action=nettoyage'>
				<input type="submit" value="purger la BDD" />
			</form>
			<form action='purge.php?action=toutEnlever'>
				<input type="submit" value="Nettoyage Ultime" style="color:red;" />
			</form>";
	}
	else{
		header("Location: ../index.php");	
	}		
?>
		
	<!--</body>
</html>-->


