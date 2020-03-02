<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model('MGlobal');
		$this->load->library('session');
	}
	public function index()
	{
		$this->load->view('Stylesheet');
		$this->load->view('Login');
	}

	public function Validation()
	{
		$ikmUser = $this->input->post('ikmUser');
		$ikmPassword = $this->input->post('ikmPassword');
		$userValidation = $this->MGlobal->checkValidation($ikmUser, $ikmPassword);
		$validation = 0;
		foreach($userValidation as $row)
		{
			$uid = $row['uid'];
			$nama = $row['nama'];
			$oth = $row['oth'];
			$jabatan = $row['jabatan'];
			$nip = $row['nip'];
			$validation = 1;
		}
		if($ikmUser == "" || $ikmPassword == "")
		{
			echo "<script type='text/javascript'>alert('Please input User And Password!');</script>";
			echo "<script type='text/javascript'>window.location.href = '" . base_url() . "Login';</script>";
		}
		if($validation == 1)
		{
			$sessdata = array(
			'uid' => $uid,
			'nama' => $nama,
			'oth' => $oth,
			'jabatan' => $jabatan,
			'nip' => $nip);
			$this->session->set_userdata($sessdata);
			if($oth == 'Admin')
			{
				echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DataIKM';</script>";
			}
			else if($oth == 'Petugas')
			{
				
			}else if($oth == 'Pegawai')
			{
				
			}
		}
		else
		{
			echo "<script type='text/javascript'>alert('Wrong Password, Please Try Again!');</script>";
			echo "<script type='text/javascript'>window.location.href = '" . base_url() . "Login';</script>";
		}
	}
	
	public function Logout()
	{
		$this->session->sess_destroy();
		echo "<script type='text/javascript'>alert('You have been log out!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "Login';</script>";
	}
}
