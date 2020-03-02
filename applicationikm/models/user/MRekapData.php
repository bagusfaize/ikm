<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MRekapData extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
    public function get_rekapData(){
        $data = $this->db->query("		
			select
				p.*,
				k.kab as kabupaten,
				k.kec as kecamatan,
				k.des as desa,
				d.nama as petugas				
			from 1_profil as p
			left join kd_desa as k
				on k.kdkab = p.kab
				and k.kdkec = p.kec
				and k.kddes = p.des				
			left join dt_petugas as d
				on d.uid = p.owner				
			where p.tglkirim != ''
			and p.chdel = ''
			and d.nama != ''
			order by p.idx ASC
		");
        return $data->result_array();
    }
	
}
?>