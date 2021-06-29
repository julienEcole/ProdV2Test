<?php //ce fichier sert uniquement a initialiser nettoyage.
    //require("class/nettoyage");
    if(!include("class/nettoyage.php")){	//pas la peine de faire la suite si nettoyage est absent
    	throw new Exception("la librairie de nettoyage a été supprimé ou déplacé, veuillez ouviri le fichier initNettoyage et modifier le chmein d'accés a la ligne 2 ou replacer nettoyage a son emplacement d'origine.");
    }
    $monNettoyage = new nettoyage($_SESSION["serveur"],$_SESSION["database"],$_SESSION["user"],$_SESSION["password"]);
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
    $listeTables = array("Account" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),   "AccountCompany"=> array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "AccountPreference" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),              "BugReport" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "Calculation" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                    "Category" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "Conf" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                           "Contact" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "Customer" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                       "CustomerAddress" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "EmailConfiguration" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),             "Emails" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "Employee" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                       "EmployeeSite" => array("tableMere" => "Employee", "nomClefPrimaire" => "EmployeeId"),  
    "HourDay" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                        "HourTypeConfiguration" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "HourWeek" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                       "Image" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "IrisList" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                       "Item" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "Licenses" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                       "Logs" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "Machine" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                        "MachineFamilly" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "Material" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                       "MaterialFamilly" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "[Order]" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                        "OrderLine" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "Periode" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                        "PeriodeProfile" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "PriceGrid" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                      "Product" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "provider" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                       "PurchaseOrder" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "PurchaseOrderLine" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),              "Query" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "QueryResult" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                    "Quotation" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "QuotationLine" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                  "Site" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "SiteItem" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                       "SiteItemDriver" => array("tableMere" => "Employee", "nomClefPrimaire" => "EmployeeId"),
    "SiteItemHour" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                   "SiteItemMember" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "SiteItemMemberTask" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),             "SiteItemPurchaseOrder" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "SiteItemTask" => array("tableMere" => "SiteItem", "nomClefPrimaire" => "SiteTaskId"),          "SiteTask" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),
    "Team" => array("tableMere" => "Company", "nomClefPrimaire" => "Id"),                           "TeamConductor" => array("tableMere" => "Team", "nomClefPrimaire" => "TeamId"),
    "TeamMachine" => array("tableMere" => "Team", "nomClefPrimaire" => "TeamId"),                   "TeamMember" => array("tableMere" => "Team", "nomClefPrimaire" => "TeamId"),
    "TeamSite" => array("tableMere" => "Team", "nomClefPrimaire" => "TeamId"));
    foreach($listeTables as $nomTable => $descriptionTable){
        $monNettoyage->AjouterTables($nomTable,$descriptionTable["tableMere"],$descriptionTable["nomClefPrimaire"]);
    }   //$monNettoyage est maintenant complet et prêt a être utilisé
?>