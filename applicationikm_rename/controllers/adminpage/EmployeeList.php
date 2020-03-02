<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeList extends CI_Controller {

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
		$this->load->view('adminpage/EmployeeList', $data);
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

	public function insert()
	{
		$this->load->model('adminpage/MEmployee');
		$this->load->model('adminpage/MGlobal');
		$UsrID = $this->input->post('UsrID');
		$idx = $this->input->post('idx');
		$jabatan = $this->input->post('jabatan');
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');
		$alamat = $this->input->post('alamat');
		$tgl = $this->input->post('tgl');
		$telp = $this->input->post('telp');
		$email = $this->input->post('email');
		$pekerjaan = $this->input->post('pekerjaan');
		$instansi = $this->input->post('instansi');
		$foto = $this->input->post('foto');
		$filecolumn = $this->input->post('filecolumn');
		$config['upload_path'] = './assets/foto_karyawan';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['file_name'] = $idx."_".$nip;
	    $config['overwrite'] = true;
	    $config['max_size'] = 1024; // 1MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;

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
			$dataIdxFile = $this->MGlobal->maxIDXFile();
			foreach($dataIdxFile as $row)
			{
				$idxmax = $row['idx']+1;
			}
			$PhotoData = array(
				"idx"=> $idxmax,
				"file"=> '../foto_karyawan/'.$file_name
			);
			$this->MGlobal->InsertFoto($PhotoData);
	        //print_r($upload_data);
	    }

		$insertData = array(
			"idx"=> $idx,
			"uid"=> str_replace(" ",'', $UsrID),
			"jabatan"=> $jabatan,
			"nama"=> $nama,
			"nip"=> $nip,
			"alamat"=> $alamat,
			"tgl"=> $tgl,
			"telp"=> $telp,
			"email"=> $email,
			"pekerjaan"=> $pekerjaan,	
			"instansi"=> $instansi,
			"oth"=> "Pegawai",
			"foto" => $idxmax
		);
		$EmployeeData = $this->MEmployee->get_employee_insert($insertData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di tambahkan!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/EmployeeList';</script>";
	}

	public function Delete($idx)
	{
		$this->load->model('adminpage/MEmployee');
		$this->load->model('adminpage/MGlobal');
		$EmployeeData = $this->MEmployee->get_employee_detailByIDX($idx);
		foreach($EmployeeData as $row)
		{
			$dataFile = $row['file'];
			$idxFoto = $row['foto'];
		}
		$deletePath = str_replace("../",'./assets/', $dataFile);
		unlink($deletePath);
		$this->MEmployee->delete_employee($idx);
		$this->MGlobal->delete_Foto($idxFoto);
		echo "<script type='text/javascript'>alert('Data telah berhasil di hapus!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/EmployeeList';</script>";
	}
}
