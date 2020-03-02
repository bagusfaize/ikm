<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MPembinaan extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_pembinaan($topnews){
        $this->db->select('pembinaan.*,kr.arti, pn.nama as namaNarasumber');
        $this->db->from('pembinaan');
        $this->db->join('pembinaan_file pf', 'pf.idpembinaan = pembinaan.idx', 'left');
        $this->db->join('dt_file f', 'f.idx = pf.foto', 'left');
        $this->db->join('pembinaan_narsum pn', 'pn.idpembinaan = pembinaan.idx', 'left');
        $this->db->join('kd_romi kr', 'kr.kode = pembinaan.pemerintahan', 'left');
        $this->db->where('kr.jenis', 'pemerintahan');
        $this->db->limit($topnews, 0);
        $this->db->order_by('pembinaan.idx', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_pembinaanBy($bentukPembinaan, $pemerintahan, $tahun, $name){
        $this->db->select('pembinaan.*,kr.arti, pn.nama as namaNarasumber');
        $this->db->from('pembinaan');
        $this->db->join('pembinaan_file pf', 'pf.idpembinaan = pembinaan.idx', 'left');
        $this->db->join('dt_file f', 'f.idx = pf.foto', 'left');
        $this->db->join('pembinaan_narsum pn', 'pn.idpembinaan = pembinaan.idx', 'left');
        $this->db->join('kd_romi kr', 'kr.kode = pembinaan.pemerintahan', 'left');
        $this->db->where('kr.jenis', 'pemerintahan');
        if($bentukPembinaan != " ")
        {
            $this->db->where('pembinaan.bentuk', $bentukPembinaan);
        }
        if($pemerintahan != " ")
        {
            $this->db->where('pembinaan.pemerintahan', $pemerintahan);
        }
        if($tahun != " ")
        {
            $this->db->where('pembinaan.th_anggaran', $tahun);
        }
        if($name != "")
        {
            $this->db->like('pembinaan.nama', $name);
        }
        //$this->db->limit($topnews, 0);
        $this->db->order_by('pembinaan.idx', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_Cbopembinaan($jenis){
        $this->db->select('*');
        $this->db->from('kd_romi');
        $this->db->where('jenis', $jenis);
        $this->db->order_by('arti', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>