<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	/*public function _construct(){
		parent::_construct();
	}
	public function index()
	{
		$this->load->view('welcome_message');	
	}*/
	
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->accueil();
	}
	public function login()
	{
		$this->load->model('Requete');
		$nom = $this->input->post('nom');
		$mdp = $this->input->post('mdp');
		$data = $this->Requete->get_info();
		if($nom == "Admin" && $mdp == "admin"){
			$this->load->library('session');
			 $this->session->set_userdata('user',$row);
			return 2;
		}
		foreach ($data->result_array() as $row) {
 			if($row['nom'] == $nom && $row['mdp'] == $mdp){
 				$this->load->library('session');
 				$this->session->set_userdata('user',$row);
 				//$this->load->view('main');
 				return 1;
 			}
		} 
		return 0;
		//$dat['error'] = 'verifier votre compte';
 		//$this->load->view('Salama',$dat);
		//$this->load->view('Salama', $data);
	}

	public function main(){
		$id = $this->session->userdata('user')['id_membre'];
		$data['info'] = $this->Requete->voir_article($id);
		$this->load->view('loading',$data);
	}

	public function main1(){
		$id = $this->session->userdata('user')['id_membre'];
		$data['info'] = $this->Requete->voir_articleUser($id);
		$this->load->view('loading1',$data);
	}

	public function part1()
	{
		$id1 = $this->input->get('idUser');
		$id2 = $this->input->get('idEnLigne');
		$id3 = $this->input->get('objetViser');
		$id = $this->session->userdata('user')['id_membre'];
		$data['info'] = $this->Requete->voir_articleUser($id);
		$this->load->view('loading1',$data);
	}
	public function echanger()
	{
		$id1 = $this->input->get('o1');
		$id2 = $this->input->get('o2');
		$id3 = $this->input->get('m1');
		$id4 = $this->input->get('m2');

		$exec = $this->Requete->insert_echange($id1,$id2,$id3,$id4);
		$id = $this->session->userdata('user')['id_membre'];
		$data['info'] = $this->Requete->voir_article($id);
		$this->load->view('loading',$data);
	}
	public function accepter()
	{
		if($this->login() == 1)
		{
			$id = $this->session->userdata('user')['id_membre'];
			$data['info'] = $this->Requete->voir_article($id);
			$this->load->view('loading',$data);
		}else if($this->login() == 2){
			$id = $this->session->userdata('user')['id_membre'];
			$data['info'] = $this->Requete->voir_article($id);
			redirect('welcome2/back1',$data);

		}else{
			$dat['error'] = 'Verifier votre compte!!!';
			$this->load->view('Salama',$dat);
		}
	}
	public function accueil(){
		$this->load->view('Salama');	
	}

	public function deconexion()
	{
		$this->session->unset_userdata('user');
		redirect('Welcome/accueil');
	}
	
	public function inscription()
	{
		$mail = $this->input->post('mail');
		$nom = $this->input->post('nom');
		$mdp = $this->input->post('mdp');
		$dtn = $this->input->post('dtn');
		$data = $this->Requete->insert_membre($mail,$nom,$mdp,$dtn);
		$this->load->view('Salama');
	}

	
	public function listeArticle()
	{
		$id = $this->session->userdata('user')['id_membre'];
		$data['info'] = $this->Requete->voir_articleUser($id);
		$this->load->view('header');
		$this->load->view('objet',$data);
		$this->load->view('footer');
	}

	public function echange($action1=""){
		$id = $this->session->userdata('user')['id_membre'];
		if($action1==1){
			$data['data']=$this->Requete->EchangeForMe($id);
			$data['action']=$action1;
			$this->load->view('header');
			$this->load->view('Echange',$data);
			$this->load->view('footer');
		}
		if($action1==2){

			$data['data']=$this->Requete->EchangeByMe($id);
			$data['action']=$action1;
			$this->load->view('header');
			$this->load->view('Echange',$data);
			$this->load->view('footer');
		}
		
	}

	public function annuler($o1="",$o2=""){
		$id = $this->session->userdata('user')['id_membre'];
		$this->Requete->refuseEchange($o1,$o2);
		$data['data']=$this->Requete->EchangeByMe($id);
		$action['action']=2;
		$this->load->view('header');
		$this->load->view('Echange',$data,$action);
		$this->load->view('footer');
	}

	public function accepterEchange($o2="",$m1="",$o1="",$m2=""){
		$id = $this->session->userdata('user')['id_membre'];
		$this->Requete->accepteEchange($o1,$o2,$m1,$m2);
		$data['info']=$this->Requete->voir_articleUser($id);
		$this->load->view('header');
		$this->load->view('objet',$data);
		$this->load->view('footer');
	}
	 public function tantara()
	 {
	 	$data['info']=$this->Requete->historique();
		$this->load->view('header');
		$this->load->view('historique',$data);
		$this->load->view('footer');	
	 }
}
