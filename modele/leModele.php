<?php
class leModele {
    private $unPdo;
    public function __construct($server, $bdd, $user, $mdp)
    {
        $this->unPdo = null;
        
        try
        {
            $this->unPdo = new PDO("mysql:host=".$server.";dbname=".$bdd,$user,$mdp);
        }
        catch(PDOExecption $exp)
        {
            echo "Erreur de connexion à la base données";
            echo $exp->getMessage();
        }
    }

    public function verifCon($nom, $mdp)
    {
        if($this->unPdo!=null)
        {
            $requete ="select * from enfant where nom=:nom and mdp=:mdp;";
            $donnees = array(":nom"=>$nom,":mdp"=>$mdp);
            $select = $this->unPdo->prepare($requete);
            $select->execute($donnees);
            $resultat = $select->fetch();
            return $resultat;
        }
    }
/*
    Insert
*/
public function insert($table, array $tab)
 {
    if ($this->unPdo == null)
     {
        return;
     }
    //Template
    $insert_format = 'insert into %s (%s) values (%s)';
    //rendre ces variables en tableau
    $colonnes = $parametres = $valeurs = [];
    //Remplire les champs
    foreach ($tab as $colonne => $valeur)
    {
        $parametre = ':' . $colonne;
        //echo $colonne ;
        $colonnes[] = $colonne;
        $parametres[] = $parametre;
        $valeurs[$parametre] = $valeur;
    }
    //ordonner 
    $sql = sprintf(
            $insert_format,
            $table,
            implode($colonnes, ', '),
            implode($parametres, ', '));
            $statement = $this->unPdo->prepare($sql);
            $statement->execute($valeurs);
           // echo $sql;
           //var_dump( $valeurs);
}

/*
    Delete
*/

public function delete($table, array $tab)
{
    if ($this->unPdo == null)
    {
        return;
    }

    $delete_format = 'delete from %s where (%s) = (%s)';
    $colonnes = $parametres = $valeurs = [];
    foreach ($tab as $colonne => $valeur)
    {
        $parametre = ':' . $colonne;
        //echo $colonne ;
        $colonnes[] = $colonne;
        $parametres[] = $parametre;
        $valeurs[$parametre] = $valeur;
    }
    $sql = sprintf(
            $delete_format,
            $table,
            implode($colonnes, ', '),
            implode($parametres, ', '));
    //echo $sql;
    $statement = $this->unPdo->prepare($sql);
    $statement->execute($valeurs);
}

/*
    Updaute
*/
public function update($table, array $tab, $id)
{
    if ($this->unPdo == null)
    {
        return;
    }

    $update_format = 'update %s set (%s) = (%s) where %s = %s';
    $colonnes = $parametres = $valeurs = [];
    foreach ($tab as $colonne => $valeur)
    {
        $parametre = ':' . $colonne;
        //echo $colonne ;
        $colonnes[] = $colonne;
        $parametres[] = $parametre;
        $valeurs[$parametre] = $valeur;
    }
    $sql = sprintf(
            $update_format,
            $table,
            implode($colonnes, ', '),
            implode($parametres, ', '),
            $id);
    
    $statement = $this->unPdo->prepare($sql);
    $statement->execute($valeurs);
	echo $sql;
	die();
}

public function selectEvent()
{
    if ($this->unPdo != null) {
            // selection de toutes les données
            $requete = "select * from event ;";
            // preparation de la requete avant execution
            $select = $this->unPdo->prepare($requete);

            // exection de la requete
            $select->execute();

            // extraction des données
            $result = $select->fetchAll();
            return $result;
            
        }
    }
	
	
public function selectObjetenVente()
{
    if ($this->unPdo != null) {
            // selection de toutes les données
            $requete = "select * from Objet where En_vente = 1 ;";
            // preparation de la requete avant execution
            $select = $this->unPdo->prepare($requete);

            // exection de la requete
            $select->execute();

            // extraction des données
            $result = $select->fetchAll();
            return $result;
            
        }
    }
    public function selectProduit()
    {
    if ($this->unPdo != null) {
            // selection de toutes les données
            $requete = "select * from produit;";
            // preparation de la requete avant execution
            $select = $this->unPdo->prepare($requete);

            // exection de la requete
            $select->execute();

            // extraction des données
            $result = $select->fetchAll();
            return $result;
        }
    }
	public function selectObjetsByChild($id_enfant)
    {
    if ($this->unPdo != null) {
            // selection de toutes les données
            $requete = "select * from Objet where id_enfant = :id_enfant;";
			$donnees = array(":id_enfant"=>$id_enfant);   
            // preparation de la requete avant execution
            $select = $this->unPdo->prepare($requete);

            // exection de la requete
            $select->execute($donnees);

            // extraction des données
            $result = $select->fetchAll();
            return $result;
        }
    }
    
