<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DP_Bantuan_Sertifikasi extends CI_Controller {

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

	public function Bantuan_Sertifikasi_Add()
	{
		$this->load->model('adminpage/MGlobal');		
		$dataIdx = $this->MGlobal->maxIDXsertifikasi();
		$x = 1;
		foreach($dataIdx as $row)
		{
			$x = 2;
			$data['Idx'] = $row['idx']+1;
		}
		if($x == 1)
		{
			$data['Idx'] = 1;
		}
		$data['cboPemerintah'] = $this->MGlobal->get_CboBox('pemerintahan');
		$data['cboSumberDana'] = $this->MGlobal->get_CboBox('sumber_dana');

		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/BantuanSertifikasi_Add',$data);
		$this->load->view('adminpage/Footer');
	}
	
	public function index()
	{
		//$data['ProdukData'] = $this->MGlobal->get_table("sertifikasi", "idx");
		$data['ProdukData'] = $this->MGlobal->get_table_sertifikasi();
		
		$data['cbokatbah'] = $this->MGlobal->get_CboBox("katbah");
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/BantuanSertifikasiList', $data);
		$this->load->view('adminpage/Footer');
    }
    
	public function insert()
	{
		//$idx = $this->MGlobal->maxIDX("dt_bhnbaku");
		$idx = $this->input->post('idx');
		$kategori = $this->input->post('CboKategori');
        $nama = $this->input->post('produk');
        $tablename = "sertifikasi";
        $insertData = array(
            "idx"=> $idx,
            "nama"=> $nama,
            "kategori"=> $kategori
        );
            
		$this->MGlobal->table_insert($tablename, $insertData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di tambahkan!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Bantuan_Sertifikasi/';</script>";
    }
    
	public function getDetail($idx)
	{
		//$ProdukData = $this->MGlobal->get_table_where("dt_bhnbaku", $idx);
		$data['cboPemerintah'] = $this->MGlobal->get_CboBox('pemerintahan');
		$data['cboSumberDana'] = $this->MGlobal->get_CboBox('sumber_dana');
		
		
		$ProdukData = $this->MGlobal->get_table_sertifikasi_where($idx); 
		foreach($ProdukData as $row)
		{
			$data['idx'] = $row['idx'];
			$data['th_anggaran'] = $row['th_anggaran'];
			$data['Pemerintah'] = $row['b'];
			$data['bentuk'] = $row['bentuk'];
			$data['penyelenggara'] = $row['penyelenggara'];
			$data['namaKegiatan'] = $row['namaKegiatan'];
			$data['tanggalPenyerahan'] = $row['tanggalPenyerahan'];
			$data['jumlahPenerima'] = $row['jumlahPenerima'];
			$data['deskripsi'] = $row['deskripsi'];
			$data['Dtl'] = $row['deskripsi'];
			
			
        }
		
        $this->load->view('adminpage/Stylesheet');
        $this->load->view('adminpage/Header');
        $this->load->view('adminpage/BantuanSertifikasi_Detail', $data);
        $this->load->view('adminpage/Footer');
    }
    
	public function update()
	{
		$kategori = $this->input->post('CboKategori');
        $nama = $this->input->post('nama');
        $idx = $this->input->post('idx');
        $tablename = "dt_bhnbaku";
        $updateData = array(
            "idx"=> $idx,
            "nama"=> $nama,
            "kategori"=> $kategori
        );

        $tablename = "dt_bhnbaku";
		$this->MGlobal->table_update($tablename, $idx, $updateData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di update!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Bantuan_Sertifikasi';</script>";
    }
    
	public function Delete($idx)
	{
        $tablename = "sertifikasi";
		$this->MGlobal->delete_data($idx, $tablename);
		echo "<script type='text/javascript'>alert('Data telah berhasil di hapus!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Bantuan_Sertifikasi';</script>";
	}
}
