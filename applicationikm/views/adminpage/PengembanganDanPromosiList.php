<body>
<body>
    <section id="header-map">      
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 news-section">
		  
            
			<div class="table-responsive">
				<div id="tableheader">
               <!--< <div class="nopadding"><button type="button" style="float:left; margin-right:10px;" class="btn btn-themeBackground" data-toggle="modal" data-target="#modalProduk">Tambah</button></div> -->
				<?php echo anchor('adminpage/DP_PengembanganDanPromosi/PengembanganDanPromosi_Add', '<button type="button" class="btn btn-themeBackground" style="float:left; margin-right:10px;">Add Pembina</button>') ?>
		  			<div class="search">
						<select id="columns" onchange="sorter.search('query')"></select>
						<input type="text" id="query" onkeyup="sorter.search('query')" />
					</div>
					<span class="details">
						<div>Records <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div>
						<div><a href="javascript:sorter.reset()">reset</a></div>
					</span>
				</div>
				<!--<h4 class="section-title">Daftar Bahan Baku</h4> -->
				 <h3 class="section-title" >Data Pembinaan :  Pengembangan SDM Dan Promosi  </h3> 
				<table cellpadding="0" cellspacing="0" border="0" id="table" class="table tinytable">
						<thead>
							<tr>
								<th class="nosort"><h3>No</h3></th>
								<th><h3>Tahun Anggaran</h3></th>
								<th><h3>Pemerintah</h3></th>
								<th><h3>Nama Pembina</h3></th>
								<th><h3>Tanggal Mulai</h3></th>
								<th><h3>Tanggal Selesai</h3></th>
								<th><h3>Jumlah Peserta</h3></th>
								<th><h3>Lokasi</h3></th>
								<th><h3>Sumber Dana</h3></th>
								<th><h3>penyelenggara</h3></th>
								
								<th width="10px"><h3>Action</h3></th>
							</tr>
						</thead>
						<tbody>
							<?php $kat = "";
							foreach ($ProdukData as $row)
							{ 
                             
                               
                            ?>
							<tr>
							<td><?php echo $row['idx']; ?></td>
								
								
								<td><?php echo $row['th_anggaran']; ?></td>
								<td><?php echo $row['b']; ?></td>
								<td><?php echo $row['nama']; ?></td>
								<td><?php echo $row['tgl_mulai']; ?></td>
								<td><?php echo $row['tgl_selesai']; ?></td>
								<td><?php echo $row['jml_binaan']; ?></td>
								<td><?php echo $row['lokasi']; ?></td>
								<td><?php echo $row['arti']; ?></td>
								<td><?php echo $row['penyelenggara']; ?></td>
								
								<td style="text-align:center;">
									<?php $onclick = array('class'=> "link-class", 'onclick'=>"return confirm('Are you sure?')");?>
									<?php echo anchor('adminpage/DP_PengembanganDanPromosi/getDetail/'.$row['idx'], '<i class="fa fa-pencil"></i>', 'class="link-class"') ?> |
									<?php echo anchor('adminpage/DP_PengembanganDanPromosi/Delete/'.$row['idx'], '<i class="fa fa-trash"></i>', $onclick); ?></td>
							</tr>
							<?php }
							?>
						</tbody>
					</table> 
		  </div>
		  <div id="tablefooter">
				  <div id="tablenav">
						<div>
							<img src="<?php echo ASSET_PATH; ?>backend/images/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
							<img src="<?php echo ASSET_PATH; ?>backend/images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
							<img src="<?php echo ASSET_PATH; ?>backend/images/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
							<img src="<?php echo ASSET_PATH; ?>backend/images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
						</div>
						<div>
							<select id="pagedropdown"></select>
						</div>
						<div>
							<a href="javascript:sorter.showall()">view all</a>
						</div>
					</div>
					<div id="tablelocation">
						<div>
							<select onchange="sorter.size(this.value)">
							<option value="5">5</option>
								<option value="10" selected="selected">10</option>
								<option value="20">20</option>
								<option value="50">50</option>
								<option value="100">100</option>
							</select>
							<span>Entries Per Page</span>
						</div>
						<div class="page">Page <span id="currentpage"></span> of <span id="totalpages"></span></div>
					</div>
				</div>
			</div>
        </div>
      </div>
    </section>

<!-- Modal -->
<div class="modal fade" id="modalProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <?php echo form_open('adminpage/DP_PengembanganDanPromosi/insert'); ?>
      <div class="modal-body">
        <table width="100%">
          <tr>				
            <td colspan="3"><label for="usr">Nama Baku</label></td>
            <td>:</td>
            <td colspan="9"><input type="text" class="form-control" id="produk" name="produk"/></td>
          </tr>
          <tr>				
            <td colspan="3"><label for="usr">Kategori</label></td>
            <td>:</td>
            <td colspan="9">
                <select class="form-control" id="CboKategori" name="CboKategori">
				<?php foreach($cbokatbah as $row) { ?>
				<option value="<?php echo row['kode'];  ?>" ><?php echo $row['arti']; ?></option>
				<?php } ?>
                    
                </select>
            </td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
</html>
