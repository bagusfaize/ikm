<body>
<body>
    <section id="header-map">      
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 news-section">
            <h4 class="section-title">Data IKM</h4>  
			<div class="table-responsive">
				<div id="tableheader">
					<div class="search">
						<select id="columns" onchange="sorter.search('query')"></select>
						<input type="text" id="query" onkeyup="sorter.search('query')" />
					</div>
					<span class="details">
						<div>Records <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div>
						<div><a href="javascript:sorter.reset()">reset</a></div>
					</span>
				</div>
				<table cellpadding="0" cellspacing="0" id="table" class="table tinytable">
						<thead>
							<tr>
									<th><h3>Badan Usaha</h3></th>
									<th><h3>Nama Perusahaan</h3></th>
									<th><h3>Nama Pemilik Perusahaan</h3></th>
									<th><h3>Jalan</h3></th>
									<th><h3>Kelurahan/Desa</h3></th>
									<th><h3>Kecamatan</h3></th>
									<th><h3>Telp/Hp/Fax</h3></th>
									<th><h3>Email</h3></th>
									<th><h3>Website</h3></th>
									<th><h3>Izin</h3></th>
									<th><h3>Tahun Izin</h3></th>
									<th><h3>Tahun Berdiri</h3></th>
									<th><h3>Kategori Produk</h3></th>
									<th><h3>KBLI</h3></th>
									<th><h3>Produk</h3></th>
									<th><h3>TK Pria</h3></th>
									<th><h3>TK Wanita</h3></th>
									<th><h3>Nilai Investasi (Rp)</h3></th>
									<th><h3>Jumlah Produksi</h3></th>
									<th><h3>Satuan</h3></th>
									<th><h3>Total Nilai Produksi (Rp)</h3></th>
									<th><h3>Total Nilai Bahan Baku (Rp)</h3></th>
									<th><h3>Total Nilai Penjualan (Rp)</h3></th>
									<th><h3>Total Nilai Export (Rp)</h3></th>
									<th><h3>Tujuan Penjualan (Dalam Negeri)</h3></th>
									<th><h3>Tujuan Export</h3></th>
									<th width="10px"><h3>Action</h3></h3></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($IKMData as $row)
							{ ?>
							<tr>
								<td><?php echo $row['badanUsaha']; ?></td>
								<td><?php echo $row['perusahaan']; ?></td>
								<td><?php echo $row['pemilik']; ?></td>
								<td><?php echo $row['jalan']; ?></td>
								<td><?php echo $row['kelurahan']; ?></td>
								<td><?php echo $row['kecamatan']; ?></td>
								<td><?php echo $row['telp']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['website']; ?></td>
								<td><?php echo $row['izin']; ?></td>
								<td><?php echo $row['izinthn']; ?></td>
								<td><?php echo $row['tahunBerdiri']; ?></td>
								<td><?php echo $row['kategoriProduk']; ?></td>
								<td><?php echo $row['kbli']; ?></td>
								<td><?php echo $row['produk']; ?></td>
								<td><?php echo $row['lelaki']; ?></td>
								<td><?php echo $row['wanita']; ?></td>
								<td><?php echo $row['investasi']; ?></td>
								<td><?php echo $row['jmlprod']; ?></td>
								<td><?php echo $row['satuanprod']; ?></td>
								<td><?php echo $row['totalProduksi']; ?></td>
								<td><?php echo $row['totalBahanBaku']; ?></td>
								<td><?php echo $row['totalPenjualan']; ?></td>
								<td><?php echo str_replace("[|", "", $row['totalExportnilai']); ?></td>
								<td><?php echo str_replace("[|", "", $row['totaldalamnegeri']); ?></td>
								<td><?php echo str_replace("[|", "", $row['totalExporttujuan']); ?></td>
								<td style="text-align:center;">
									<?php echo anchor('adminpage/EmployeeList_Detail/getDetail/'.$row['idx'], '<i class="fa fa-pencil"></i>', 'class="link-class"') ?>
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
</html>
