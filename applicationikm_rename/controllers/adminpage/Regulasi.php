<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regulasi extends CI_Controller {

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
		$this->load->model('adminpage/MRegulasi');
    }

	public function index()
	{
		$data['RegulasiData'] = $this->MRegulasi->get_regulation(100);
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/RegulasiList', $data);
		$this->load->view('adminpage/Footer');
	}

	public function getDetail($idx)
	{
		$RegulasiData = $this->MRegulasi->get_regulasi_detail($idx);
		$data['kdjenis'] = $this->MGlobal->get_CboBox('uujenis');
		foreach($RegulasiData as $row)
		{
			$data['idx'] = $row['idx'];
			$data['kodeJenis'] = $row['jenis'];
			$data['judul'] = $row['judul'];
			$data['nomer'] = $row['nomer'];
			$data['tentang'] = $row['tentang'];
			$data['tahun'] = $row['tahun'];
			$data['foto'] = $row['foto'];
			$data['file'] = $row['file'];
		}
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/RegulasiDetail', $data);
		$this->load->view('adminpage/Footer');
	}

	public function update()
	{
		$idx = $this->input->post('idx');
		$kodeJenis = $this->input->post('kodeJenis');
		$judul = $this->input->post('judul');
		$nomer = $this->input->post('nomer');
		$tentang = $this->input->post('tentang');
		$tahun = $this->input->post('tahun');
		$foto = $this->input->post('foto');
		$file = $this->input->post('file');

		$deletePath = str_replace("../",'./assets/', $file);
	    $config['upload_path'] = './assets/file_regulasi';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
	    $config['file_name'] = $idx."_regulasi";
	    $config['overwrite'] = true;
	    $config['max_size'] = 40000; // 40MB
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
				"file"=> '../file_regulasi/'.$file_name
			);
			if($foto != "")
			{
				$fotoidx = $foto;
				$this->MGlobal->updateFoto($fotoidx, $PhotoData);
			}else
			{
				$maxFile = $this->MGlobal->maxIDXFile();
				foreach($maxFile as $row)
				{
					$fotoidx = $row['idx']+1;
				}
				$insertData = array(
					"idx" => $fotoidx,
					"file"=> '../file_regulasi/'.$file_name
				);
				$this->MGlobal->InsertFoto($insertData);
			}
	    }

		$updateData = array(
			"idx"=> $idx,
			"jenis"=> $kodeJenis,
			"judul"=> $judul,
			"nomer"=> $nomer,
			"tentang"=> $tentang,
			"tahun"=> $tahun,
			"foto" => $fotoidx
		);
		$this->MRegulasi->regulasi_update($idx, $updateData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di update!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/Regulasi/getDetail/".$idx."';</script>";
	}

	public function AddRegulasi()
	{
		$data['kdjenis'] = $this->MGlobal->get_CboBox('uujenis');
		$data['idx'] = $this->MGlobal->maxIDX('regulasi');
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/RegulasiAdd', $data);
		$this->load->view('adminpage/Footer');
	}

	public function insert()
	{
		$idx = $this->input->post('idx');
		$kodeJenis = $this->input->post('kodeJenis');
		$judul = $this->input->post('judul');
		$nomer = $this->input->post('nomer');
		$tentang = $this->input->post('tentang');
		$tahun = $this->input->post('tahun');
		$fotoidx = "";

	    $config['upload_path'] = './assets/file_regulasi';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
	    $config['file_name'] = $idx."_regulasi";
	    $config['overwrite'] = true;
	    $config['max_size'] = 40000; // 40MB
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
				"file"=> '../file_regulasi/'.$file_name
			);
			if($foto != "")
			{
				$fotoidx = $foto;
				$this->MGlobal->updateFoto($fotoidx, $PhotoData);
			}else
			{
				$maxFile = $this->MGlobal->maxIDXFile();
				foreach($maxFile as $row)
				{
					$fotoidx = $row['idx']+1;
				}
				$insertData = array(
					"idx" => $fotoidx,
					"file"=> '../file_regulasi/'.$file_name
				);
				$this->MGlobal->InsertFoto($insertData);
			}
	    }
	    if($fotoidx!="")
	    {
			$insertData = array(
				"idx"=> $idx,
				"jenis"=> $kodeJenis,
				"judul"=> $judul,
				"nomer"=> $nomer,
				"tentang"=> $tentang,
				"tahun"=> $tahun,
				"foto" => $fotoidx
			);
		}else
		{
			$insertData = array(
				"idx"=> $idx,
				"jenis"=> $kodeJenis,
				"judul"=> $judul,
				"nomer"=> $nomer,
				"tentang"=> $tentang,
				"tahun"=> $tahun
			);
		}
		$this->MRegulasi->regulasi_insert($insertData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di tambahkan!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/Regulasi/';</script>";
	}
	public function Delete($idx)
	{
		$RegulasiData = $this->MRegulasi->get_regulasi_detail($idx);
		foreach($RegulasiData as $row)
		{
			$dataFile = $row['file'];
			$idxFoto = $row['foto'];
		}
		$deletePath = str_replace("../",'./assets/', $dataFile);
		unlink($deletePath);
		$this->MRegulasi->delete_regulasi($idx);
		$this->MGlobal->delete_Foto($idxFoto);
		echo "<script type='text/javascript'>alert('Data telah berhasil di hapus!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/Regulasi';</script>";
	}
}
