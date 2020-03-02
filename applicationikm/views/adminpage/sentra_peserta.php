<body>
<body>

    <section>
      <div class="container" style="padding: 0px;">
        <div class="row">
          <div class="col-lg-12 news-section">
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
				<table cellpadding="0" cellspacing="0" border="0" id="table" class="table tinytable">
						<thead>
							<tr>
								<th><h3>Nama Perusahaan</h3></th>
								<th width="10px"><h3>Action</h3></th>
							</tr>
						</thead>
						<tbody>
							<?php $kat = "";
							foreach ($PesertaData as $row)
							{ 
                            ?>
							<tr>
				                  <td><?php echo $row['nm_prsh']; ?></td>
								  <td style="text-align:center;">
									<?php $onclick = array('class'=> "link-class", 'onclick'=>"return confirm('Are you sure?')");?>
									<?php echo anchor('adminpage/ByAdmin_Sentra/getSearch/'.$row['idx'], '<i class="fa fa-search"></i>', 'class="link-class"') ?>
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
