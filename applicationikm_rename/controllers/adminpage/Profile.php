<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
		$this->load->model('adminpage/MProfile');
		$this->load->model('adminpage/MGlobal');
    }
	public function index()
	{
		$data['ControllersName'] = "Profile";
		$this->load->view("NotFound", $data);
	}

	public function TPDF()
	{
		$TPDFData = $this->MProfile->get_tpdf();
		foreach($TPDFData as $row)
		{
			$data['tupoksi'] = $row['isi'];
		}
		$this->load->view('adminpage/CkeditorStyle');
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/TPDF', $data);
		$this->load->view('adminpage/FooterEditor');
	}

	public function insertTPDF()
	{
		$TPDF = $this->input->post('editor');
		$updateData = array(
			"isi"=> $TPDF
		);
		$EmployeeData = $this->MProfile->update_TPDF(3, $updateData);
	}
	public function StrukturOrg()
	{
		$imageStruktur = $this->MGlobal->get_image(2);
		foreach($imageStruktur as $row)
		{
			$data['idx'] = $row['idx'];
			$data['image'] = $row['file'];
		}
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/StrukturOrg', $data);
		$this->load->view('adminpage/Footer');
	}

	public function insertStrukturOrg()
	{
		$idx = $this->input->post('idx');
		$filecolumn = $this->input->post('filecolumn');
		$deletePath = str_replace("../",'./assets/', $filecolumn);

	    $config['upload_path'] = './assets/uploads';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['file_name'] = $idx."_".date("Ymd");
	    $config['overwrite'] = true;
	    $config['max_size'] = 1024; // 1MB

	    if (!empty($_FILES["fileimage"]["name"])) {
			if (file_exists($deletePath)) 
			{
				unlink($deletePath);
			}
		}

	     $this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('fileimage'))
		{
	        $error = $this->upload->display_errors();
	        //print_r($error);
		}
		else
		{
	        $upload_data = $this->upload->data();
	        $file_name = $upload_data['file_name'];
			$PhotoData = array(
				"file"=> '../uploads/'.$file_name
			);
			$this->MGlobal->updateFoto($idx, $PhotoData);
	    }
		echo "<script type='text/javascript'>alert('Data telah berhasil di update!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/Profile/StrukturOrg';</script>";
	}

	public function EmployeeList()
	{
		$this->load->model('adminpage/MEmployee');
		$data['EmployeeData'] = $this->MEmployee->get_employee();
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/EmployeeList', $data);
		$this->load->view('adminpage/Footer');
	}

	public function Logo()
	{
		$this->load->model('adminpage/MProfile');
		$data['TPDFData'] = $this->MProfile->get_tpdf();
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/StrukturOrg', $data);
		$this->load->view('adminpage/Footer');
	}
}
