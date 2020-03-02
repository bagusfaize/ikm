<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>IKM Disperindag Riau</title>

    <link
      rel="stylesheet"
      type="text/css"
      href="<?php echo ASSET_PATH; ?>backend/font-awesome/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="<?php echo ASSET_PATH; ?>backend/backendSyle/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo ASSET_PATH; ?>backend/backendSyle/slick-theme.min.css" />
    <link rel="stylesheet" href="<?php echo ASSET_PATH; ?>backend/backendSyle/slick.min.css" />
	
    <link rel="stylesheet" href="<?php echo ASSET_PATH; ?>backend/backendSyle/styles.css" />
	<link rel="stylesheet" href="<?php echo ASSET_PATH; ?>backend/backendSyle/backendStyle.css" />
	
	<!--<link href="<?php echo ASSET_PATH; ?>backend/backendSyle/bootstrap.min.css" rel="stylesheet">-->
  </head>

  <body>
    <header>
      <!-- <nav class="navbar navbar-expand-md fixed-top navbar-dark dark-blue">
        <div class="container">
          <ul class="navbar-nav ml-auto">
            <li>Senin, 27 Juli 2019 | 12:00:01</li>
          </ul>
        </div>
      </nav> -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container">
          <a class="navbar-brand d-flex align-items-center" href="#">
            <img
              src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Coat_of_arms_of_Riau_Islands.png/180px-Coat_of_arms_of_Riau_Islands.png"
              alt=""
            />
            <div>
              <h3 class="mb-1"><b>BIDANG IKM DISPERINDAG</b></h3>
              <p class="mb-0">Provinsi Kepulauan Riau</p>
            </div>
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#"
                  >News <span class="sr-only">(current)</span></a
                >
              </li>

              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dd_profile"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >Profile</a
                >
                <div class="dropdown-menu" aria-labelledby="dd_profile">
                  <a class="dropdown-item" href="#">Tugas Pokok dan Fungsi</a>
                  <a class="dropdown-item" href="#">Pegawai</a>
                  <a class="dropdown-item" href="#">Struktur Organisasi</a>
                </div>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Database</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <section id="header-map">      
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 news-section">
            <h4 class="section-title">Employee</h4>
            <!--<div class="row">
              <div class="col-md-12 mb-12">
                <div class="card">
                  <img
                    src="https://ikm-disperindag.kepriprov.go.id/uploads/20190815-092424.jpeg"
                    alt=""
                  />
                  <div class="p-3">
                    <a href="#" class="card-title"
                      >Kegiatan Pemberdayaan dari BPOM yang diikuti 50 UMKM di
                      Kabupaten Natuna</a
                    >
                    <div>
                      <i class="fa fa-user-circle-o"></i
                      ><span class="mr-3 ml-1"><b>IKM@News</b></span>
                      <i class="fa fa-calendar"></i
                      ><span class="mr-3 ml-1"
                        >Kamis, 15 Agustus 2019 09:24</span
                      >
                    </div>
                    <p>
                      <b>NATUNA</b> – Penguatan ekonomi kerakyatan menjadi salah
                      satu poin penting dalam mewujudkan bangsa yang mandiri,
                      sejahtera dan berdaya saing. Salah satu sektor pendukung
                      ekonomi kerakyatan
                    </p>
                  </div>
                </div>
              </div>              
            </div>-->
			<div id="tablewrapper">
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
				<table cellpadding="0" cellspacing="0" border="0" id="table" class="table tinytable table">
					<thead>
						<tr>
							<th class="nosort"><h3>ID</h3></th>
							<th><h3>Name</h3></th>
							<th><h3>Phone Number</h3></th>
							<th><h3>Email</h3></th>
							<th><h3>Birthdate</h3></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Ezekiel Hart</td>
							<td>(627) 536-4760</td>
							<td><a href="mailto:#">tortor@est.ca</a></td>
							<td>12/02/1962</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Jaquelyn Pace</td>
							<td>(921) 943-5780</td>
							<td><a href="mailto:#">in@elementum.org</a></td>
							<td>06/03/1957</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Lois Pickett</td>
							<td>(835) 361-5993</td>
							<td><a href="mailto:#">arcu.ac@disse.ca</a></td>
							<td>10/15/1983</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Keane Raymond</td>
							<td>(605) 803-1561</td>
							<td><a href="mailto:#">at.risus.Nunc@ipsum.com</a></td>
							<td>07/30/1982</td>
						</tr>
						<tr>
							<td>5</td>
							<td>Porter Thomas</td>
							<td>(666) 569-9894</td>
							<td><a href="mailto:#">non@Proin.ca</a></td>
							<td>09/27/1986</td>
						</tr>
						<tr>
							<td>6</td>
							<td>Imani Murphy</td>
							<td>(771) 294-6690</td>
							<td><a href="mailto:#">Aenean.sed@elit.ca</a></td>
							<td>10/23/1970</td>
						</tr>
						<tr>
							<td>7</td>
							<td>Zachery Guthrie</td>
							<td>(851) 784-4129</td>
							<td><a href="mailto:#">nunc.nulla@vel.com</a></td>
							<td>12/22/1972</td>
						</tr>
						<tr>
							<td>8</td>
							<td>Harper Bowen</td>
							<td>(810) 652-6704</td>
							<td><a href="mailto:#">dis@duinec.ca</a></td>
							<td>10/26/1973</td>
						</tr>
						<tr>
							<td>9</td>
							<td>Caldwell Larson</td>
							<td>(850) 562-3177</td>
							<td><a href="mailto:#">elit@dolor.com</a></td>
							<td>07/20/1985</td>
						</tr>
						<tr>
							<td>10</td>
							<td>Baker Osborn</td>
							<td>(378) 371-0559</td>
							<td><a href="mailto:#">turpis.Nulla@ac.edu</a></td>
							<td>03/29/1970</td>
						</tr>
						<tr>
							<td>11</td>
							<td>Yael Owens</td>
							<td>(465) 520-1801</td>
							<td><a href="mailto:#">nunc.ac.mattis@enim.com</a></td>
							<td>08/10/1963</td>
						</tr>
						<tr>
							<td>12</td>
							<td>Fletcher Briggs</td>
							<td>(992) 962-9419</td>
							<td><a href="mailto:#">amet.ante@lentesque.edu</a></td>
							<td>08/12/1971</td>
						</tr>
						<tr>
							<td>13</td>
							<td>Maggy Murphy</td>
							<td>(585) 210-0390</td>
							<td><a href="mailto:#">eu@Integer.com</a></td>
							<td>07/11/1968</td>
						</tr>
						<tr>
							<td>14</td>
							<td>Maggie Blake</td>
							<td>(489) 101-5447</td>
							<td><a href="mailto:#">rutrum.non.hendrerit@iaculis.org</a></td>
							<td>04/11/1970</td>
						</tr>
						<tr>
							<td>15</td>
							<td>Ginger Bell</td>
							<td>(934) 692-7294</td>
							<td><a href="mailto:#">erat.in.conetuer@pedenout.org</a></td>
							<td>06/10/1957</td>
						</tr>
						<tr>
							<td>16</td>
							<td>Iliana Ballard</td>
							<td>(806) 835-7035</td>
							<td><a href="mailto:#">vel.sapien@mi.ca</a></td>
							<td>02/09/1989</td>
						</tr>
						<tr>
							<td>17</td>
							<td>Alisa Monroe</td>
							<td>(859) 974-4442</td>
							<td><a href="mailto:#">adipiscing.ligula@aretraNam.edu</a></td>
							<td>02/14/1990</td>
						</tr>
						<tr>
							<td>18</td>
							<td>Kenyon Luna</td>
							<td>(673) 147-0443</td>
							<td><a href="mailto:#">Cras@Vestibulumant.edu</a></td>
							<td>04/14/1981</td>
						</tr>
						<tr>
							<td>19</td>
							<td>Nola Kerr</td>
							<td>(340) 430-0424</td>
							<td><a href="mailto:#">tincidunt@vurmagna.com</a></td>
							<td>11/06/1959</td>
						</tr>
						<tr>
							<td>20</td>
							<td>Gail Cash</td>
							<td>(291) 455-8520</td>
							<td><a href="mailto:#">massa.rutrum@Nullamlob.ca</a></td>
							<td>09/09/1970</td>
						</tr>
						<tr>
							<td>21</td>
							<td>Kalia Ayala</td>
							<td>(142) 520-1128</td>
							<td><a href="mailto:#">Etiam.laoreet@velit.org</a></td>
							<td>04/25/1971</td>
						</tr>
						<tr>
							<td>22</td>
							<td>Violet Ballard</td>
							<td>(126) 374-6078</td>
							<td><a href="mailto:#">Integer.in.magna@ntumcollis.edu</a></td>
							<td>01/23/1984</td>
						</tr>
						<tr>
							<td>23</td>
							<td>Kevin Carrillo</td>
							<td>(687) 483-9669</td>
							<td><a href="mailto:#">in@adipiscing.edu</a></td>
							<td>03/17/1977</td>
						</tr>
						<tr>
							<td>24</td>
							<td>Alexandra Nixon</td>
							<td>(422) 644-3488</td>
							<td><a href="mailto:#">nec.luctus@ornarefacilisis.com</a></td>
							<td>12/01/1981</td>
						</tr>
						<tr>
							<td>25</td>
							<td>Charissa Manning</td>
							<td>(438) 395-9392</td>
							<td><a href="mailto:#">nibh.vulputate@necelendnon.org</a></td>
							<td>07/01/1980</td>
						</tr>
						<tr>
							<td>26</td>
							<td>Noah Smith</td>
							<td>(963) 652-2643</td>
							<td><a href="mailto:#">Sed.neque@Duis.org</a></td>
							<td>01/19/1986</td>
						</tr>
						<tr>
							<td>27</td>
							<td>Patience Battle</td>
							<td>(294) 644-5306</td>
							<td><a href="mailto:#">tempus.mauris@elempurus.com</a></td>
							<td>09/16/1988</td>
						</tr>
						<tr>
							<td>28</td>
							<td>Kathleen Hudson</td>
							<td>(190) 189-1420</td>
							<td><a href="mailto:#">orci.quis@auctor.com</a></td> 
							<td>08/03/1963</td>
						</tr>
						<tr>
							<td>29</td>
							<td>Marsden Bowman</td>
							<td>(163) 780-6121</td>
							<td><a href="mailto:#">mauris.a@Sedcongueelit.edu</a></td>
							<td>03/08/1974</td>
						</tr>
						<tr>
							<td>30</td>
							<td>Dorian Hodge</td>
							<td>(304) 536-8850</td>
							<td><a href="mailto:#">pellentesque@laoreet.org</a></td>
							<td>08/16/1978</td>
						</tr>
						<tr>
							<td>31</td>
							<td>Levi Britt</td>
							<td>(272) 171-5731</td>
							<td><a href="mailto:#">felis@Donecfeugiat.ca</a></td> 
							<td>12/10/1988</td>
						</tr>
						<tr>
							<td>32</td>
							<td>Rana Blake</td>
							<td>(608) 893-4909</td>
							<td><a href="mailto:#">malesuada.fames@dui.edu</a></td>
							<td>07/23/1959</td>
						</tr>
						<tr>
							<td>33</td>
							<td>Helen Mccullough</td>
							<td>(937) 368-5946</td>
							<td><a href="mailto:#">sociis.natoque@myipsum.org</a></td>
							<td>09/13/1980</td>
						</tr>
						<tr>
							<td>34</td>
							<td>Gil Ferguson</td>
							<td>(832) 581-6953</td>
							<td><a href="mailto:#">libero@Infaucibus.com</a></td> 
							<td>04/19/1980</td>
						</tr>
						<tr>
							<td>35</td>
							<td>Judah Manning</td>
							<td>(332) 888-8768</td>
							<td><a href="mailto:#">congue@Nuncut.com</a></td>
							<td>07/16/1974</td>
						</tr>
						<tr>
							<td>36</td>
							<td>Yoshi Humphrey</td>
							<td>(961) 215-0426</td>
							<td><a href="mailto:#">pharetra@rutrumFusce.edu</a></td>
							<td>01/13/1962</td>
						</tr>
						<tr>
							<td>37</td>
							<td>Idona Williams</td>
							<td>(163) 580-2609</td>
							<td><a href="mailto:#">Integer.aliquam@Sedetlibero.org</a></td>
							<td>08/27/1967</td>
						</tr>
						<tr>
							<td>38</td>
							<td>Petra Bennett</td>
							<td>(976) 799-4111</td>
							<td><a href="mailto:#">Proin@Donecelementum.org</a></td>
							<td>01/02/1959</td>
						</tr>
						<tr>
							<td>39</td>
							<td>Phyllis Rogers</td>
							<td>(798) 959-3321</td>
							<td><a href="mailto:#">eget.dictum.placerat@idlibero.ca</a></td>
							<td>11/27/1961</td>
						</tr>
						<tr>
							<td>40</td>
							<td>Fritz Benton</td>
							<td>(525) 353-2984</td>
							<td><a href="mailto:#">a@diamnunc.com</a></td>
							<td>10/02/1957</td>
						</tr>
						<tr>
							<td>41</td>
							<td>Mannix Davidson</td>
							<td>(106) 260-1651</td>
							<td><a href="mailto:#">pulvinar@Duisvolutpat.org</a></td>
							<td>08/24/1964</td>
						</tr>
						<tr>
							<td>42</td>
							<td>Grant Lawrence</td>
							<td>(807) 487-5786</td>
							<td><a href="mailto:#">a@interdumlibero.ca</a></td>
							<td>10/10/1973</td>
						</tr>
						<tr>
							<td>43</td>
							<td>Laurel Ortiz</td>
							<td>(945) 481-7808</td>
							<td><a href="mailto:#">laoreet.posuere@vallis.com</a></td>
							<td>08/19/1962</td>
						</tr>
						<tr>
							<td>44</td>
							<td>Lewis Frank</td>
							<td>(844) 314-8683</td>
							<td><a href="mailto:#">fames@gravida.edu</a></td>
							<td>12/01/1966</td>
						</tr>
						<tr>
							<td>45</td>
							<td>Yasir Knox</td>
							<td>(814) 509-0367</td>
							<td><a href="mailto:#">Cras.vulputate.velit@acusUt.com</a></td>
							<td>10/23/1981</td>
						</tr>
						<tr>
							<td>46</td>
							<td>Palmer Newman</td>
							<td>(955) 748-1014</td>
							<td><a href="mailto:#">fringilla@id.edu</a></td>
							<td>10/29/1980</td>
						</tr>
						<tr>
							<td>47</td>
							<td>Tate Webster</td>
							<td>(107) 247-3380</td>
							<td><a href="mailto:#">pellentesque@pedeultri.com</a></td>
							<td>06/11/1963</td>
						</tr>
						<tr>
							<td>48</td>
							<td>Charity Hahn</td>
							<td>(395) 200-9188</td>
							<td><a href="mailto:#">ac@Quisque.edu</a></td>
							<td>08/04/1976</td>
						</tr>
						<tr>
							<td>49</td>
							<td>Katell Crosby</td>
							<td>(259) 659-7498</td>
							<td><a href="mailto:#">tincidunt.vehicula@ura.com</a></td>
							<td>12/31/1961</td>
						</tr>
					</tbody>
				</table>
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
      </div>
    </section>
</html>
