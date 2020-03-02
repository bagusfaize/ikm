<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MSatuan extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_satuan(){
        $this->db->select('*');
        $this->db->from('dt_satuan');
        $this->db->order_by('kategori', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

}
?>