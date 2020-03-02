<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

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
		$this->load->model('adminpage/MBerita');
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
		$data['BeritaData'] = $this->MBerita->get_dataBerita(1);		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/BeritaList', $data);
		$this->load->view('adminpage/Footer');
    }
    
	public function AddBerita()
	{			
		$this->load->view('adminpage/CkeditorStyle');
        $this->load->view('adminpage/Stylesheet');
        $this->load->view('adminpage/Header');
        $this->load->view('adminpage/BeritaAdd');
		$this->load->view('adminpage/FooterEditor');
	}

	public function insert()
	{
		$idx = $this->MGlobal->maxIDX("berita");
		$judul = $this->input->post('judul');
		$uraian = $this->input->post('editor');
		$penulis = $this->input->post('penulis');
		$lokasi = $this->input->post('lokasi');
		$idxfile = $this->input->post('idxfile');
		

		$config['upload_path'] = './assets/uploads';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['file_name'] = "berita_".$idx;
	    $config['overwrite'] = true;
	    $config['max_size'] = 1024; // 1MB
	    $this->load->library('upload');
		$this->upload->initialize($config);
		
		$this->load->library('upload');
		$this->upload->initialize($config);
	   if ( ! $this->upload->do_upload('fileimage'))
	   {
		   $error = $this->upload->display_errors();
		   print_r($error);
	   }else{
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
			$dataIdxFile = $this->MGlobal->maxIDXFile();
			foreach($dataIdxFile as $row)
			{
				$idxmax = $row['idx']+1;
			}
			$PhotoData = array(
				"idx"=> $idxmax,
				"file"=> '../uploads/'.$file_name
			);
			$this->MGlobal->InsertFoto($PhotoData);
			$idxfile = $idxmax;
		}

		$tablename = "berita";		
        $insertData = array(
            "idx"=> $idx,
            "judul"=> $judul,
            "uraian"=> $uraian,
            "penulis"=> $penulis,
            "lokasi"=> $lokasi,
            "tipe"=> 1,
            "uid"=> $this->session->userdata('uid'),
            "tanggal"=> date('d'),
            "bulan"=> date('m'),
            "tahun"=> date('Y'),
            "hari"=> date('D'),
            "jam"=> date('H:i'),
            "foto" => $idxfile
		);
		
		//echo '<pre>';
		//print_r($insertData);
		//echo '</pre>';
		$this->MGlobal->table_insert($tablename, $insertData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di tambahkan!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/Berita/';</script>";
    }
    
	public function getDetail($idx)
	{		
		$BeritaData = $this->MBerita->get_detaildataBerita($idx);
		foreach($BeritaData as $row)
		{
			$data['idx'] = $row['idx'];
            $data['judul'] = $row['judul'];
            $data['uraian'] = $row['uraian'];
            $data['lokasi'] = $row['lokasi'];
            $data['penulis'] = $row['penulis'];
            $data['idxfile']  = $row['idxfile'];
            $data['filecolumn']  = $row['filecolumn'];
        }
		$this->load->view('adminpage/CkeditorStyle');
        $this->load->view('adminpage/Stylesheet');
        $this->load->view('adminpage/Header');
        $this->load->view('adminpage/BeritaDetail', $data);
		$this->load->view('adminpage/FooterEditor');
    }
	
	
	public function update()
	{
		$idx = $this->input->post('idx');
		$judul = $this->input->post('judul');
		$uraian = $this->input->post('editor');
		$penulis = $this->input->post('penulis');
		$lokasi = $this->input->post('lokasi');
		$idxfile = $this->input->post('idxfile');
		$filecolumn = $this->input->post('filecolumn');

		$deletePath = str_replace("../",'./assets/', $filecolumn);
		//echo $deletePath;
		$x = ASSET_PATH.'foto_karyawan';
	    $config['upload_path'] = './assets/uploads';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['file_name'] = "berita_".$idx;
	    $config['overwrite'] = true;
	    $config['max_size'] = 1024; // 1MB
	    // $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		if($idxfile == "")
		{			
			$this->load->library('upload');
			$this->upload->initialize($config);
		   if ( ! $this->upload->do_upload('fileimage'))
		   {
			   $error = $this->upload->display_errors();
			   print_r($error);
		   }else{
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
				$dataIdxFile = $this->MGlobal->maxIDXFile();
				foreach($dataIdxFile as $row)
				{
					$idxmax = $row['idx']+1;
				}
				$PhotoData = array(
					"idx"=> $idxmax,
					"file"=> '../uploads/'.$file_name
				);
				$this->MGlobal->InsertFoto($PhotoData);
				$idxfile = $idxmax;
			}
		}else{
			if (!empty($_FILES["fileimage"]["name"])) {
				if (file_exists($deletePath)) 
				{
					unlink($deletePath);
				}
			}
			//$this->load->library('upload', $config);
			$this->load->library('upload');
			$this->upload->initialize($config);
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
					"file"=> '../uploads/'.$file_name
				);
				$this->MGlobal->updateFoto($idxfile, $PhotoData);
			}
		}
        $updateData = array(
            "idx"=> $idx,
            "judul"=> $judul,
            "uraian"=> $uraian,
            "penulis"=> $penulis,
            "lokasi"=> $lokasi,
            "uid"=> $this->session->userdata('uid'),
            "tanggal"=> date('d'),
            "bulan"=> date('m'),
            "tahun"=> date('Y'),
            "hari"=> date('D'),
            "jam"=> date('H:i'),
            "foto" => $idxfile
        );

		$tablename = "berita";
		//echo '<pre>';
		//print_r($updateData);
		//echo '</pre>';
		$this->MGlobal->table_update($tablename, $idx, $updateData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di update!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/Berita/getDetail/".$idx."';</script>";
    }
    
	public function Delete($idx)
	{
		$BeritaData = $this->MBerita->get_detaildataBerita($idx);
		foreach($BeritaData as $row)
		{
            $idxfile = $row['idxfile'];
			$filecolumn  = $row['filecolumn'];			
			
			$deletePath = str_replace("../",'./assets/', $filecolumn);
			if (file_exists($deletePath)) 
			{
				unlink($deletePath);
			}
			$tablenameFile = "dt_file";
			$this->MGlobal->delete_data($idxfile, $tablenameFile);
        }
        $tablename = "berita";
		$this->MGlobal->delete_data($idx, $tablename);
		echo "<script type='text/javascript'>alert('Data telah berhasil di hapus!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/Berita';</script>";
	}
}
