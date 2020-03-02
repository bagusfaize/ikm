<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$dataFunction =  $this->loadFunction(6, 10);
		$data = $dataFunction['data'];
		$dataFooter = $dataFunction['dataFooter'];

		$this->load->view('Stylesheet');
		$this->load->view('Header');
		$this->load->view('Home', $data);
		$this->load->view('FooterLanding', $dataFooter);
	}	

	public function LoadMore($nextLoad)
	{
		$dataFunction =  $this->loadFunction(0, $nextLoad);
		$data = $dataFunction['data'];
		$dataFooter = $dataFunction['dataFooter'];

		$this->load->view('Stylesheet');
		$this->load->view('Header');
		$this->load->view('Home', $data);
		$this->load->view('FooterLanding', $dataFooter);
	}
	public function loadFunction($start, $nextLoad)
	{		
		$this->load->model('MNews');
		$this->load->model('MPembinaan');
		$this->load->model('MRegulasi');
		$this->load->model('MGlobal');
		if($start <> 0)
		{
			$data['NewsData'] = $this->MNews->get_news($start);
			$nextLoad = $start+4;
		}else{			
			$data['NewsData'] = $this->MNews->get_news($nextLoad);
			$nextLoad = $nextLoad+4;
		}
		$data['nextLoad'] = $nextLoad;
		$dataFooter['PembinaanData'] = $this->MPembinaan->get_pembinaan(3);
		$dataFooter['RegulasiData'] = $this->MRegulasi->get_regulation(3);
		$data['SponsorshipLink'] = $this->MGlobal->get_link();
		$data['FotoNVideo'] = $this->MGlobal->get_fotonvideo();
		$x['data'] = $data;
		$x['dataFooter'] = $dataFooter;
		return $x;
	}
}