     public function selectLieu()
    {
    if ($this->unPdo != null) {
            // selection de toutes les données
            $requete = "select * from Lieu;";
            // preparation de la requete avant execution
            $select = $this->unPdo->prepare($requete);

            // exection de la requete
            $select->execute();

            // extraction des données
            $result = $select->fetchAll();
            return $result;
            
        }
    }
    public function selectInscrire()
    {
    if ($this->unPdo != null) {
            // selection de toutes les données
            $requete = "select * from inscrire;";
            // preparation de la requete avant execution
            $select = $this->unPdo->prepare($requete);

            // exection de la requete
            $select->execute();

            // extraction des données
            $result = $select->fetchAll();
            return $result;
            
        }
    }
    public function selectPromos()
    {
    if ($this->unPdo != null) {
            // selection de toutes les données
            $requete = "select * from promos;";
            // preparation de la requete avant execution
            $select = $this->unPdo->prepare($requete);

            // exection de la requete
            $select->execute();

            // extraction des données
            $result = $select->fetchAll();
            return $result;
            
        }
    }
    public function countProduit1()
    {
    if ($this->unPdo != null) {
            // selection de toutes les données
            $requete = "SELECT COUNT(*) FROM produit WHERE id_partenaire = 1";
            // preparation de la requete avant execution
            $select = $this->unPdo->prepare($requete);

            // exection de la requete
            $select->execute();

            // extraction des données
            $result = $select->fetchAll();
            return $result;
            
        }
    }
    public function countProduit2()
    {
    if ($this->unPdo != null) {
            // selection de toutes les données
            $requete = "SELECT COUNT(*) FROM produit WHERE id_partenaire = 2";
            // preparation de la requete avant execution
            $select = $this->unPdo->prepare($requete);

            // exection de la requete
            $select->execute();

            // extraction des données
            $result = $select->fetchAll();
            return $result;
            
        }
    }
    
    
    public function selectPartenaire()
{
    if ($this->unPdo != null) {
            // selection de toutes les données
            $requete = "select * from partenaire";
            // preparation de la requete avant execution
            $select = $this->unPdo->prepare($requete);

            // exection de la requete
            $select->execute();

            // extraction des données
            $result = $select->fetchAll();
            //var_dump($result);
            return $result;
        

        }
    }

    public function selectAttribut()
    {
        if ($this->unPdo != null) {
                // selection de toutes les données
                $requete = "SELECT * from attribut where designation = 'poids' and id_telephone = 1;";
                // preparation de la requete avant execution
                // $donnees = array(":telephone"=>$_SESSION['id_telephone']);
                $select = $this->unPdo->prepare($requete);
                // exection de la requete
                $select->execute();
                // extraction des données
                $result = $select->fetchAll();
                return $result;
            }
        }
        public function selectAttribut1()
        {
            if ($this->unPdo != null) {
                    // selection de toutes les données
                    $requete = "SELECT * from attribut where designation = 'taille ecran' and id_telephone = 1;";
                    // preparation de la requete avant execution
                    // $donnees = array(":telephone"=>$_SESSION['id_telephone']);
                    $select = $this->unPdo->prepare($requete);
                    // exection de la requete
                    $select->execute();
                    // extraction des données
                    $result = $select->fetchAll();
                    return $result;
                }
            }
            public function selectAttribut2()
            {
                if ($this->unPdo != null) {
                        // selection de toutes les données
                        $requete = "SELECT * from attribut where designation = 'couleur' and id_telephone = 1;";
                        // preparation de la requete avant execution
                        // $donnees = array(":telephone"=>$_SESSION['id_telephone']);
                        $select = $this->unPdo->prepare($requete);
                        // exection de la requete
                        $select->execute();
                        // extraction des données
                        $result = $select->fetchAll();
                        return $result;
                    }
                }

