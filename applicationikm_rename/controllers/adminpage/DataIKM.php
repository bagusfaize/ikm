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
	public function index()
	{
		$this->load->model('adminpage/MEmployee');
		$data['EmployeeData'] = $this->MEmployee->get_employee();
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/DataIKM', $data);
		$this->load->view('adminpage/Footer');
	}

	public function AddEmployee()
	{
		$this->load->model('adminpage/MGlobal');		
		$dataIdx = $this->MGlobal->maxIDXEmployee();
		foreach($dataIdx as $row)
		{
			$data['idxmax'] = $row['idx']+1;
		}
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/EmployeeList_Add',$data);
		$this->load->view('adminpage/Footer');
	}
}
