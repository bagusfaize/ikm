<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MNews extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_news($topnews){
        $this->db->select('berita.*, dt_file.file');
        $this->db->from('berita');
        $this->db->limit($topnews, 0);
        $this->db->join('dt_file', 'dt_file.idx = berita.foto', 'left');
        $this->db->order_by('berita.idx', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_detailnews($idx){
        $data = $this->db->query("SELECT * FROM berita WHERE idx = '".$idx."'");
        return $data->result_array();
    }
}
?>