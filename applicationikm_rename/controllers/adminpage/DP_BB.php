<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DP_BB extends CI_Controller {

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

	public function index()
	{
		$data['ProdukData'] = $this->MGlobal->get_table("dt_bhnbakar", "nama");
	
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/BBList', $data);
		$this->load->view('adminpage/Footer');
    }
    
	public function insert()
	{
		$idx = $this->MGlobal->maxIDX("dt_bhnbakar");
		$kategori = $this->input->post('CboKategori');
        $nama = $this->input->post('produk');
        $tablename = "dt_bhnbaku";
        $insertData = array(
            "idx"=> $idx,
            "nama"=> $nama,
            "kategori"=> $kategori
        );
            
		$this->MGlobal->table_insert($tablename, $insertData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di tambahkan!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Bahan_Baku/';</script>";
    }
    
	public function getDetail($idx)
	{
		$ProdukData = $this->MGlobal->get_table_where("dt_bhnbakar", $idx);
		foreach($ProdukData as $row)
		{
			$data['idx'] = $row['idx'];
			$data['nama'] = $row['nama'];
			$data['kategori'] = $row['kategori'];
        }
        $data['kategoriProduk'] = array(
            "1"=> "Komoditas Pertanian dan Olahannya",
            "2"=> "Komoditas Kehutanan dan Olahannya",
            "3"=> "Komoditas Perikanan dan Olahannya",
            "4"=> "Komoditas Peternakan dan Olahannya",
            "5"=> "Komoditas Tambang dan Olahannya",
            "6"=> "Kimia dan Lainnya",
            
        );
        $this->load->view('adminpage/Stylesheet');
        $this->load->view('adminpage/Header');
        $this->load->view('adminpage/BahanBaku_Detail', $data);
        $this->load->view('adminpage/Footer');
    }
    
	public function update()
	{
		$kategori = $this->input->post('CboKategori');
        $nama = $this->input->post('nama');
        $idx = $this->input->post('idx');
        $tablename = "dt_bhnbakar";
        $updateData = array(
            "idx"=> $idx,
            "nama"=> $nama,
            "kategori"=> $kategori
        );

        $tablename = "dt_bhnbakar";
		$this->MGlobal->table_update($tablename, $idx, $updateData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di update!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Bahan_Baku';</script>";
    }
    
	public function Delete($idx)
	{
        $tablename = "dt_bhnbakar";
		$this->MGlobal->delete_data($idx, $tablename);
		echo "<script type='text/javascript'>alert('Data telah berhasil di hapus!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Bahan_Baku';</script>";
	}
}
