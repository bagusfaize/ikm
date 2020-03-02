<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MBerita extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_dataBerita($tipe){
        $this->db->select('berita.*, dt_file.idx as idxfile, dt_file.file as filecolumn');
        $this->db->from('berita');
        $this->db->join('dt_file', 'dt_file.idx = berita.foto', 'left');
        $this->db->where('tipe', $tipe);
        $this->db->order_by('berita.idx', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_detaildataBerita($idx){
        $this->db->select('berita.*, dt_file.idx as idxfile, dt_file.file as filecolumn');
        $this->db->from('berita');
        $this->db->join('dt_file', 'dt_file.idx = berita.foto', 'left');
        $this->db->where('berita.idx', $idx);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>