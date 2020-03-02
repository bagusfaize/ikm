<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MEmployee extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_employee(){
        $data = $this->db->query("SELECT * FROM dt_petugas where oth <> 'petugas' ");
        return $data->result_array();
    }
    
    public function get_employee_oth(){
        $this->db->select('*');
        $this->db->from('dt_petugas');
        $this->db->where('oth', 'Petugas');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_employee_detail($uid)
    {
        $this->db->select('dt_petugas.*, dt_file.file');
        $this->db->from('dt_petugas');
        $this->db->where('uid', $uid);
        $this->db->join('dt_file', 'dt_file.idx = dt_petugas.foto', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_employee_detailByIDX($idx)
    {
        $this->db->select('dt_petugas.*, dt_file.file');
        $this->db->from('dt_petugas');
        $this->db->where('dt_petugas.idx', $idx);
        $this->db->join('dt_file', 'dt_file.idx = dt_petugas.foto', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_employee_detail_update($idx, $updateData)
    {
        $this->db->where("idx", $idx);
        $this->db->update("dt_petugas", $updateData); 
    }

    public function get_employee_insert($insertData)
    {
        $this->db->insert("dt_petugas", $insertData); 
    }

    public function delete_employee($idx)
    {
        $this->db->where('idx', $idx);
        $this->db->delete('dt_petugas');
    }
}
?>