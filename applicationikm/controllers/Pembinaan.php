<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembinaan extends CI_Controller {

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
		$dataFunction =  $this->loadFunction();
		$data = $dataFunction['data'];
		$dataFooter = $dataFunction['dataFooter'];
		$this->load->view('Stylesheet');
		$this->load->view('Header');
		$this->load->view('Pembinaan', $data);
		$this->load->view('Footer', $dataFooter);
	}

	public function LoadMore($nextLoad)
	{
		$dataFunction =  $this->loadFunction();
		$data = $dataFunction['data'];
		$dataFooter = $dataFunction['dataFooter'];
		$this->load->view('Stylesheet');
		$this->load->view('Header');
		$this->load->view('Pembinaan', $data);
		$this->load->view('Footer', $dataFooter);
	}
	
	public function search()
	{
		$this->load->helper('form');
		$this->load->model('MPembinaan');
		$this->load->model('MRegulasi');
		$dataFooter['PembinaanData'] = $this->MPembinaan->get_pembinaan(3);
		$dataFooter['RegulasiData'] = $this->MRegulasi->get_regulation(3);

		$bentukPembinaan = $this->input->post('CboBentukPembinaan');
		$pemerintahan = $this->input->post('CboPemerintahan');
		$tahun = $this->input->post('CboTahun');
		$name = $this->input->post('TxtName');
		$data['PembinaanData'] = $this->MPembinaan->get_pembinaanBy($bentukPembinaan, $pemerintahan, $tahun, $name);	
		$data['nextLoad'] = 0;

		$this->load->view('Stylesheet');
		$this->load->view('Header');
		$this->load->view('Pembinaan', $data);
		$this->load->view('Footer', $dataFooter);
	}

	public function loadFunction()
	{
		$this->load->model('MPembinaan');
		$this->load->model('MGlobal');
		$dataFooter['PembinaanData'] = $this->MPembinaan->get_pembinaan(3);

		$this->load->model('MRegulasi');
		$dataFooter['RegulasiData'] = $this->MRegulasi->get_regulation(3);

		$data['PembinaanData'] = $this->MPembinaan->get_pembinaan(6);
		$data['nextLoad'] = 10;

		$data['CboBentukPembinaan'] = $this->MGlobal->get_CboBox('pembinaan');
		$data['CboPemerintahan'] = $this->MGlobal->get_CboBox('pemerintahan');
		$x['data'] = $data;
		$x['dataFooter'] = $dataFooter;
		return $x;
	}
}
