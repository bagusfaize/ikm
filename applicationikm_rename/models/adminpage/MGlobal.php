<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MGlobal extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    public function updateFoto($idx, $updateData)
    {
        $this->db->where("idx", $idx);
        $this->db->update("dt_file", $updateData); 
    }

    public function InsertFoto($PhotoData)
    {
        $this->db->insert("dt_file", $PhotoData); 
    }

    public function maxIDXEmployee()
    {
        $this->db->select('dt_petugas.idx');
        $this->db->from('dt_petugas');
        $this->db->order_by('idx', 'DESC');
        $this->db->limit(1, 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function maxIDXFile()
    {
        $this->db->select('*');
        $this->db->from('dt_file');
        $this->db->order_by('idx', 'DESC');
        $this->db->limit(1, 0);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function delete_Foto($idxFoto)
    {
        $this->db->where('idx', $idxFoto);
        $this->db->delete('dt_file');
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

    public function get_CboBox($jenis){
        $this->db->select('*');
        $this->db->from('kd_romi');
        $this->db->where('jenis', $jenis);
        $this->db->order_by('arti', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function maxIDX($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by('idx', 'DESC');
        $this->db->limit(1, 0);
        $query = $this->db->get();
        foreach($query->result_array() as $row)
        {
            $idx = $row['idx']+1;
        }
        return $idx;
    }
    public function get_CboDesa(){
        $this->db->select('*');
        $this->db->from('kd_desa');
        $this->db->group_by('kdkab');
        $this->db->order_by('kdkab', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_CboKec($kdkab){
        $this->db->select('*');
        $this->db->from('kd_desa');
        $this->db->where('kdkab', $kdkab);
        $this->db->group_by('kdkec');
        $this->db->order_by('kdkab', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_CboKel($kdkec, $kdkel){
        $this->db->select('*');
        $this->db->from('kd_desa');
        $this->db->where('kdkec', $kdkec);
        $this->db->group_by('kddes');
        $this->db->order_by('kdkab', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_table($tablename, $orderby){
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->order_by($orderby, 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_table_where($tablename, $idx){
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->where('idx', $idx);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function table_insert($tablename, $insertData)
    {
        $this->db->insert($tablename, $insertData); 
    }

    public function table_update($tablename, $idx, $updateData)
    {
        $this->db->where("idx", $idx);
        $this->db->update($tablename, $updateData); 
    }

    public function delete_data($idx, $tablename)
    {
        $this->db->where('idx', $idx);
        $this->db->delete($tablename);
    }
}
?>