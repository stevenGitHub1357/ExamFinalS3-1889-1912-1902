<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Requete extends CI_Model
{
public function get_info()
{
	// On simule l'envoi d'une requête
	return $this->db->query('SELECT id_membre,nom,prenom,sexe,mdp FROM membres ');

}

public function voir_article($id)
{
	$rqt = "select m.id_membre,m.nom,m.prenom,o.id_objet,o.desciption,o.prix,p.nom as image from objet o
    join membres m on o.id_membre = m.id_membre
    join photo p on o.id_objet = p.id_objet
	where m.id_membre!=".$id;
	return $this->db->query($rqt);
}

public function voir_articleUser($id)
{
	$rqt = "select m.id_membre,m.nom,m.prenom,o.id_objet,o.desciption,o.prix,p.nom as image from objet o
    join membres m on o.id_membre = m.id_membre
    join photo p on o.id_objet = p.id_objet
	where m.id_membre=".$id;
	return $this->db->query($rqt);
}

public function insert_membre($nom,$prenom,$sexe,$mdp,$dtn)
{
	$rqt = "INSERT INTO membres(nom,prenom,sexe,mdp,dtn) VALUES ('%s','%s',%d,'%s','%s')";
	$rqt = sprintf($rqt,$nom,$prenom,$sexe,$mdp,$dtn);
	return $this->db->query($rqt);
}

public function insert_echange($id1,$id2,$o1,$o2)
{
	$rqt = "INSERT INTO echange VALUES (default,%d,%d,%d,%d,null)";
	$rqt = sprintf($rqt,$id1,$id2,$o1,$o2);
	return $this->db->query($rqt);
}

	public function insertHistoriqueEchange($idOb1, $idOb2,$idMembre1, $idMembre2)
    {
        $rqt = "INSERT INTO historique VALUES(default,%d,%d,%d,%d,now())";
        $rqt = sprintf($rqt,$idOb1,$idOb2,$idMembre1,$idMembre2);
        $this->db->query($rqt);
    }

    public function historique()
    {
    	$rqt = "select h.idhisto,
		        p1.nom as photo1,p2.nom as photo2,
		        o1.id_objet as objet1,o1.desciption as desc1,o1.prix as prix1,o1.id_membre as membre1,
		        o2.id_objet as objet2,o2.desciption as desc2,o2.prix as prix2,o2.id_membre as membre2,
		        h.daty
		        from historique h
		    join objet o1 on h.idob1=o1.id_objet
		    join objet o2 on h.idob2=o2.id_objet 
		    join photo p1 on o1.id_objet = p1.id_objet
		    join photo p2 on o2.id_objet = p2.id_objet
		    order by daty desc";
		return $this->db->query($rqt);
    }
	public function accepteEchange($o1,$o2,$m1,$m2)
    {
    		$this->insertHistoriqueEchange($o1,$o2,$m1,$m2);
			$rqt1 = "update objet set id_membre=".$m1." where id_membre=".$m2." and id_objet=".$o2;
			$rqt1 = sprintf($rqt1,$m1,$m2,$o2);
			$rqt2 = "update objet set id_membre=".$m2." where id_membre=".$m1." and id_objet=".$o1;
			$rqt2 = sprintf($rqt2,$m2,$m1,$o1);
            //$this->insertHistoriqueEchange($idOb2,$idMembre2);
            $rqt = "UPDATE echange set dateAccepte = now() where idOb1=%d and idOb2=%d";
            $rqt = sprintf($rqt,$o1,$o2,);
			$this->db->query($rqt1);
			$this->db->query($rqt2);
        	$this->db->query($rqt);
        
    }

    public function categorie(){
    	$rqt = "SELECT * FROM categorie";
    	return $this->db->query($rqt);
    }


    public function refuseEchange($idOb1,$idOb2){
            $rqt = "DELETE FROM echange where idOb2=%d and idOb1=%d";
            $rqt = sprintf($rqt,$idOb2,$idOb1);
        return $this->db->query($rqt);
    }

    public function EchangeByMe($id){
        $rqt = "select e.id_echange,
					p1.nom as photo1,p2.nom as photo2,
					o1.id_objet as objet1,o1.desciption as desc1,o1.prix as prix1,o1.id_membre as membre1,
					o2.id_objet as objet2,o2.desciption as desc2,o2.prix as prix2,o2.id_membre as membre2
					from echange e
				join objet o1 on e.idob1=o1.id_objet
				join objet o2 on e.idob2=o2.id_objet 
				join photo p1 on o1.id_objet = p1.id_objet
				join photo p2 on o2.id_objet = p2.id_objet
    
				where o1.id_membre=%d and e.dateAccepte is null";
        $rqt = sprintf($rqt,$id);
        return $this->db->query($rqt);
    } 

    public function EchangeForMe($id){
        $rqt = "select e.id_echange,
					p1.nom as photo1,p2.nom as photo2,
					o1.id_objet as objet1,o1.desciption as desc1,o1.prix as prix1,o1.id_membre as membre1,
					o2.id_objet as objet2,o2.desciption as desc2,o2.prix as prix2,o2.id_membre as membre2
					from echange e
				join objet o1 on e.idob1=o1.id_objet
				join objet o2 on e.idob2=o2.id_objet 
				join photo p1 on o1.id_objet = p1.id_objet
				join photo p2 on o2.id_objet = p2.id_objet
				where o2.id_membre=%d and e.dateAccepte is null";
        $rqt = sprintf($rqt,$id);
        return $this->db->query($rqt);
    }
}
?>