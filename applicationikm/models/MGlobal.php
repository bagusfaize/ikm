<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MGlobal extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_CboBox($jenis){
        $this->db->select('*');
        $this->db->from('kd_romi');
        $this->db->where('jenis', $jenis);
        $this->db->order_by('arti', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_image($idx)
    {
        $this->db->select('*');
        $this->db->from('dt_file');
        $this->db->where('idx', $idx);
        $this->db->order_by('idx', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_link()
    {
        $this->db->select('link.*, dt_file.file');
        $this->db->from('link');
        $where = "alamat is  NOT NULL";
        $this->db->where($where);
        $this->db->join('dt_file', 'dt_file.idx = link.foto', 'left');
        $this->db->order_by('idx', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_fotonvideo(){
        $data = $this->db->query("
            select a.*, dt_file.file from(select * from (select * from album_file where (foto!='') and tampil='1' order by idx desc limit 0,3 ) as x
            UNION
            select * from (select * from album_file where (video!='') and tampil='1' order by idx desc limit 0,3 ) as y) as a left join dt_file on dt_file.idx = a.foto");
        return $data->result_array();
    }
    
    public function get_CboDesa(){
        $this->db->select('*');
        $this->db->from('kd_desa');
        $this->db->group_by('kdkab');
        $this->db->order_by('kdkab', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function maxIDX()
    {
        $this->db->select('dt_petugas.idx');
        $this->db->from('dt_petugas');
        $this->db->order_by('idx', 'DESC');
        $this->db->limit(1, 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_TPDF()
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('jenis', 'tupoksi');
        $this->db->limit(1, 0);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function checkValidation($user, $ikmPassword)
    {
        $this->db->select('*');
        $this->db->from('dt_petugas');
        $this->db->where('uid', $user);
        $this->db->where('pwd', $ikmPassword);
        $this->db->limit(1, 0);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>