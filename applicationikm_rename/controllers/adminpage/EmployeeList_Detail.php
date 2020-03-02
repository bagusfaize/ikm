<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeList_Detail extends CI_Controller {

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
    }

	public function index()
	{
		redirect('adminpage/EmployeeList');
	}

	public function getDetail($uid)
	{
		$data['EmployeeDetailID'] = $uid;
		$this->load->model('adminpage/MEmployee');
		$EmployeeData = $this->MEmployee->get_employee_detail($uid);
		foreach($EmployeeData as $row)
		{
			$data['Idx'] = $row['idx'];
			$data['Jabatan'] = $row['jabatan'];
			$data['Nama'] = $row['nama'];
			$data['NIP'] = $row['nip'];
			$data['Alamat'] = $row['alamat'];
			$data['Tgl'] = $row['tgl'];
			$data['Telp'] = $row['telp'];
			$data['Email'] = $row['email'];
			$data['Pekerjaan'] = $row['pekerjaan'];
			$data['Instansi'] = $row['instansi'];
			$data['Kab'] = $row['kab'];
			$data['Kec'] = $row['kec'];
			$data['Des'] = $row['des'];
			$data['File'] = $row['file'];
			$data['Foto'] = $row['foto'];
		}
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/EmployeeList_Detail', $data);
		$this->load->view('adminpage/Footer');
	}

	public function update()
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

		$deletePath = str_replace("../",'./assets/', $filecolumn);
		//echo $deletePath;
		$x = ASSET_PATH.'foto_karyawan';
	    $config['upload_path'] = './assets/foto_karyawan';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['file_name'] = $idx."_".$nip;
	    $config['overwrite'] = true;
	    $config['max_size'] = 1024; // 1MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;
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
	        print_r($error);
		}
		else
		{
	        $upload_data = $this->upload->data();
	        $file_name = $upload_data['file_name'];
			$PhotoData = array(
				"file"=> '../foto_karyawan/'.$file_name
			);
			$this->MGlobal->updateFoto($foto, $PhotoData);
	    }

		$updateData = array(
			"jabatan"=> $jabatan,
			"nama"=> $nama,
			"nip"=> $nip,
			"alamat"=> $alamat,
			"tgl"=> $tgl,
			"telp"=> $telp,
			"email"=> $email,
			"pekerjaan"=> $pekerjaan,	
			"instansi"=> $instansi	
		);
		$EmployeeData = $this->MEmployee->get_employee_detail_update($idx, $updateData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di update!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/EmployeeList_Detail/getDetail/".$UsrID."';</script>";
		//redirect('adminpage/EmployeeList_Detail/getDetail/'.$UsrID);
	}

}
