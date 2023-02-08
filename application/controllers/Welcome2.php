<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome2 extends CI_Controller {

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
	}*/
	public function index()
	{
		$this->load->view('back1');	
	}
	
	public function __construct()
	{
		parent::__construct();
	}



    public function back1(){
		$data['info'] = $this->Requete2->voirAllObj();
		$data['catego'] = $this->Requete2->allCatego();
		$data['Stat'] = $this->Requete2->allStat();
		
		$this->load->view('header');
		$this->load->view('back1',$data);
		$this->load->view('footer');
	}

	public function modifCatego(){
		
		$idCat=$this->input->get("catego");
		$idob=$this->input->get("idObj");
		
	
		$this->Requete2->changeCatego($idob,$idCat)	;
		$data['info'] = $this->Requete2->voirAllObj();
		$data['catego'] = $this->Requete2->allCatego();
		$data['Stat'] = $this->Requete2->allStat();

		$this->load->view('header');
		$this->load->view('back1',$data);
		$this->load->view('footer');
	}

	












}