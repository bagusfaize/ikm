<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MPotensiBahanBaku extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_dataPotensiBahanBaku(){
        $this->db->select('dt_potensi.*, kd_romi.arti, kd_desa.kab, kd_desa.kec, kd_desa.des');
        $this->db->from('dt_potensi');
        $this->db->join('kd_romi', 'kd_romi.kode = dt_potensi.katbah', 'left');
        $this->db->join('kd_desa', 'kd_desa.kdkab = dt_potensi.kab and kd_desa.kdkec = dt_potensi.kec and kd_desa.kddes = dt_potensi.des', 'right');
        $this->db->where('kd_romi.jenis', 'katbah');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_detaildataPotensiBahanBaku($idx){
        $this->db->select('dt_potensi.*, kd_romi.arti, dt_file.idx as idxfile, dt_file.file as filecolumn');
        $this->db->from('dt_potensi');
        $this->db->join('kd_romi', 'kd_romi.kode = dt_potensi.katbah', 'left');
        $this->db->join('dt_file', 'dt_file.idx = dt_potensi.foto', 'left');
        $this->db->join('kd_desa', 'kd_desa.kdkab = dt_potensi.kab and kd_desa.kdkec = dt_potensi.kec and kd_desa.kddes = dt_potensi.des', 'right');
        $this->db->where('kd_romi.jenis', 'katbah');
        $this->db->where('dt_potensi.idx', $idx);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>