<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MPegawai extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_pegawai(){
        $this->db->select('*');
        $this->db->from('dt_petugas');
        $this->db->where('oth', 'Pegawai');
        $this->db->join('dt_file', 'dt_file.idx = dt_petugas.foto', 'left');
        $this->db->order_by('sequence', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>