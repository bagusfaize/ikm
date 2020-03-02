<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatusData extends CI_Controller {

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
		$this->load->model('user/MStatusData');
    }
	public function index()
	{
		$data['ControllersName'] = "StatusData";
		$data['StatusData'] = $this->MStatusData->get_statusData('girwan_lingga');	
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('user/Header');
		$this->load->view('user/StatusData', $data);
		$this->load->view('adminpage/Footer');
	}

	public function processStatus()
	{
		
	}
}
