<?php

class HFSQL{
	private $_nomBdd; //l'attribut contenant le nom de ma base de donn?e
    private $_nomServeur; //l'attribut contenant le nom de ma machine
    private $_mdp; //mot de passe de l'utilisateur de ma base
    private $_nomUtilisateur; //nom d'utilisateur de ma base
	private $_SQLPointer;	//mon BDO
	private $_ressource;

    public function __construct($Serveur,$Bdd = "test",$Utilisateur = "root",$mdp = ""){ //mon constructeur v?rifi?
		$valueConstruct = array("Serveur" => $Serveur,"Bdd" => $Bdd,"Utilisateur" => $Utilisateur);
		foreach($valueConstruct as $key => $value){
			$nomAttribut = "_nom".$key;	//pour factoriser le code je fait un string pour nommer ma variable dans un premier temps
			if(is_string ($value)){
				$this->$nomAttribut = $value;	//puis je lui alloue sa valeur si elle est valide
			}
		}
		if(is_string($mdp)) {
			$this->_mdp = $mdp;		//le mdp poss?de un nom un peu diff?rent d'ou la sortie de la boucle et contrairement aux autres elle peut ?tre vide
			if($this->_nomServeur != "" &&  $this->_nomBdd != "") {		//pas la peine de tenter de se connecter si on a pas mis de nom de bdd ni de serveur
				$dsn = "sqlsrv:Server=$this->_nomServeur;Database=$this->_nomBdd";
				try {
					$this->_SQLPointer = new PDO ($dsn, $this->_nomUtilisateur, $this->_mdp);
					$this->_SQLPointer->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
				catch(PDOexception $e){	//en cas d'erreur on est sens? avoir un message
					echo ("Erreur e : ".$e->getMessage()."<br />La connexion a la BDD a ?chou?, v?rifiez vos arguments <br />");
				}
			}
			else{
				throw new PDOException("PDO null veuillez v?rifier les parametres pr?c?dents");
			}
		}
		else {
			$_mdp = "";
			echo "tous les champs n'ont pas ?t? rempli, connexion actuellement impossible avec la bdd ";
		}
	}

	public function preparer($Query = null){
		$this->_ressource = $this->_SQLPointer->prepare($Query);
	}

	/*public function __destruct(){
		$this->_SQLPointer = NULL;
	}*/

	public function __get($value){
		if($value == "_nomUtilisateur" || $value == "_mdp"){
			throw new Exception("Vous tentez d'acceder a un arguments innacessible");
		}
		if(isset($this->$value)){
			return $this->$value;
		}
		/*else{
			throw new exception("l'attribut que vous tentez de recuperer n'existe pas.");
		}*/
	}
}

?>