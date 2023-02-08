<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Requete2 extends CI_Model
{
public function voir_article($id)
{
	$rqt = "select m.id_membre,m.nom,m.prenom,o.id_objet,o.desciption,o.prix,p.nom as image from objet o
    join membres m on o.id_membre = m.id_membre
    join photo p on o.id_objet = p.id_objet
	where m.id_membre!=".$id;
	return $this->db->query($rqt);
}


	public function insertHistoriqueEchange($idOb1, $idMembre1,$idOb2, $idMembre2)
    {
        $rqt = "INSERT INTO HistoriqueEchange VALUES(default,%d,%d,%d,%d,'now()')";
        $rqt = sprintf($rqt,$idOb1,$idOb2,$idMembre1,$idMembre2);
        return $this->db->query($rqt);
    }

	public function changeCatego($idob,$catego){
		$rqt = "UPDATE objet set id_cat=%d where id_objet=%d";
        $rqt = sprintf($rqt,$catego,$idob);
        return $this->db->query($rqt);
	} 

    public function voirAllObj()
	{
		$rqt = "select m.id_membre,m.nom,m.prenom,o.id_objet,o.desciption,o.prix,p.nom as image from objet o
		join membres m on o.id_membre = m.id_membre
		join photo p on o.id_objet = p.id_objet";
		return $this->db->query($rqt);
	}

	public function allCatego()
	{
		$rqt = "select * from categorie";
		return $this->db->query($rqt);
	}
	public function allStat()
	{
		$arrray=array();
		$rqt = "select count(*) as nb from membres";
		$rqt2 = "select count(*) as nb from echange";

		$membre = $this->db->query($rqt);
		$user = $membre->result_array();

		$echange = $this->db->query($rqt2);
		$ech = $echange->result_array();
		
		$array['echange']=$user[0]['nb'];
		$array['membre']=$ech[0]['nb'];

		return $array;
	}
}
?>
