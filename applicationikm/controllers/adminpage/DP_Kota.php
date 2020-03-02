<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DP_Kota extends CI_Controller {

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
        //require_once(APPPATH.'controllers/adminpage/GlobalCont.php'); //include controller
        //$GlobalContObj = new GlobalCont();  //create object 
        //$GlobalContObj->sessionRequired(); //call function
		$this->load->library('session');
		$alertMessage = "You Dont Have Access, Please try another login";
		if($this->session->userdata('uid') == "")
		{
			echo "<script type='text/javascript'>alert('".$alertMessage."');</script>";
			echo "<script type='text/javascript'>window.location.href = '" . base_url() . "Login';</script>";
		}
    }

	public function index()
	{
		$data['ProdukData'] = $this->MGlobal->get_table("dt_kota", "nama");
		$data['cbokatujas'] = $this->MGlobal->get_CboBox("katujas");
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/KotaList', $data);
		$this->load->view('adminpage/Footer');
    }
    
	public function insert()
	{
		$idx = $this->MGlobal->maxIDX("dt_kota");
		$kategori = $this->input->post('CboKategori');
        $nama = $this->input->post('produk');
        $tablename = "dt_kota";
        $insertData = array(
            "idx"=> $idx,
            "nama"=> $nama,
            "tujuan"=> $kategori
        );
            
		$this->MGlobal->table_insert($tablename, $insertData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di tambahkan!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Kota/';</script>";
    }
    
	public function getDetail($idx)
	{
		$ProdukData = $this->MGlobal->get_table_where("dt_kota", $idx);
		foreach($ProdukData as $row)
		{
			$data['idx'] = $row['idx'];
			$data['nama'] = $row['nama'];
			$data['tujuan'] = $row['tujuan'];
        }
        $data['kategoriProduk'] = array(
            "1"=> "Local",
            "2"=> "Nasional",
            "3"=> "Luar Negri",
        );
        $this->load->view('adminpage/Stylesheet');
        $this->load->view('adminpage/Header');
        $this->load->view('adminpage/Kota_Detail', $data);
        $this->load->view('adminpage/Footer');
    }
    
	public function update()
	{
		$kategori = $this->input->post('CboKategori');
        $nama = $this->input->post('nama');
        $idx = $this->input->post('idx');
        $tablename = "dt_kota";
        $updateData = array(
            "idx"=> $idx,
            "nama"=> $nama,
            "tujuan"=> $kategori
        );

        $tablename = "dt_kota";
		$this->MGlobal->table_update($tablename, $idx, $updateData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di update!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Kota';</script>";
    }
    
	public function Delete($idx)
	{
        $tablename = "dt_kota";
		$this->MGlobal->delete_data($idx, $tablename);
		echo "<script type='text/javascript'>alert('Data telah berhasil di hapus!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_Kota';</script>";
	}
}
