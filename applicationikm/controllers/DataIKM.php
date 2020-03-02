<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataIKM extends CI_Controller {

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
		$dataFooter['PembinaanData'] = $this->MPembinaan->get_pembinaan(3);

		$this->load->model('MRegulasi');
		$dataFooter['RegulasiData'] = $this->MRegulasi->get_regulation(3);

		$this->load->view('Stylesheet');
		$this->load->view('Header');
		$this->load->view('DataIKM');
		$this->load->view('Footer', $dataFooter);
	}

	public function search()
	{
		$JenisData = $this->input->post('CboJenisData');
		$this->load->model('MPembinaan');
		$dataFooter['PembinaanData'] = $this->MPembinaan->get_pembinaan(3);

		$this->load->model('MRegulasi');
		$dataFooter['RegulasiData'] = $this->MRegulasi->get_regulation(3);

		$this->load->view('Stylesheet');
		$this->load->view('Header');
		if($JenisData == 'IKM')
		{
			$this->load->view('DataIKM');
		}else if($JenisData == 'KBLI'){
			$data['filterKBLI'] = $this->input->post('sel_kbli');
			$this->load->view('DataKBLI', $data);
		}else{
			redirect(DataIKM);
		}
		$this->load->view('Footer', $dataFooter);
	}

	public function ExportIKM()
	{
		$this->load->view('exportikm');
	}
}
