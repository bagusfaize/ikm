<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MStatusData extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function get_statusData($owner){
        $this->db->select('*');
        $this->db->from('1_profil');
        $this->db->where('owner', $owner);
        $query = $this->db->get();
        return $query->result_array();
    }
	
    public function get_statusDataHistory($idx){
        $data = $this->db->query("
		select
		    h.*,
			f.nama as fileName,
			f.file as filePath			
	    from histori as h
	    left join dt_file as f
		    on f.idx = h.file		    
	    where h.sender = ".$idx."
		");
        return $data->result_array();
    }
	
}
?>