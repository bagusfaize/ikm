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
	public function index()
	{
		$this->load->model('MRegulasi');
		$data['RegulasiData'] = $this->MRegulasi->get_regulation(6);
		$data['nextLoad'] = 10;

		$this->load->model('MPembinaan');
		$dataFooter['PembinaanData'] = $this->MPembinaan->get_pembinaan(3);

		$this->load->model('MRegulasi');
		$dataFooter['RegulasiData'] = $this->MRegulasi->get_regulation(3);

		$this->load->view('Stylesheet');
		$this->load->view('Header');
		$this->load->view('Regulasi', $data);
		$this->load->view('Footer', $dataFooter);
	}
}