                public function insertNote($tab)
                {
                   if($this->unPdo!=null)
                   {
                       $requete ="insert into note values(null, :auteur, :score, :commentaire, :id_personne, :id_telephone)";
                       $donnees = array(":auteur"=>$_SESSION['prenom'],":score"=>$tab['score'],":commentaire"=>$tab['commentaire'],":id_personne"=>$_SESSION['id_personne'],":id_telephone"=>$tab['id_telephone']);
                       $insert = $this->unPdo->prepare($requete);
                       $insert->execute($donnees);
                   } 
                }


                
            

            public function selectNote($id_produit)
            {
                if($this->unPdo != null)
                {
                    $requete = "select * from note where id_telephone = :id_telephone;";
                    $donnees = array(":id_telephone"=>$id_produit);                    
                    $select = $this->unPdo->prepare($requete);
                    $select->execute($donnees);
                    $resultat = $select->fetchAll();
                    return $resultat;
                }
            }

    public function selectTicket()
    {
    if ($this->unPdo != null) {
            // selection de toutes les données
            $requete = "select * from ticket;";
            // preparation de la requete avant execution
            $select = $this->unPdo->prepare($requete);
            // exection de la requete
            $select->execute();
            // extraction des données
            $result = $select->fetchAll();
            return $result;
        }
    }
    public function selectEchangebyChild($id_enfant)
    {
    if ($this->unPdo != null) {
            // selection de toutes les données
            $requete = "select * from echange where :id_enfant = id_enfant;";
            $donnees = array(":id_enfant"=>$id_enfant);                    
            // preparation de la requete avant execution
            $select = $this->unPdo->prepare($requete);
            // exection de la requete
            $select->execute($donnees);
            // extraction des données
            $result = $select->fetchAll();
            return $result;
        }
    }

    public function updateNote($tab, $id_note)
{
    if($this->unPdo!=null)
    {
            $requete ="update note set score = :score, commentaire = :commentaire where id_note = :id_note;";
            $donnees = array(":score"=>$tab['score'],":commentaire"=>$tab['commentaire'],":id_note"=>$id_note);
            $insert = $this->unPdo->prepare($requete);
            $insert->execute($donnees);
            var_dump($requete);

    }
}
 public function updateObjet($id_objet)
{
    if($this->unPdo!=null)
    {
            $requete ="update Objet set En_vente = 1 where id_objet = :id_objet;";
            $donnees = array(":id_objet"=>$id_objet);
            $insert = $this->unPdo->prepare($requete);
            $insert->execute($donnees);

    }
}
 public function TakeBackObjet($id_objet)
{
    if($this->unPdo!=null)
    {
            $requete ="update Objet set En_vente = 0 where id_objet = :id_objet;";
            $donnees = array(":id_objet"=>$id_objet);
            $insert = $this->unPdo->prepare($requete);
            $insert->execute($donnees);

    }
}
 public function BuyObject($id_objet, $id_enfant)
{
    if($this->unPdo!=null)
    {
            $requete ="update Objet set En_vente = 0, id_enfant = :id_enfant where id_objet = :id_objet;";
            $donnees = array(":id_objet"=>$id_objet, "id_enfant"=>$id_enfant);
            $insert = $this->unPdo->prepare($requete);
            $insert->execute($donnees);

    }
}
public function UpdateSolde($id_enfant, $prix)
{
    if($this->unPdo!=null)
    {
            $requete ="update Enfant set Solde = Solde - :prix where id_enfant = :id_enfant;";
            $donnees = array(":id_enfant"=>$id_enfant, "prix"=>$prix);
            $insert = $this->unPdo->prepare($requete);
            $insert->execute($donnees);

    }
}
public function UpdateSolde2($id_enfant, $prix)
{
    if($this->unPdo!=null)
    {
            $requete ="update Enfant set Solde = Solde + :prix where id_enfant = :id_enfant;";
            $donnees = array(":id_enfant"=>$id_enfant, "prix"=>$prix);
            $insert = $this->unPdo->prepare($requete);
            $insert->execute($donnees);

    }
}


}



?>