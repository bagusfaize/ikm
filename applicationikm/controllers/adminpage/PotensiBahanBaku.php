<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PotensiBahanBaku extends CI_Controller {

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
		$this->load->model('adminpage/MPotensiBahanBaku');
		$this->load->model('adminpage/MDataSentra');
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
		$data['ProdukData'] = $this->MPotensiBahanBaku->get_dataPotensiBahanBaku();		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/PotensiBahanBakuList', $data);
		$this->load->view('adminpage/Footer');
    }
    
	public function AddPotensiBahanBaku()
	{	
		$data['idx'] = $this->MGlobal->maxIDX("dt_potensi");
		$data['cboKab'] = $this->MGlobal->get_CboDesa();
		$data['cboKatind'] = $this->MGlobal->get_CboBox('katind');
		$data['cboKatbah'] = $this->MGlobal->get_CboBox('katbah');

        $this->load->view('adminpage/Stylesheet');
        $this->load->view('adminpage/Header');
        $this->load->view('adminpage/PotensiBahanBakuAdd', $data);
        $this->load->view('adminpage/Footer');
	}

	public function insert()
	{
		$idx = $this->input->post('idx');
		$nama = $this->input->post('nama');
		$katbah = $this->input->post('cbokatbah');
		$kab = $this->input->post('cboKab');
		$kec = $this->input->post('cboKec');
		$des = $this->input->post('cboKel');
		$jl = $this->input->post('jl');
		$lat = $this->input->post('lat');
		$lon = $this->input->post('lon');
		$luas = $this->input->post('luas');
		$jml = $this->input->post('jml');
		$satjml = $this->input->post('satjml');
		

		$config['upload_path'] = './assets/uploads';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['file_name'] = "potensibhnbaku_".$idx;
	    $config['overwrite'] = true;
	    $config['max_size'] = 1024; // 1MB
	     $this->load->library('upload');
	     $this->upload->initialize($config);
		if ( ! $this->upload->do_upload('fileimage'))
		{
	        $error = $this->upload->display_errors();
	        print_r($error);
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
				"file"=> '../uploads/'.$file_name
			);
			$this->MGlobal->InsertFoto($PhotoData);
	        //print_r($upload_data);
	    }

		$tablename = "dt_potensi";		
        $insertData = array(
            "idx"=> $idx,
            "nama"=> $nama,
            "katbah"=> $katbah,
            "kab"=> $kab,
            "kec"=> $kec,
            "des"=> $des,
            "jl"=> $jl,
            "lat"=> $lat,
            "lon"=> $lon,
            "luas"=> $luas,
            "jml"=> $jml,
            "satjml"=> $satjml,
            "foto" => $idxmax
        );
		$this->MGlobal->table_insert($tablename, $insertData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di tambahkan!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/PotensiBahanBaku/';</script>";
    }
    
	public function getDetail($idx)
	{
        $data['kategoriProduk'] = array(
            "1"=> "Komoditas Pertanian dan Olahannya",
            "2"=> "Komoditas Kehutanan dan Olahannya",
            "3"=> "Komoditas Perikanan dan Olahannya",
            "4"=> "Komoditas Peternakan dan Olahannya",
            "5"=> "Komoditas Tambang dan Olahannya",
            "6"=> "Kimia dan Lainnya",            
        );
		
		$PotensiData = $this->MPotensiBahanBaku->get_detaildataPotensiBahanBaku($idx);
		$data['cboKab'] = $this->MGlobal->get_CboDesa();
		$data['cboKatind'] = $this->MGlobal->get_CboBox('katind');
		$data['cboKatbah'] = $this->MGlobal->get_CboBox('katbah');
		foreach($PotensiData as $row)
		{
			$data['idx'] = $row['idx'];
            $data['nama'] = $row['nama'];
            $data['katbah'] = $row['katbah'];
            $data['kab'] = $row['kab'];
            $data['kec'] = $row['kec'];
            $data['des'] = $row['des'];
            $data['jl'] = $row['jl'];
            $data['lat'] = $row['lat'];
            $data['lon'] = $row['lon'];
            $data['luas'] = $row['luas'];
            $data['satluas'] = $row['satluas'];
            $data['jml'] = $row['jml'];
            $data['satjml'] = $row['satjml'];
            $data['idxfile']  = $row['idxfile'];
            $data['filecolumn']  = $row['filecolumn'];
        }
        $this->load->view('adminpage/Stylesheet');
        $this->load->view('adminpage/Header');
        $this->load->view('adminpage/PotensiBahanBakuDetail', $data);
        $this->load->view('adminpage/Footer');
    }
	
	
	public function update()
	{
		$idx = $this->input->post('idx');
		$nama = $this->input->post('nama');
		$katbah = $this->input->post('cbokatbah');
		$kab = $this->input->post('cboKab');
		$kec = $this->input->post('cboKec');
		$des = $this->input->post('cboKel');
		$jl = $this->input->post('jl');
		$lat = $this->input->post('lat');
		$lon = $this->input->post('lon');
		$luas = $this->input->post('luas');
		$jml = $this->input->post('jml');
		$satjml = $this->input->post('satjml');
		$idxfile = $this->input->post('idxfile');
		$filecolumn = $this->input->post('filecolumn');

		$deletePath = str_replace("../",'./assets/', $filecolumn);
		//echo $deletePath;
		$x = ASSET_PATH.'foto_karyawan';
	    $config['upload_path'] = './assets/uploads';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['file_name'] = "potensibhnbaku_".$idx;
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
        $updateData = array(
            "idx"=> $idx,
            "nama"=> $nama,
            "katbah"=> $katbah,
            "kab"=> $kab,
            "kec"=> $kec,
            "des"=> $des,
            "jl"=> $jl,
            "lat"=> $lat,
            "lon"=> $lon,
            "luas"=> $luas,
            "jml"=> $jml,
            "satjml"=> $satjml,
            "foto" => $idxfile
        );

		$tablename = "dt_potensi";
		//echo '<pre>';
		//print_r($updateData);
		//echo '</pre>';
		$this->MGlobal->table_update($tablename, $idx, $updateData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di update!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/PotensiBahanBaku/getDetail/".$idx."';</script>";
    }
    
	public function Delete($idx)
	{
        $tablename = "dt_potensi";
		$this->MGlobal->delete_data($idx, $tablename);
		echo "<script type='text/javascript'>alert('Data telah berhasil di hapus!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/PotensiBahanBaku';</script>";
	}
}
