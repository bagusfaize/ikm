<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSentra extends CI_Controller {

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
	public function index()
	{
		$this->load->model('MPembinaan');
		$this->load->model('MRegulasi');
		$this->load->model('MGlobal');
		$this->load->model('MDataSentra');
		$dataFooter['PembinaanData'] = $this->MPembinaan->get_pembinaan(3);
		$dataFooter['RegulasiData'] = $this->MRegulasi->get_regulation(3);
		$data['CboKategoriIndustri'] = $this->MGlobal->get_CboBox('katind');
		$data['dataSentra'] = $this->MDataSentra->get_dataSentra(0, 0);

		$this->load->view('Stylesheet');
		$this->load->view('Header');
		$this->load->view('DataSentra', $data);
		$this->load->view('Footer', $dataFooter);
	}

	public function filterIndustri($valKategoriIndustri)
	{
		$this->load->model('MGlobal');
		$CboKategoriIndustri = $this->MGlobal->get_CboDesa();
		echo "<option value='0'>Pilih Kota / Kabupaten</option>";
		if($valKategoriIndustri != 0){
			foreach($CboKategoriIndustri as $row)
			{
				echo "<option value=".$row['kdkab'].">".$row['kab']."</option>";
			}
		}
	}

	public function search()
	{
		$kt_industri = $this->input->post('kt_industri');
		$kt_kab = $this->input->post('kt_kab');
		$this->load->model('MPembinaan');
		$this->load->model('MRegulasi');
		$this->load->model('MGlobal');
		$this->load->model('MDataSentra');
		$dataFooter['PembinaanData'] = $this->MPembinaan->get_pembinaan(3);
		$dataFooter['RegulasiData'] = $this->MRegulasi->get_regulation(3);
		$data['CboKategoriIndustri'] = $this->MGlobal->get_CboBox('katind');
		$data['dataSentra'] = $this->MDataSentra->get_dataSentra($kt_industri, $kt_kab);

		$this->load->view('Stylesheet');
		$this->load->view('Header');
		$this->load->view('DataSentra', $data);
		$this->load->view('Footer', $dataFooter);
	}
}
