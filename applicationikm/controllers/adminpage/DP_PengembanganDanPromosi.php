<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DP_PengembanganDanPromosi extends CI_Controller {

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

	
	public function PengembanganDanPromosi_Add()
	{
		$this->load->model('adminpage/MGlobal');		
		$dataIdx = $this->MGlobal->maxIDXPembinaan();
		foreach($dataIdx as $row)
		{
			$data['Idx'] = $row['idx']+1;
		}
		$data['cboPemerintah'] = $this->MGlobal->get_CboBox('pemerintahan');
		$data['cboSumberDana'] = $this->MGlobal->get_CboBox('sumber_dana');

		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/PengembanganDanPromosi_Add',$data);
		$this->load->view('adminpage/Footer');
	}
	
	
	public function index()
	{
		//$data['ProdukData'] = $this->MGlobal->get_table("pembinaan", "idx");
		$data['ProdukData'] = $this->MGlobal->get_table_pembinaan();
		
		$data['cbokatbah'] = $this->MGlobal->get_CboBox("katbah");
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/PengembanganDanPromosiList', $data);
		$this->load->view('adminpage/Footer');
    }
    
	public function insert()
	{
		
        $th_anggaran = $this->input->post('th_anggaran');
        $idx = $this->input->post('idx');
		$cboPemerintah = $this->input->post('cboPemerintah');
	    $nama = $this->input->post('nama');
		$tgl_mulai = $this->input->post('tgl_mulai');
		$tgl_selesai = $this->input->post('tgl_selesai');
		$jml_binaan = $this->input->post('jml_binaan');
		$lokasi = $this->input->post('lokasi');
		$cboSumberDana = $this->input->post('cboSumberDana');
		$penyelenggara = $this->input->post('penyelenggara');
		
		 
		 
        $insertData = array(
            "idx"=> $idx,
            "th_anggaran"=> $th_anggaran,
			"Pemerintahan"=> $cboPemerintah,
			"nama"=> $nama,
			"tgl_mulai"=> $tgl_mulai,
			"tgl_selesai"=> $tgl_selesai,
			"jml_binaan"=> $jml_binaan,
			"lokasi"=> $lokasi,
			"Sumber_Dana"=> $cboSumberDana,
			"penyelenggara"=> $penyelenggara
        );
            
		$tablename = "pembinaan";	
		$this->MGlobal->table_insert($tablename, $insertData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di tambahkan!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_PengembanganDanPromosi/';</script>";
    }
    
	public function getDetail($idx)
	{
		//$ProdukData = $this->MGlobal->get_table_where("dt_bhnbaku", $idx);
		$data['cboPemerintah'] = $this->MGlobal->get_CboBox('pemerintahan');
		$data['cboSumberDana'] = $this->MGlobal->get_CboBox('sumber_dana');
		
		
		$ProdukData = $this->MGlobal->get_table_pembinaan_where($idx); 
		foreach($ProdukData as $row)
		{
			$data['idx'] = $row['idx'];
			$data['th_anggaran'] = $row['th_anggaran'];
			$data['Pemerintah'] = $row['b'];
			$data['nama'] = $row['nama'];
			$data['tgl_mulai'] = $row['tgl_mulai'];
			$data['tgl_selesai'] = $row['tgl_selesai'];
			$data['jml_binaan'] = $row['jml_binaan'];
			$data['lokasi'] = $row['lokasi'];
			$data['Sumber_Dana'] = $row['arti'];
			$data['penyelenggara'] = $row['penyelenggara'];
			
        }

        $this->load->view('adminpage/Stylesheet');
        $this->load->view('adminpage/Header');
        $this->load->view('adminpage/PengembanganDanPromosi_Detail', $data);
        $this->load->view('adminpage/Footer');
    }
    
	public function update()
	{
		//$kategori = $this->input->post('CboKategori');
        $th_anggaran = $this->input->post('th_anggaran');
        $idx = $this->input->post('idx');
		//$Pemerintah = $this->input->post('Pemerintah');
		$cboPemerintah = $this->input->post('cboPemerintah');
	    $nama = $this->input->post('nama');
		$tgl_mulai = $this->input->post('tgl_mulai');
		$tgl_selesai = $this->input->post('tgl_selesai');
		$jml_binaan = $this->input->post('jml_binaan');
		$lokasi = $this->input->post('lokasi');
		//$Sumber_Dana = $this->input->post('Sumber_Dana');
		$cboSumberDana = $this->input->post('cboSumberDana');
		$penyelenggara = $this->input->post('penyelenggara');
		   
        $updateData = array(
            "idx"=> $idx,
            "th_anggaran"=> $th_anggaran,
			"Pemerintahan"=> $cboPemerintah,
			"nama"=> $nama,
			"tgl_mulai"=> $tgl_mulai,
			"tgl_selesai"=> $tgl_selesai,
			"jml_binaan"=> $jml_binaan,
			"lokasi"=> $lokasi,
			"Sumber_Dana"=> $cboSumberDana,
			"penyelenggara"=> $penyelenggara
           
        );

       $tablename = "pembinaan";
		$this->MGlobal->table_update($tablename, $idx, $updateData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di update!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_PengembanganDanPromosi';</script>";
    }
    
	public function Delete($idx)
	{
        $tablename = "pembinaan";
		$this->MGlobal->delete_data($idx, $tablename);
		echo "<script type='text/javascript'>alert('Data telah berhasil di hapus!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/DP_PengembanganDanPromosi';</script>";
	}
}
