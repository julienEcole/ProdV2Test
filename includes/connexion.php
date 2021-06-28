<?php
    require"class/nettoyage.php";
    session_start();
    // Vérifie qu'il provient d'un formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
  
        if(!empty($_POST["serveur"]) || !empty($_POST["database"]) || !empty($_POST["user"])){
            try{ //on essaie de se créer l'objet nettoyage qu'on utiliseras plus tard
                $monNettoyage = new nettoyage($_POST['serveur'],$_POST['database'],$_POST['user'],$_POST['password']);
            }
            catch(Exception $e){     //exeption inconnu
                header("Location: ../index.php?error=inconnu");
            }
            catch(PDOException $e){  //un des input donnés par l'utilisateur est incorrect
                header("Location: ../index.php?error=argumentInvalide");
            }
            if(isset($monNettoyage)){  //dans ce cas la tout est bien dans le meilleurs des mondes
                $_SESSION["serveur"] = $_POST['serveur'];
                $_SESSION["database"] = $_POST['database'];
                $_SESSION["user"] = $_POST['user'];
                $_SESSION["password"] = $_POST['password'];
                unset($monNettoyage);
                header("Location: ../index.php?ok=connexionReussi");
            }
            else{
                header("Location: ../index.php?error=argumentInvalide");
            }
        }
        else{   //tous les inputs ne sont pas rempli
            header("Location: ../index.php?error=argumentIncomplet");
        }
    }
?>