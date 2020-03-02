<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DP_Peserta_Binaan extends CI_Controller {

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
		$this->load->model('adminpage/MGlobal');
        require_once(APPPATH.'controllers/adminpage/GlobalCont.php'); //include controller
        $GlobalContObj = new GlobalCont();  //create object 
        $GlobalContObj->sessionRequired(); //call function
		$this->load->model('adminpage/MPeserta');
    }

	public function PembinaanPeserta_Add()
	{
		$this->load->model('adminpage/MGlobal');		
		$dataIdx = $this->MGlobal->maxIDXPeserta();
		foreach($dataIdx as $row)
		{
			$data['Idx'] = $row['idx']+1;
		}
		$data['cboStatusPeserta'] = $this->MGlobal->get_CboBox('status_peserta');
		$data['cboKab'] = $this->MGlobal->get_CboDesa();
		$data['cboPembinaan'] = $this->MGlobal->get_CboBoxPeserta();
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/PembinaanPeserta_Add',$data);
		$this->load->view('adminpage/Footer');
	}
	
	public function index()
	{	
		$data['cboKab'] = $this->MGlobal->get_CboDesa();

		$data['ProdukData'] = $this->MGlobal->get_table_Peserta();
		
		//$data['ProdukData'] =$this->MPeserta->get_employee_oth();
		
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/PembinaanList', $data);
		$this->load->view('adminpage/Footer');
    }
    
	public function insert()
	{
		$this->load->model('adminpage/MEmployee');
		$this->load->model('adminpage/MGlobal');
		$idx = $this->input->post('idx');
		$nama = $this->input->post('nama');
		$cboStatusPeserta = $this->input->post('cboStatusPeserta');
		$kab = $this->input->post('cboKab');
		$kec = $this->input->post('cboKec');
		$des = $this->input->post('cboKel');
		$jalan = $this->input->post('jalan');
		$telp = $this->input->post('telp');
		$pembinaan = $this->input->post('cboPembinaan');
		
		$foto = $this->input->post('foto');
		/*$filecolumn = $this->input->post('filecolumn');
		$config['upload_path'] = './assets/foto_karyawan';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['file_name'] = $idx."_".$nip;
	    $config['overwrite'] = true;
	    $config['max_size'] = 1024; // 1MB
	  
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
	    }*/

		 $tablename = "peserta";
		$insertData = array(
			"idx"=> $idx,
			"nama"=> $nama,
			"st_peserta"=> $cboStatusPeserta,
			"kab_p"=> $kab	,
			"kec_p"=> $kec,	
			"des_p"=> $des,
			"jl_p"=> $jalan,
			"telp"=> $telp,
			"idpembinaan"=> $pembinaan,
			"foto" => $idxmax
			//
			
			//"email"=> $email,
			//"pekerjaan"=> $pekerjaan,	
			//"instansi"=> $instansi	,	
			
			//"wilayah" => $wilayah,
			//"tgl" => $tgl,
			//"tempat" => $tempat,
			//"jk" => $jk,
			//
			//"oth" => "Petugas"
		);
		$this->MGlobal->table_insert($tablename, $insertData);
		//$error = $this->upload->display_errors();
	   // print_r($insertDat);
		//$EmployeeData = $this->MEmployee->get_employee_insert_Peserta($insertData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di tambahkan!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Peserta_Binaan';</script>";
    }
    
	public function getDetail($idx)
	{
		//$ProdukData = $this->MGlobal->get_table_where("peserta", $idx);
		//$ProdukData1 = $this->MGlobal->get_table_where("kd_desa", $idx);
		
		
		//$data['cboStatusPeserta'] = $this->MGlobal->get_CboBox('status_peserta');
		$ProdukData=$this->MGlobal->get_table_Peserta_where($idx);
		$data['cboStatusPeserta'] = $this->MGlobal->get_CboBox('status_peserta');
		$data['cboKab'] = $this->MGlobal->get_CboDesa();
		$data['cboPembinaan'] = $this->MGlobal->get_CboBoxPeserta();
		
		foreach($ProdukData as $row)
		{
			$data['idx'] = $row['idx'];
			$data['nama'] = $row['nama'];
			$data['arti'] = $row['arti'];
		
			$data['Kab'] = $row['kab_p'];
			$data['Kec'] = $row['kec_p'];
			$data['Des'] = $row['des_p'];
			$data['jl_p'] = $row['jl_p'];
			$data['telp'] = $row['telp'];
			$data['st_peserta'] = $row['st_peserta'];
			$data['idpembinaan'] = $row['idpembinaan'];
			//$data['file'] = $row['file'];
        }
       
        $this->load->view('adminpage/Stylesheet');
        $this->load->view('adminpage/Header');
        $this->load->view('adminpage/Pembinaan_Detail', $data);
        $this->load->view('adminpage/Footer');
    }
    
	public function update()
	{
		$this->load->model('adminpage/MEmployee');
		$this->load->model('adminpage/MGlobal');
		$idx = $this->input->post('idx');
		$nama = $this->input->post('nama');
		$cboStatusPeserta = $this->input->post('cboStatusPeserta');
		$kab = $this->input->post('cboKab');
		$kec = $this->input->post('cboKec');
		$des = $this->input->post('cboKel');
		$jalan = $this->input->post('jl');
		$telp = $this->input->post('telp');
		$pembinaan = $this->input->post('cboPembinaan');
		/*
		$foto = $this->input->post('foto');
		$filecolumn = $this->input->post('filecolumn');
		$config['upload_path'] = './assets/foto_karyawan';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['file_name'] = $idx."_".$nip;
	    $config['overwrite'] = true;
	    $config['max_size'] = 1024; // 1MB
	  
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
	    }*/

		 $tablename = "peserta";
		$updateData = array(
			"idx"=> $idx,
			"nama"=> $nama,
			"st_peserta"=> $cboStatusPeserta,
			"kab_p"=> $kab	,
			"kec_p"=> $kec,	
			"des_p"=> $des,
			"jl_p"=> $jalan,
			"telp"=> $telp,
			"idpembinaan"=> $pembinaan,
			//"foto" => $idxmax
			//
			
			//"email"=> $email,
			//"pekerjaan"=> $pekerjaan,	
			//"instansi"=> $instansi	,	
			
			//"wilayah" => $wilayah,
			//"tgl" => $tgl,
			//"tempat" => $tempat,
			//"jk" => $jk,
			//
			//"oth" => "Petugas"
		);
		$this->MGlobal->table_update($tablename,$idx, $updateData);
		//$error = $this->upload->display_errors();
	   // print_r($insertDat);
		//$EmployeeData = $this->MEmployee->get_employee_insert_Peserta($insertData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di tambahkan!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Peserta_Binaan';</script>";
    }
    
	public function Delete($idx)
	{
        $tablename = "peserta";
		$this->MGlobal->delete_data($idx, $tablename);
		echo "<script type='text/javascript'>alert('Data telah berhasil di hapus!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Peserta_Binaan';</script>";
	}
}
