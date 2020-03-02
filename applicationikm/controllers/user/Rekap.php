<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

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
        $this->load->helper(array('form', 'url', 'file'));
		$this->load->model('user/MRekapData');
    }
	public function index()
	{
		$data['ControllersName'] = "RekapData";
		$data['RekapData'] = $this->MRekapData->get_rekapData();	
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('user/Header');
		$this->load->view('user/RekapData', $data);
		$this->load->view('adminpage/Footer');
	}

	public function insertTPDF()
	{
		$TPDF = $this->input->post('editor');
		$updateData = array(
			"isi"=> $TPDF
		);
		$EmployeeData = $this->MProfile->update_TPDF(3, $updateData);
	}
}
