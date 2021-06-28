<?php 
    //session_start();
    //$path = "../includes/class/nettoyage.php";
    require ("includes/class/nettoyage.php");
?>

<!--<html>
    
    <head>  
        <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" />
        <link rel="stylesheet" href="include/miseEnForme/style.css" />
        <title>Formulaire de connexion PHP/MySQL</title>
    </head>
    <body>-->
        <?php
            if(isset($_GET['ok'])){
                switch($_GET['ok']){
                    case "connexionReussi":
                        echo("<script> alert('connexion avec la BDD etabli et operationnel.'); </script>");
                        break;
                    }
                }
            $monNettoyage = new nettoyage($_SESSION["serveur"],$_SESSION["database"],$_SESSION["user"],$_SESSION["password"]); //monObjet contennant mon PDO
        ?>
        <!-- operationnel cette partie est a faire, je dosi changer la company de monNettoyage quand mon select change -->
        <divModif>
            <h1 id="titreGestion">Nettoyage</h1>
            <form method="post" action="includes/modifierCompanie.php"> <!-- je dois trouver un moyen de recharger la page et de changer l'attribut idCompany de $monNettoyage avant de faire la suite-->
                <select name="entreprise" onchange="this.form.submit()"> <!--changer ligne précedente pour faire un fichier initialisant la session de entreprise-->
                    <nom>Entreprise</nom>
                    <option selected disabled>
                    <?php 
                        if(isset($_SESSION['entreprise'])){     //je pourrais réduire la taille 
                            echo($_SESSION['entreprise']."</option>");
                        }
                        else{
                            echo("Veuillez choisir une entreprisesur laquel agir </option>");
                        }
                        
                        //---------------------------------------------------------------------------------------------//
                        $SQLCommande = "select Name from Company";
                        $execution = $monNettoyage->_bdd->_SQLPointer->query($SQLCommande);
                        $listeNomCompany = $execution->fetchAll();
                        foreach($listeNomCompany as $nomCompany){
                            if($nomCompany['Name'] == $_SESSION['entreprise']){ //enlever la case serait plus efficace a modifier si j'ai le temps
                                continue;
                            }
                            echo("<option valeur = ".$nomCompany['Name']." > ".$nomCompany['Name']." </option>");
                        }
                    ?>
                </select>
            </form>
            <?php
                if(isset($_SESSION['entreprise']) && $_SESSION['entreprise'] != ""){    //alors on a rechargé la page en donnant une nouvelle company a mon objet
                    try{
                        $monNettoyage->getCompany($_SESSION['entreprise']);
                    }
                    catch(exception $e){
                        echo("<script> alert('une erreur s'est produite, voici le message d\'erreur : $e')");
                    }
                    catch(PDOException $e){
                        echo("<script> alert('une erreur s'est produite avec la connexion a la BDD, voici le message d\'erreur : $e')");
                    }
                }
            ?>
        </divModif>
    <!--</body>
</html>-->