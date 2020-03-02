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

    public function table_update_spec($tablename, $idxcolumn, $idx, $updateData)
    {
        $this->db->where($idxcolumn, $idx);
        $this->db->update($tablename, $updateData); 
    }

    public function delete_data($idx, $tablename)
    {
        $this->db->where('idx', $idx);
        $this->db->delete($tablename);
    }

    public function delete_data_spec($idxcolumn, $idx, $tablename)
    {
        $this->db->where($idxcolumn, $idx);
        $this->db->delete($tablename);
    }
	
	
	
	 public function get_table_Peserta()
	 {
        $this->db->select('peserta.*,kd_desa.kab,kd_desa.kec, kd_desa.des,dt_file.file, kd_romi.arti ,pembinaan_peserta.nama_pembinaan');
        $this->db->from('peserta');
		 $this->db->join('kd_desa', 'kd_desa.kdkab = peserta.kab_p', 'left');
		 $this->db->join('dt_file', 'dt_file.idx = peserta.foto', 'left');
		 $this->db->join('kd_romi', 'kd_romi.kode = peserta.st_peserta', 'left');
		 $this->db->join('pembinaan_peserta', 'pembinaan_peserta.idpembinaan = peserta.idpembinaan', 'left');
		 $this->db->where('kd_romi.jenis', 'status_peserta');
        $this->db->order_by('idx', 'ASC');
		 $this->db->group_by('idx');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	  public function get_table_Peserta_where( $idx)
	  {
         $this->db->select('peserta.*,kd_desa.kab,kd_desa.kec, kd_desa.des,dt_file.file, kd_romi.arti ,pembinaan_peserta.nama_pembinaan ');
        $this->db->from('peserta');
		 $this->db->join('kd_desa', 'kd_desa.kdkab = peserta.kab_p', 'left');
		 $this->db->join('dt_file', 'dt_file.idx = peserta.foto', 'left');
		 $this->db->join('kd_romi', 'kd_romi.kode = peserta.st_peserta', 'left');
		  $this->db->join('pembinaan_peserta', 'pembinaan_peserta.idpembinaan = peserta.idpembinaan', 'left');
		 $this->db->where('kd_romi.jenis', 'status_peserta');
		  $this->db->where('peserta.idx', $idx);
        $this->db->order_by('idx', 'ASC');
		 $this->db->group_by('idx');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function maxIDXPeserta()
    {
        $this->db->select('peserta.idx');
        $this->db->from('peserta');
        $this->db->order_by('idx', 'DESC');
        $this->db->limit(1, 0);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function get_CboBoxPeserta()
	{
        $this->db->select('idpembinaan,nama_pembinaan');
        $this->db->from('pembinaan_peserta');
       // $this->db->where('jenis', $jenis);
	   $this->db->group_by('idpembinaan,nama_pembinaan');
        $this->db->order_by('idpembinaan', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function get_table_pembinaan( )
	  {
         $this->db->select('pembinaan.*,a.arti b, c.arti');
        $this->db->from('pembinaan');
		 $this->db->join('kd_romi a', 'a.kode = pembinaan.pemerintahan', 'left'); 
		$this->db->join('kd_romi c', 'c.kode = pembinaan.sumber_dana', 'left');
		$this->db->where('c.jenis', 'sumber_dana');	
		 $this->db->where('a.jenis', 'pemerintahan');		 
        $this->db->order_by('idx', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	
	public function get_table_pembinaan_where($idx )
	  {
         $this->db->select('pembinaan.*,a.arti b, c.arti');
        $this->db->from('pembinaan');
		 $this->db->join('kd_romi a', 'a.kode = pembinaan.pemerintahan', 'left'); 
		$this->db->join('kd_romi c', 'c.kode = pembinaan.sumber_dana', 'left');
		$this->db->where('c.jenis', 'sumber_dana');	
		 $this->db->where('a.jenis', 'pemerintahan');
		$this->db->where('pembinaan.idx', $idx);		 
        $this->db->order_by('idx', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function maxIDXNarasumber()
    {
        $this->db->select('narasumber.idx');
        $this->db->from('narasumber');
        $this->db->order_by('idx', 'DESC');
        $this->db->limit(1, 0);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function get_table_Narasumber( )
	  {
         $this->db->select('narasumber.*,a.arti ,dt_file.file');
        $this->db->from('narasumber');
		 $this->db->join('kd_romi a', 'a.kode = narasumber.status', 'left'); 
		 $this->db->join('dt_file', 'dt_file.idx = narasumber.foto', 'left');
		 $this->db->where('a.jenis', 'status_pegawai');		 
        $this->db->order_by('narasumber.idx', 'des');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	
	public function get_table_sertifikasi( )
	  {
         $this->db->select('sertifikasi.*,a.arti b, c.arti');
        $this->db->from('sertifikasi');
		 $this->db->join('kd_romi a', 'a.kode = sertifikasi.pemerintahan', 'left'); 
		$this->db->join('kd_romi c', 'c.kode = sertifikasi.sumberDana', 'left');
		$this->db->where('c.jenis', 'sumber_dana');	
		 $this->db->where('a.jenis', 'pemerintahan');		 
        $this->db->order_by('idx', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
	public function maxIDXsertifikasi()
    {
        $this->db->select('sertifikasi.idx');
        $this->db->from('sertifikasi');
        $this->db->order_by('idx', 'DESC');
        $this->db->limit(1, 0);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>