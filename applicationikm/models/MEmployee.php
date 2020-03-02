<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MEmployee extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_employee(){
        $data = $this->db->query("SELECT * FROM dt_petugas");
        return $data->result_array();
    }
}
?>