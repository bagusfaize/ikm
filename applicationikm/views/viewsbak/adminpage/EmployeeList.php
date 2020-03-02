<body>
<body>
    <section id="header-map">      
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 news-section">
            <h4 class="section-title">Employee</h4>  
			<div class="table-responsive">
				<div id="tableheader">
		  		<?php echo anchor('adminpage/EmployeeList/AddEmployee', '<button type="button" class="btn btn-themeBackground" style="float:left; margin-right:10px;">Add New Employee</button>') ?>
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
								<th class="nosort"><h3>ID</h3></th>
								<th><h3>NIP</h3></th>
								<th><h3>Name</h3></th>
								<th><h3>Email</h3></th>
								<th><h3>Alamat</h3></th>
								<th><h3>Jabatan</h3></th>
								<th width="10px"><h3>Action</h3></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($EmployeeData as $row)
							{ ?>
							<tr>
								<td><?php echo $row['uid']; ?></td>
								<td><?php echo $row['nip']; ?></td>
								<td><?php echo $row['nama']; ?></td>
								<td><a href="mailto:#"><?php echo $row['email']; ?></a></td>
								<td><?php echo $row['alamat']; ?></td>
								<td><?php echo $row['jabatan']; ?></td>
								<td style="text-align:center;">
									<?php $onclick = array('class'=> "link-class", 'onclick'=>"return confirm('Are you sure?')");?>
									<?php echo anchor('adminpage/EmployeeList_Detail/getDetail/'.$row['uid'], '<i class="fa fa-pencil"></i>', 'class="link-class"') ?> | 
									<?php echo anchor('adminpage/EmployeeList/Delete/'.$row['idx'], '<i class="fa fa-trash"></i>', $onclick); ?></td>
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
