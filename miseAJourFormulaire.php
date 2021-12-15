
<html>	

    <head>  
        <link rel="stylesheet" href="miseEnForme/style.css" />
	</head>
<?php 

	if(isset($_SESSION['entreprise'])){	//a voir si je dois ajouter une condition pour vérifier la compatibilité de ça avec $monNettoyage
		//$_SESSION['entreprise'] = $_POST['entreprise'];
		//require("includes/initNettoyage.php");	//j'aurais besoin de ma librairie et d'un objet bien initialiser pour faire le formulaire.
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
			<input type=button onclick=window.location.href='includes/purge.php?action=nettoyage'; value='nettoyage' />
			<input type=button onclick=window.location.href='includes/purge.php?action=toutEnlever'; value='purge' style='color:red'/>";
	}
	else{
		echo("La lybrairie nettoyage n\'a pas ete charger'");
	}		
?>
		
	<!--</body>
</html>-->


