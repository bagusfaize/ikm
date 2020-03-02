<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MSentra extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_peserta($idx){
        $this->db->select('*');
        $this->db->from('peserta_sentra');
        $this->db->where('peserta_sentra.idsentra', $idx);
        $this->db->join('1_profil p', 'p.idx = peserta_sentra.idpt', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>