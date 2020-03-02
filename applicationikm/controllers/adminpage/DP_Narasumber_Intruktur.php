<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DP_Narasumber_Intruktur extends CI_Controller {

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
    }

	public function NarasumberDanIntruktur_Add()
	{
		$this->load->model('adminpage/MGlobal');		
		$dataIdx = $this->MGlobal->maxIDXNarasumber();
		foreach($dataIdx as $row)
		{
			$data['Idx'] = $row['idx']+1;
		}
		$data['cboStatusNarasumber'] = $this->MGlobal->get_CboBox('status_pegawai');

		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/NarasumberDanIntruktur_Add',$data);
		$this->load->view('adminpage/Footer');
	}
	
	public function index()
	{
		//$data['ProdukData'] = $this->MGlobal->get_table("narasumber", "idx");
		$data['ProdukData'] = $this->MGlobal->get_table_Narasumber();
		
	//	$data['cbokatbah'] = $this->MGlobal->get_CboBox("katbah");
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/NarasumberDanIntrukturList', $data);
		$this->load->view('adminpage/Footer');
    }
    
	public function insert()
	{
		
		$idx = $this->input->post('idx');
        $nama = $this->input->post('nama');
		$cboStatusNarasumber = $this->input->post('cboStatusNarasumber');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$Intansi = $this->input->post('Intansi');
		$foto = $this->input->post('foto');
		
        $tablename = "narasumber";
        $insertData = array(
            "idx"=> $idx,
            "nama"=> $nama,
            "status"=> $cboStatusNarasumber,
			"alamat_rumah"=> $alamat,
			 "telp_rumah"=> $telp, 
			 "instansi"=> $Intansi
        );
            
		$this->MGlobal->table_insert($tablename, $insertData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di tambahkan!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Narasumber_Intruktur/';</script>";
    }
    
	public function getDetail($idx)
	{
		$data['cboStatusNarasumber'] = $this->MGlobal->get_CboBox('status_pegawai');
		$ProdukData = $this->MGlobal->get_table_where("narasumber", $idx);
		foreach($ProdukData as $row)
		{
			$data['idx'] = $row['idx'];
			$data['nama'] = $row['nama'];
			$data['alamat_rumah'] = $row['alamat_rumah'];
			$data['telp_rumah'] = $row['telp_rumah'];
			$data['instansi'] = $row['instansi'];
			
        }
        $this->load->view('adminpage/Stylesheet');
        $this->load->view('adminpage/Header');
        $this->load->view('adminpage/NarasumberDanIntruktur_Detail', $data);
       $this->load->view('adminpage/Footer');
    }
    
	public function update()
	{
		
        $idx = $this->input->post('idx');
        $nama = $this->input->post('nama');
		$cboStatusNarasumber = $this->input->post('cboStatusNarasumber');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$Intansi = $this->input->post('Intansi');
		
        $tablename = "narasumber";
        $updateData = array(
            "idx"=> $idx,
            "nama"=> $nama,
            "status"=> $cboStatusNarasumber,
			"alamat_rumah"=> $alamat,
			 "telp_rumah"=> $telp, 
			 "instansi"=> $Intansi,
        );

        $tablename = "narasumber";
		$this->MGlobal->table_update($tablename, $idx, $updateData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di update!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Narasumber_Intruktur';</script>";
    }
    
	public function Delete($idx)
	{
        $tablename = "narasumber";
		$this->MGlobal->delete_data($idx, $tablename);
		echo "<script type='text/javascript'>alert('Data telah berhasil di hapus!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Narasumber_Intruktur';</script>";
	}
}
