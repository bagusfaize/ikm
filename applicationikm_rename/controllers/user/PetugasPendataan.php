<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PetugasPendataan extends CI_Controller {

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
		$this->load->model('adminpage/MEmployee');
		$this->load->model('adminpage/MGlobal');
    }

	public function index()
	{
		$data['EmployeeData'] = $this->MEmployee->get_employee_oth();
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('user/PetugasList', $data);
		$this->load->view('adminpage/Footer');
	}

	public function getDetail($uid)
	{
		$data['EmployeeDetailID'] = $uid;
		$this->load->model('adminpage/MEmployee');
		$EmployeeData = $this->MEmployee->get_employee_detail($uid);
		$data['cboPetugasPendataan'] = $this->MGlobal->get_CboBox('wiltug');
		$data['cboKab'] = $this->MGlobal->get_CboDesa();
		foreach($EmployeeData as $row)
		{
			$data['Idx'] = $row['idx'];
			$data['Jabatan'] = $row['jabatan'];
			$data['Nama'] = $row['nama'];
			$data['NIP'] = $row['nip'];
			$data['Alamat'] = $row['alamat'];
			$data['Jk'] = $row['jk'];
			$data['Wilayah'] = $row['wilayah'];
			$data['Tgl'] = $row['tgl'];
			$data['tempat'] = $row['tempat'];
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
		$this->load->view('adminpage/Petugas_Detail', $data);
		$this->load->view('adminpage/Footer');
	}

	public function AddPetugas()
	{
		$this->load->model('adminpage/MGlobal');		
		$dataIdx = $this->MGlobal->maxIDXEmployee();
		foreach($dataIdx as $row)
		{
			$data['Idx'] = $row['idx']+1;
		}
		$data['cboPetugasPendataan'] = $this->MGlobal->get_CboBox('wiltug');
		$data['cboKab'] = $this->MGlobal->get_CboDesa();
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/Petugas_Add',$data);
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
		$wilayah = $this->input->post('cboPetugasPendataan');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$email = $this->input->post('email');
		$pekerjaan = $this->input->post('pekerjaan');
		$instansi = $this->input->post('instansi');
		$kab = $this->input->post('cboKab');
		$kec = $this->input->post('cboKec');
		$des = $this->input->post('cboKel');
		$tempat = $this->input->post('tempat');
		$tgl = $this->input->post('tgl');
		$jk = $this->input->post('cboJk');
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
			"nama"=> $nama,
			"alamat"=> $alamat,
			"tgl"=> $tgl,
			"telp"=> $telp,
			"email"=> $email,
			"pekerjaan"=> $pekerjaan,	
			"instansi"=> $instansi	,	
			"kab"=> $kab,	
			"kec"=> $kec,	
			"des"=> $des,
			"wilayah" => $wilayah,
			"tgl" => $tgl,
			"tempat" => $tempat,
			"jk" => $jk,
			"foto" => $idxmax,
			"oth" => "Petugas"
		);
		$EmployeeData = $this->MEmployee->get_employee_insert($insertData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di tambahkan!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/EmployeeList';</script>";
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
		$wilayah = $this->input->post('cboPetugasPendataan');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$email = $this->input->post('email');
		$pekerjaan = $this->input->post('pekerjaan');
		$instansi = $this->input->post('instansi');
		$kab = $this->input->post('cboKab');
		$kec = $this->input->post('cboKec');
		$des = $this->input->post('cboKel');
		$tempat = $this->input->post('tempat');
		$tgl = $this->input->post('tgl');
		$jk = $this->input->post('cboJk');
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
			"instansi"=> $instansi	,	
			"kab"=> $kab,	
			"kec"=> $kec,	
			"des"=> $des,
			"wilayah" => $wilayah,
			"tgl" => $tgl,
			"tempat" => $tempat,
			"jk" => $jk,
			"oth" => "Petugas"
		);
		$EmployeeData = $this->MEmployee->get_employee_detail_update($idx, $updateData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di update!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Petugas/getDetail/".$UsrID."';</script>";
		//redirect('adminpage/EmployeeList_Detail/getDetail/'.$UsrID);
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
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Petugas';</script>";
	}
}
