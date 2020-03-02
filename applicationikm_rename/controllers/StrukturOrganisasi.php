<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StrukturOrganisasi extends CI_Controller {

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
		$dataFooter['PembinaanData'] = $this->MPembinaan->get_pembinaan(3);
		$dataFooter['RegulasiData'] = $this->MRegulasi->get_regulation(3);
		$imageStruktur = $this->MGlobal->get_image(2);
		foreach($imageStruktur as $row)
		{
			$data['image'] = $row['file'];
		}

		$this->load->view('Stylesheet');
		$this->load->view('Header');
		$this->load->view('StrukturOrganisasi', $data);
		$this->load->view('Footer', $dataFooter);
	}
}
