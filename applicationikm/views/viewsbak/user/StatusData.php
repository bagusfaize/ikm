<body>

    <body>
        <section id="header-map">
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 news-section">
                        <h4 class="section-title">Status Data</h4>
                        <div class="table-responsive">
                            <!--<div id="tableheader">
					<div class="search">
						<select id="columns" onchange="sorter.search('query')"></select>
						<input type="text" id="query" onkeyup="sorter.search('query')" />
					</div>
					<span class="details">
						<div>Records <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div>
						<div><a href="javascript:sorter.reset()">reset</a></div>
					</span>
				</div>-->
                            <table cellpadding="0" cellspacing="0" border="0" id="table" class="table tinytable">
                                <thead>
                                    <tr>
                                        <tr>
                                            <th rowspan="2" class="nosort">
                                                <h3>ID</h3></th>
                                            <th rowspan="2">
                                                <h3>Data</h3></th>
                                            <th rowspan="2">
                                                <h3>Nama Perusahaan</h3></th>
                                            <th rowspan="2">
                                                <h3>Pemilik</h3></th>
                                            <th rowspan="2">
                                                <h3>Tanggal Input</h3></th>
                                            <th rowspan="2">
                                                <h3>Tanggal Kirim</h3></th>
                                            <th rowspan="2">
                                                <h3>Lihat Data</h3></th>
                                            <th colspan="2">
                                                <h3>Verifikasi</h3></th>
                                            <th colspan="3">
                                                <h3>Hasil</h3></th>
                                            <th rowspan="2">
                                                <h3>Keterangan</h3></th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <h3>Metode</h3></th>
                                            <th>
                                                <h3>Tanggal</h3></th>
                                            <th>
                                                <h3>Verifikasi</h3></th>
                                            <th>
                                                <h3>Kembali</h3></th>
                                            <th>
                                                <h3>Delete</h3></th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <?php
							foreach ($StatusData as $row)
							{ ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['idx']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['jenis']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['nm_prsh']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['nm_pemilik']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['tglmasuk']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['tglkirim']; ?>
                                            </td>
                                            <td>link</td>
                                            <td>metode</td>
                                            <td>
                                                <?php echo $row['tglverifikasi']; ?>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="chver" id="chver" value="1" <?php if ($row[ 'chver']==1 ) echo "checked"?> disabled /></td>
                                            </td>
                                            <td>
                                                <?php  if($row['chkem'] == 1){ ?>
                                                    <input type="checkbox" name="chkem" id="chkem" value="1" <?php echo "checked"?> disabled/>
                                                    <input type="image" src="../images/document-edit.png" id="<?php echo 'submit'.$row['idx'];?>" name="submit" onclick="sender(this.id)" />
                                                    <?php } else {?>
                                                        <input type="checkbox" name="chkem" id="chkem" value="1" disabled/>
                                                        <?php } ?>
                                            </td>
                                            <td>
                                                <?php
										echo '<input type="checkbox" name="chdel" id="chdel" value="1" disabled '. (($row['chdel'] == '1') ? 'checked' : '') .' />';
									?>
                                            </td>
                                            <td style="text-align:center;">
                                                <button class="btn btn-secondary btn-themed" data-toggle="modal" data-target="#StatusDataModal<?php echo $row['idx']; ?>"><i class="fa fa-eye"></i></button>
                                            </td>
                                        </tr>
                                        <?php }
							?>
                                </tbody>
                            </table>
                        </div>
						<!--
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
                        </div>-->

                    </div>
                </div>
            </div>
        </section>

            <!-- Start Modal Detail Activity-->
            <?php foreach($StatusData as $row){ ?>
                <div id="StatusDataModal<?php echo $row['idx']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <?php	
		$CI =& get_instance();
		$CI->load->model('user/MStatusData');
		$resultx = $CI->MStatusData->get_statusDataHistory($row['idx']);  
		foreach($resultx as $rowHistory){ 
	?>
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title"><?php echo $row['nm_prsh']; ?></h5>
                                </div>
                                <div class="modal-body">
                                    <table style="width:100%;">
                                        <tbody>
                                            <tr>
                                                <td>Tanggal Kirim</td>
                                                <td>
                                                    <?php echo $rowHistory['tglkirim']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Verifikasi</td>
                                                <td>
                                                    <?php echo $rowHistory['tglverifikasi']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Verifikator</td>
                                                <td>
                                                    <?php echo $rowHistory['verifikator']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Hasil</td>
                                                <td>
                                                    <?php echo $rowHistory['hasil']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>
                                                    <?php echo $rowHistory['ket']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>File</td>
                                                <td>
                                                    <?php echo $rowHistory['filePath'] ? "<a href='".$rowHistory['filePath']."'>".$rowHistory['fileName']."</a>" : ''; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info" onclick="window.print()" style="border: solid 1px;border-color: #4b4b4b;">Print</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="border: solid 1px;border-color: #4b4b4b;">Close</button>
                                </div>
                            </div>
                            <?php } ?>
                    </div>
                </div>
                <?php } ?>
                    <!--End Modal-->

                    </html>