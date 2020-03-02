<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MRegulasi extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_regulation($topnews){
        $this->db->select('regulasi.*, kr.arti as artijenis, "Berlaku" as artistatus, dt_file.file, dt_file.nama as namaFile');
        $this->db->from('regulasi');
        $this->db->join('kd_romi kr', 'kr.kode = regulasi.jenis', 'left');
        //$this->db->join('kd_romi krs', 'krs.kode = regulasi.jenis', 'left');
        $this->db->join('dt_file', 'dt_file.idx = regulasi.foto', 'left');
        $this->db->where('kr.jenis', 'uujenis');
        //$this->db->where('krs.jenis', 'uustatus');
        $this->db->limit($topnews, 0);
        $this->db->order_by('tahun', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_detailnews($idx){
        $data = $this->db->query("SELECT * FROM berita WHERE idx = '".$idx."'");
        return $data->result_array();
    }
}
?>