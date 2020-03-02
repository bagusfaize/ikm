<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MDataSentra extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_dataSentra($kt_industri, $kt_kab){
        $this->db->select('dt_sentra.*, kd_romi.arti, kd_desa.kab, kd_desa.kec, kd_desa.des');
        $this->db->from('dt_sentra');
        $this->db->join('kd_romi', 'kd_romi.kode = dt_sentra.kat_ind', 'left');
        $this->db->join('kd_desa', 'kd_desa.kdkab = dt_sentra.kab and kd_desa.kdkec = dt_sentra.kec and kd_desa.kddes = dt_sentra.des', 'right');
        $this->db->where('kd_romi.jenis', 'katind');
        if($kt_industri != "0")
        {
            $this->db->where('dt_sentra.kat_ind', $kt_industri);
        }
        if($kt_kab != "0")
        {
            $this->db->where('dt_sentra.kab', $kt_kab);
        }
        $this->db->order_by('kat_ind', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_dataSentraDetail($idx){
        $this->db->select('dt_sentra.*, dt_sentra.kab as sentrakab, dt_sentra.kec as sentrakec, dt_sentra.des as sentrades, kd_romi.arti, kd_desa.kab, kd_desa.kec, kd_desa.des, dt_file.idx as idxfile, dt_file.file as filecolumn');
        $this->db->from('dt_sentra');
        $this->db->join('dt_file', 'dt_file.idx = dt_sentra.foto', 'left');
        $this->db->join('kd_romi', 'kd_romi.kode = dt_sentra.kat_ind', 'left');
        $this->db->join('kd_desa', 'kd_desa.kdkab = dt_sentra.kab and kd_desa.kdkec = dt_sentra.kec and kd_desa.kddes = dt_sentra.des', 'right');
        $this->db->where('kd_romi.jenis', 'katind');
        $this->db->where('dt_sentra.idx', $idx);
        $this->db->order_by('kat_ind', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>