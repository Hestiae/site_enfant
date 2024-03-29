<?php 
require_once("../modele/leModele.php");
class leControleur
{
    private $unModele;
    public function __construct($server,$bdd,$user,$mdp)
    {
        //instanciation de la class modele
        $this->unModele = new leModele($server,$bdd,$user,$mdp);
    }

    public function verifCon($email, $mdp)
    {
        // on peu controler les donnees 
        return $this->unModele->verifCon($email, $mdp);
    }
    public function selectEvent()
    {
        return $this->unModele->selectEvent();
    }
    public function selectNote($id_produit)
    {
        return $this->unModele->selectNote($id_produit);
    }
	public function selectObjetsByChild($id_enfant)
    {
        return $this->unModele->selectObjetsByChild($id_enfant);
    }
	public function selectEchangebyChild($id_enfant)
      {
          return $this->unModele->selectEchangebyChild($id_enfant);
      }
    public function countProduit1()
    {
        return $this->unModele->countProduit1();
    }
    public function countProduit2()
    {
        return $this->unModele->countProduit2();
    }
     public function selectLieu()
    {
        return $this->unModele->selectLieu();
    }
    public function selectInscrire()
    {
        return $this->unModele->selectInscrire();
    }
    public function  selectObjetenVente()
    {
        return $this->unModele-> selectObjetenVente();
    }
    public function selectTicketSup($id_partenaire)
    {
        return $this->unModele->selectTicketSup($id_partenaire);
    }
    public function selectProduit()
    {
        return $this->unModele->selectProduit();
    }
    public function selectPromos()
    {
        return $this->unModele->selectPromos();
    }
    public function selectPartenaire()
    {
        return $this->unModele->selectPartenaire();
    }
    public function verifConPart($accronyme, $mdp)
    {
        // on peu controler les donnees 
        return $this->unModele->verifConPart($accronyme, $mdp);
    }
    public function insert($table, $tab)
      {
        $this->unModele->insert($table, $tab);
      }
      public function delete($table, $tab)
      {
        $this->unModele->delete($table, $tab);
      }
      public function update($table, $tab, $id)
      {
        $this->unModele->update($table, $tab, $id);
      }
      public function insertNote($tab)
      {
        $this->unModele->insertNote($tab);
      }
      public function updateNote($tab,$id_note)
      {
        $this->unModele->updateNote($tab,$id_note);
      }
	  public function updateObjet($id_objet)
      {
        $this->unModele->updateObjet($id_objet);
      }
	   public function TakeBackObjet($id_objet)
	   {
        $this->unModele->TakeBackObjet($id_objet);
      }
	  public function BuyObject($id_objet, $id_enfant)
	  {
		  $this->unModele-> BuyObject($id_objet, $id_enfant);
	  }
	  public function UpdateSolde($id_enfant, $prix)
	  {
		  $this->unModele-> UpdateSolde($id_enfant, $prix);
	  }
	  public function UpdateSolde2($id_enfant, $prix)
	  {
		  $this->unModele-> UpdateSolde2($id_enfant, $prix);
	  }
      
      public function selectAttribut1()
      {
          return $this->unModele->selectAttribut1();
      } 
       public function selectAttribut2()
      {
          return $this->unModele->selectAttribut2();
      }
}