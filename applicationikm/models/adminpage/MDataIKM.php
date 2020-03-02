<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class MDataIKM extends CI_Model{
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function get_dataDatabase($datatype){
        $data = $this->db->query("        
			select *
            from (
                select
                    k1.arti as badanUsaha,
                    p.nm_prsh as perusahaan,
                    p.nm_pemilik as pemilik,
                    p.jl as jalan,
                    k2.des as kelurahan,
                    k2.kec as kecamatan,
                    p.telp,
                    p.email,
                    p.website,	
                    --	index ke 9
                    ifnull((
                        select concat(
                            group_concat(i.nama order by i.thn, i.nama separator ', ')
                        )
                        from `6b_perizinan` as i
                        where p.idx = i.sender
                    ), '') as izin,
                    ifnull((
                        select concat(
                            group_concat(i.thn order by i.thn, i.nama separator ', ')
                        )
                        from `6b_perizinan` as i
                        where p.idx = i.sender
                    ), '') as izinthn,
                    -- '' as izinTahun,
                    p.th_berdiri as tahunBerdiri,
                    k3.arti as kategoriProduk,		
                    p.kel as kbli,
                    --	index ke 13				
                    ifnull((
                        select concat(
                            group_concat(r.nm_prod order by r.nm_prod separator ', ')
                        )
                        from `2_produk` as r
                        where p.idx = r.sender
                    ), '') as produk,	
                    ifnull((
                        select concat(
                            group_concat(r.jml_prod order by r.nm_prod separator ', ')
                        )
                        from `2_produk` as r
                        where p.idx = r.sender
                    ), '') as jmlprod,	
                    ifnull((
                        select concat(
                            group_concat(r.satuan order by r.nm_prod separator ', ')
                        )
                        from `2_produk` as r
                        where p.idx = r.sender
                    ), '') as satuanprod,	
                    p.laki as lelaki,
                    p.pr as wanita,
                    if(p.investasi != '', format(p.investasi, 0, 'id_ID'), '') as investasi,	
                    --	index ke 17 dan 18
                    '' as jumlahProduksi,
                    '' as satuan,
                    if(p.tproduksi != '', format(p.tproduksi, 0, 'id_ID'), '') as totalProduksi,
                    if(p.tbahanbaku != '', format(p.tbahanbaku, 0, 'id_ID'), '') as totalBahanBaku,
                    if(p.tjual != '', format(p.tjual, 0, 'id_ID'), '') as totalPenjualan,		
                    --	index ke 22
                    ifnull((
                        select concat(
                            if(sum(if(e.tujuan = '3', e.nilai, 0)) > 0, format(sum(if(e.tujuan = '3', e.nilai, 0)), 0, 'id_ID'), ''), '[|',
                            group_concat(distinct if(e.tujuan != '3', e.wilayah, '') separator ', '), '[|',
                            group_concat(distinct if(e.tujuan = '3', e.wilayah, '') separator ', ')
                        )
                        from `3_penjualan` as e
                        where p.idx = e.sender 
                    ), '') as totalExport,
                    ifnull((
                        select concat(
                            if(sum(if(e.tujuan = '3', e.nilai, 0)) > 0, format(sum(if(e.tujuan = '3', e.nilai, 0)), 0, 'id_ID'), '')
                        )
                        from `3_penjualan` as e
                        where p.idx = e.sender 
                    ), '') as totalExportnilai,
                    ifnull((
                        select concat(
                            group_concat(distinct if(e.tujuan = '3', e.wilayah, '') separator ', ')
                        )
                        from `3_penjualan` as e
                        where p.idx = e.sender 
                    ), '') as totalExporttujuan,
                    ifnull((
                        select concat(
                            group_concat(distinct if(e.tujuan != '3', e.wilayah, '') separator ', ')
                        )
                        from `3_penjualan` as e
                        where p.idx = e.sender 
                    ), '') as totaldalamnegeri,
                    -- '' as tujuanPenjualan,
                    -- '' as tujuanExport,   
                    p.idx
                from `1_profil` as p            
                left join kd_romi as k1
                    on k1.jenis = 'bentukusaha'
                    and k1.kode = p.bentuk_ush    
                left join kd_desa as k2
                    on k2.kdkab = p.kab
                    and k2.kdkec = p.kec
                    and k2.kddes = p.des
                left join kd_romi as k3
                    on k3.jenis = 'katprod'
                    and k3.kode = p.kat_prod
                where p.jenis = '".$datatype."'
                and p.chver = '1'
            ) as a
        ");
        return $data->result_array();
    }
}
?>