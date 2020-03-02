<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataIKM extends CI_Controller {

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
    public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
		$alertMessage = "You Dont Have Access, Please try another login";
		if($this->session->userdata('uid') == "")
		{
			echo "<script type='text/javascript'>alert('".$alertMessage."');</script>";
			echo "<script type='text/javascript'>window.location.href = '" . base_url() . "Login';</script>";
		}
    }
	
	public function index()
	{
		$this->load->model('adminpage/MDataIKM');
		$data['IKMData'] = $this->MDataIKM->get_dataDatabase('ikm');
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/DataIKM', $data);
		$this->load->view('adminpage/Footer');
	}
}
