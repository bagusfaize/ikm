<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ByAdmin_Sentra extends CI_Controller {

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
		$this->load->model('adminpage/MDataSentra');
		$this->load->model('adminpage/MSentra');
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
		$data['SentraData'] = $this->MDataSentra->get_dataSentra(0, 0);
		
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/ByAdmin_SentraList', $data);
		$this->load->view('adminpage/Footer');
    }
    
	public function AddSentra()
	{	
		$data['idx'] = $this->MGlobal->maxIDX("dt_sentra");
		$data['cboKatind'] = $this->MGlobal->get_CboBox('katind');
		$data['cboStatusSentra'] = $this->MGlobal->get_CboBox('status_sentra');
		$data['cboKab'] = $this->MGlobal->get_CboDesa();

		$this->load->view('adminpage/CkeditorStyle');
		$this->load->view('adminpage/Stylesheet');
		$this->load->view('adminpage/Header');
		$this->load->view('adminpage/ByAdmin_SentraAdd',$data);
		$this->load->view('adminpage/FooterEditor');
	}

	public function insert()
	{
		$idx = $this->input->post('idx');
		$nama = $this->input->post('nama');
		$kat_ind = $this->input->post('cbokat_ind');
		$komoditi = $this->input->post('komoditi');
		$cp = $this->input->post('cp');
		$telp = $this->input->post('telp');
		$email = $this->input->post('email');
		$Kab = $this->input->post('cboKab');
		$Kec = $this->input->post('cboKec');
		$Kel = $this->input->post('cboKel');
		$jl = $this->input->post('jl');
		$jml = $this->input->post('jml');
		$status_sentra = $this->input->post('cbostatus_sentra');
		$dasar = $this->input->post('dasar');
		$kondisi = $this->input->post('kondisi');
		$kebutuhan = $this->input->post('kebutuhan');
		$keterangan = $this->input->post('keterangan');


		$config['upload_path'] = './assets/uploads';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['file_name'] = "sentra_".$idx;
	    $config['overwrite'] = true;
	    $config['max_size'] = 1024; // 1MB
	    // $config['max_width']            = 1024;
	    // $config['max_height']           = 768;

	     //$this->load->library('upload', $config);
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


        $tablename = "dt_sentra";
        $insertData = array(
            "idx"=> $idx,
            "nama"=> $nama,
            "kat_ind"=> $kat_ind,
            "cp"=> $cp,
            "telp"=> $telp,
            "email"=> $email,
            "komoditi"=> $komoditi,
            "kab"=> $Kab,
            "kec"=> $Kec,
            "des"=> $Kel,
            "jl"=> $jl,
            "jml"=> $jml,
            "status_sentra"=> $status_sentra,
            "dasar"=> $dasar,
            "kondisi"=> $kondisi,
            "kebutuhan"=> $kebutuhan,
            "keterangan"=> $keterangan,
            "foto" => $idxmax
        );
		$this->MGlobal->table_insert($tablename, $insertData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di tambahkan!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/ByAdmin_Sentra/';</script>";
    }
    
	public function getDetail($idx)
	{
		$SentraData = $this->MDataSentra->get_dataSentraDetail($idx);
		$data['cboKab'] = $this->MGlobal->get_CboDesa();
		$data['cboKatind'] = $this->MGlobal->get_CboBox('katind');
		$data['cboStatusSentra'] = $this->MGlobal->get_CboBox('status_sentra');
		foreach($SentraData as $row)
		{
			$data['idx'] = $row['idx'];
            $data['nama'] = $row['nama'];
            $data['kat_ind'] = $row['kat_ind'];
            $data['cp'] = $row['cp'];
            $data['telp'] = $row['telp'];
            $data['email'] = $row['email'];
            $data['komoditi'] = $row['komoditi'];
            $data['sentrakab'] = $row['sentrakab'];
            $data['sentrakec'] = $row['sentrakec'];
            $data['sentrades'] = $row['sentrades'];
            $data['jl'] = $row['jl'];
            $data['jml'] = $row['jml'];
            $data['status_sentra'] = $row['status_sentra'];
            $data['dasar'] = $row['dasar'];
            $data['kondisi'] = $row['kondisi'];
            $data['kebutuhan'] = $row['kebutuhan'];
            $data['keterangan'] = $row['keterangan'];
            $data['idxfile']  = $row['idxfile'];
            $data['filecolumn']  = $row['filecolumn'];
        }
		$this->load->view('adminpage/CkeditorStyle');
        $this->load->view('adminpage/Stylesheet');
        $this->load->view('adminpage/Header');
        $this->load->view('adminpage/ByAdmin_SentraDetail', $data);
        $this->load->view('adminpage/FooterEditor');
    }

	public function getSearch($idx)
	{
		$SentraData = $this->MDataSentra->get_dataSentraDetail($idx);
		$data['cboKab'] = $this->MGlobal->get_CboDesa();
		$data['cboKatind'] = $this->MGlobal->get_CboBox('katind');
		$data['cboStatusSentra'] = $this->MGlobal->get_CboBox('status_sentra');
		$data['PesertaData'] = $this->MSentra->get_peserta($idx);
		foreach($SentraData as $row)
		{
			$data['idx'] = $row['idx'];
            $data['nama'] = $row['nama'];
            $data['kat_ind'] = $row['kat_ind'];
            $data['cp'] = $row['cp'];
            $data['telp'] = $row['telp'];
            $data['email'] = $row['email'];
            $data['komoditi'] = $row['komoditi'];
            $data['sentrakab'] = $row['sentrakab'];
            $data['sentrakec'] = $row['sentrakec'];
            $data['sentrades'] = $row['sentrades'];
            $data['jl'] = $row['jl'];
            $data['jml'] = $row['jml'];
            $data['status_sentra'] = $row['status_sentra'];
            $data['dasar'] = $row['dasar'];
            $data['kondisi'] = $row['kondisi'];
            $data['kebutuhan'] = $row['kebutuhan'];
            $data['keterangan'] = $row['keterangan'];
            $data['idxfile']  = $row['idxfile'];
            $data['filecolumn']  = $row['filecolumn'];
        }
		$this->load->view('adminpage/CkeditorStyle');
        $this->load->view('adminpage/Stylesheet');
        $this->load->view('adminpage/Header');
        $this->load->view('adminpage/ByAdmin_SentraSearch', $data);
        $this->load->view('adminpage/Footer');
    }
    
	public function update()
	{

		$idx = $this->input->post('idx');
		$nama = $this->input->post('nama');
		$kat_ind = $this->input->post('cbokat_ind');
		$komoditi = $this->input->post('komoditi');
		$cp = $this->input->post('cp');
		$telp = $this->input->post('telp');
		$email = $this->input->post('email');
		$Kab = $this->input->post('cboKab');
		$Kec = $this->input->post('cboKec');
		$Kel = $this->input->post('cboKel');
		$jl = $this->input->post('jl');
		$jml = $this->input->post('jml');
		$status_sentra = $this->input->post('cbostatus_sentra');
		$dasar = $this->input->post('dasar');
		$kondisi = $this->input->post('kondisi');
		$kebutuhan = $this->input->post('kebutuhan');
		$keterangan = $this->input->post('keterangan');
		$idxfile = $this->input->post('idxfile');
		$filecolumn = $this->input->post('filecolumn');

		$deletePath = str_replace("../",'./assets/', $filecolumn);
		//echo $deletePath;
		$x = ASSET_PATH.'foto_karyawan';
	    $config['upload_path'] = './assets/uploads';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['file_name'] = "sentra_".$idx;
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
            "kat_ind"=> $kat_ind,
            "cp"=> $cp,
            "telp"=> $telp,
            "email"=> $email,
            "komoditi"=> $komoditi,
            "kab"=> $Kab,
            "kec"=> $Kec,
            "des"=> $Kel,
            "jl"=> $jl,
            "jml"=> $jml,
            "status_sentra"=> $status_sentra,
            "dasar"=> $dasar,
            "kondisi"=> $kondisi,
            "kebutuhan"=> $kebutuhan,
            "keterangan"=> $keterangan,
            "foto" => $idxfile
        );

        $tablename = "dt_sentra";
		$this->MGlobal->table_update($tablename, $idx, $updateData);
		echo "<script type='text/javascript'>alert('Data telah berhasil di update!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/ByAdmin_Sentra/getDetail/".$idx."';</script>";
    }
    
	public function Delete($idx)
	{
        $tablename = "dt_sentra";
		$this->MGlobal->delete_data($idx, $tablename);
		echo "<script type='text/javascript'>alert('Data telah berhasil di hapus!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/ByAdmin_Sentra';</script>";
	}
}
