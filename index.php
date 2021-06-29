<html>
    <?php 
        session_start();
        require"includes/initNettoyage.php";
    ?>
    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="includes/miseEnForme/style.css" />
        <title>Formulaire de connexion PHP/MySQL</title>
    </head>
    <body>
        <?php 
            if(isset($_GET['error'])){
                switch($_GET['error']){
                    case("argumentIncomplet"):
                        echo("<script> alert('un des arguements entres n\'est pas complet veuillez verifier vos arguments : Serveur, Database et Utilisateur.'); </script>");
                        break;
                    case "argumentInvalide" :
                        echo("<script> alert('un des arguements entres n\'est pas correct veuillez verifier vos arguments.'); </script>");
                        break;
                    case "inconnu" :
                        echo("<script> alert('Une erreur inconnu s\'est produite veuillez retenter l\'operation ou appeler le responsable si le probleme persiste.'); </script>");
                        break;
                    default :
                        echo("<script> alert('Une erreur inconnu s\'est produite'); </script>");
                        break;
                }
            }
        ?>
        <h1 id="titreConnexion">Connexion</h1>
        <form method="post" action="includes/connexion.php">
            Serveur : <input type="text" name="serveur" placeholder="Entrer le nom du serveur" /><br />
            Base de donnee : <input type="text" name="database" placeholder="Entrer le nom de la Bdd" /><br />
            Utilisateur : <input type="text" name="user" placeholder="Entrer votre utilisateur" /><br />
            mot de passe : <input type="password" name="password" placeholder="Entrez votre mot de passe" /><br />
            <input type="submit" value="Submit" />
        </form>

        <?php 
            if(isset($_SESSION['serveur']) && isset($_SESSION['database']) && isset($_SESSION['user']) /*&& isset($_SESSION['password'])*/){
                
                include("gestion.php"); //ma page qui g�re le menu d�roullant pour choisir une entreprise a nettoyer
            }
            if(isset($_SESSION['entreprise'])){
                include("miseAJourFormulaire.php"); //la pge qui est sens� afficher mon tableau comparatif
            }
        ?>
    </body>
    
</html>