<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MProfile extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_tpdf(){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('jenis', 'tupoksi');
        $this->db->limit(1, 0);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_TPDF($idx, $updateData)
    {
        $this->db->where("idx", $idx);
        $this->db->update("admin", $updateData); 
		echo "<script type='text/javascript'>alert('Data telah berhasil di update!');</script>";
		echo "<script type='text/javascript'>window.location.href = '" . base_url() . "adminpage/Profile/TPDF';</script>";
    }
}
?>