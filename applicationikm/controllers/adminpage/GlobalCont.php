<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GlobalCont extends CI_Controller {

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
		$this->load->model('adminpage/MGlobal');
    }
	public function index()
	{
		$this->load->model('adminpage/MEmployee');
		$data['EmployeeData'] = $this->MEmployee->get_employee();
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/EmployeeList', $data);
		$this->load->view('adminpage/Footer');
	}

	public function Kabupaten($kdkab, $kdkec)
	{		
		$CboKecamatan = $this->MGlobal->get_CboKec($kdkab);
		echo "<option value='0'>Pilih Kecamatan</option>";
		if($CboKecamatan != 0){
			foreach($CboKecamatan as $row)
			{
				$sel="";
				if($kdkec == $row['kdkec']){$sel ="selected"; }
				echo "<option value='".$row['kdkec']."' ".$sel.">".$row['kec']."</option>";
			}
		}
	}

	public function Kecamatan($kdkec, $kdkel)
	{		
		$CboKelurahan = $this->MGlobal->get_CboKel($kdkec, $kdkel);
		echo "<option value='0'>Pilih Kelurahan</option>";
		if($CboKelurahan != 0){
			foreach($CboKelurahan as $row)
			{
				$sel="";
				if($kdkel == $row['kddes']){$sel ="selected"; }else{ $sel="";}
				echo "<option value='".$row['kddes']."' ".$sel.">".$row['des']."</option>";
			}
		}
	}
	public function sessionRequired()
	{
		//echo "Session Worked!";
		//die();
	}
}
