<div class="container eyv m-t-20" style="width: 100%;">

	<div class="et-content2" style="padding-left: 55px;">
	    <span class="jp">KLASEMEN</span>
	    
        <div class="border-box">
            <table id="liga_indonesia" class="table table-striped" style="display:none;">
				<thead>
					<tr>
						<th>#</th>
						<th>Klub</th>
						<th>MN</th>
						<th>M</th>
						<th>S</th>
						<th>K</th>
						<th>P</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$html = file_get_contents(LinkScrapingLigaIndonesia()); //get the html returned from the following url

					$premiere_doc = new DOMDocument();

					libxml_use_internal_errors(TRUE); //disable libxml errors

					if(!empty($html)){ //if any html is actually returned

						$premiere_doc->loadHTML($html);
						libxml_clear_errors(); //remove errors for yucky html
						
						$pokemon_xpath = new DOMXPath($premiere_doc);

						//get all the h2's with an id
						$pokemon_row = $pokemon_xpath->query('//tr[@data-team_id]');
						$pokemon_list = array();
						$i = 0;
						if($pokemon_row->length > 0){
							foreach($pokemon_row as $row){
								echo "<tr>";
								if($i < 18){
									$types = $pokemon_xpath->query('td', $row);
									$n = 0;
									foreach($types as $type){
										if(!empty($type->nodeValue)){
											if($n != 7){
												if($n != 8){
													if($n != 9){
														if($n != 11){
															$nodeValue = "<td>".$type->nodeValue.'</td>';
															echo $nodeValue;
														}
													}
												}
											}
										}
										$n++;
									}
									$i ++;
								}
								echo "</tr>";
							}
						}
					} 
				?>
				</tbody>
			</table>
			<table id="liga_inggris" class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Klub</th>
						<th>MN</th>
						<th>M</th>
						<th>S</th>
						<th>K</th>
						<th>P</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$html = file_get_contents(LinkScrapingLigaInggris());
					$premiere_doc = new DOMDocument();
					libxml_use_internal_errors(TRUE); //disable libxml errors
					if(!empty($html)){ //if any html is actually returned
						$premiere_doc->loadHTML($html);
						libxml_clear_errors(); //remove errors for yucky html
						$pokemon_xpath = new DOMXPath($premiere_doc);
						//get all the h2's with an id
						$pokemon_row = $pokemon_xpath->query('//tr[@data-team_id]');
						$pokemon_list = array();
						$i = 0;
						if($pokemon_row->length > 0){
							foreach($pokemon_row as $row){
								echo "<tr>";
								if($i < 18){
									$types = $pokemon_xpath->query('td', $row);
									$n = 0;
									foreach($types as $type){
										if(!empty($type->nodeValue)){
											if($n != 7){
												if($n != 8){
													if($n != 9){
														if($n != 11){
															$nodeValue = "<td>".$type->nodeValue.'</td>';
															echo $nodeValue;
														}
													}
												}
											}
										}
										$n++;
									}
									$i ++;
								}
								echo "</tr>";
							}
						}
					} 
				?>
				</tbody>
			</table>
			<table id="liga_italia" class="table table-striped" style="display:none;">
				<thead>
					<tr>
						<th>#</th>
						<th>Klub</th>
						<th>MN</th>
						<th>M</th>
						<th>S</th>
						<th>K</th>
						<th>P</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$html = file_get_contents(LinkScrapingLigaItalia());
					$premiere_doc = new DOMDocument();
					libxml_use_internal_errors(TRUE); //disable libxml errors
					if(!empty($html)){ //if any html is actually returned
						$premiere_doc->loadHTML($html);
						libxml_clear_errors(); //remove errors for yucky html
						$pokemon_xpath = new DOMXPath($premiere_doc);
						//get all the h2's with an id
						$pokemon_row = $pokemon_xpath->query('//tr[@data-team_id]');
						$pokemon_list = array();
						$i = 0;
						if($pokemon_row->length > 0){
							foreach($pokemon_row as $row){
								echo "<tr>";
								if($i < 18){
									$types = $pokemon_xpath->query('td', $row);
									$n = 0;
									foreach($types as $type){
										if(!empty($type->nodeValue)){
											if($n != 7){
												if($n != 8){
													if($n != 9){
														if($n != 11){
															$nodeValue = "<td>".$type->nodeValue.'</td>';
															echo $nodeValue;
														}
													}
												}
											}
										}
										$n++;
									}
									$i ++;
								}
								echo "</tr>";
							}
						}
					} 
				?>
				</tbody>
			</table>
			<table id="liga_spanyol" class="table table-striped" style="display:none;">
				<thead>
					<tr>
						<th>#</th>
						<th>Klub</th>
						<th>MN</th>
						<th>M</th>
						<th>S</th>
						<th>K</th>
						<th>P</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$html = file_get_contents(LinkScrapingLigaSpanyol());
					$premiere_doc = new DOMDocument();
					libxml_use_internal_errors(TRUE); //disable libxml errors
					if(!empty($html)){ //if any html is actually returned
						$premiere_doc->loadHTML($html);
						libxml_clear_errors(); //remove errors for yucky html
						$pokemon_xpath = new DOMXPath($premiere_doc);
						//get all the h2's with an id
						$pokemon_row = $pokemon_xpath->query('//tr[@data-team_id]');
						$pokemon_list = array();
						$i = 0;
						if($pokemon_row->length > 0){
							foreach($pokemon_row as $row){
								echo "<tr>";
								if($i < 18){
									$types = $pokemon_xpath->query('td', $row);
									$n = 0;
									foreach($types as $type){
										if(!empty($type->nodeValue)){
											if($n != 7){
												if($n != 8){
													if($n != 9){
														if($n != 11){
															$nodeValue = "<td>".$type->nodeValue.'</td>';
															echo $nodeValue;
														}
													}
												}
											}
										}
										$n++;
									}
									$i ++;
								}
								echo "</tr>";
							}
						}
					} 
				?>
				</tbody>
			</table>
            <span>
                <a href="" class="ttl">Lihat Selengkapnya</a>
                <i class="material-icons r-ttl">keyboard_arrow_right</i>                                
            </span>                      
        </div>
	</div>
	<div class="et-content2" style="margin-top: 1px;">
		<select id="select_league" name="" selected="true" class="slc-musim fl-r">
			<?php
				foreach($kompetisi as $row)
				{
			?>
					<option value="<?= $row['value']; ?>"> 
						<?= $row['competition'];?> 
					</option>  
			<?php
				}
			?>
	    </select>
	    <div class="border-box">
	        <table id="top_liga_inggris" class="table table-striped">
	        	<thead>
	        		<tr>
	        			<th>Pemain</th>
	        			<th>Klub</th>
	        			<th>Gol</th>
	        			<th>Pinalti</th>
	        			<th>S</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        	<?php
	        		$html = file_get_contents(LinkScrapingLigaInggris());
	        		$premiere_doc = new DOMDocument();
	        		libxml_use_internal_errors(TRUE); //disable libxml errors
	        		if(!empty($html)){ //if any html is actually returned
	        			$premiere_doc->loadHTML($html);
	        			libxml_clear_errors(); //remove errors for yucky html
	        			$pokemon_xpath = new DOMXPath($premiere_doc);
	        			//get all the h2's with an id
	        			$pokemon_row = $pokemon_xpath->query('//tr[@data-person_id]');
	        			$pokemon_list = array();
	        			$i = 0;
	        			if($pokemon_row->length > 0){
	        				foreach($pokemon_row as $row){
	        					echo "<tr>";
	        					if($i < 18){
	        						$types = $pokemon_xpath->query('td', $row);
	        						$n = 0;
	        						foreach($types as $type){
	        							if($type->nodeValue != ""){
	        								$nodeValue = "<td>".$type->nodeValue.'</td>';
	    									echo $nodeValue;
	        							}
	        							$n++;
	        						}
	        						$i ++;
	        					}
	        					echo "</tr>";
	        				}
	        			}
	        		} 
	        	?>
	        	</tbody>
	        </table>
            <table id="top_liga_italia" class="table table-striped">
            	<thead>
            		<tr>
            			<th>Pemain</th>
            			<th>Klub</th>
            			<th>Gol</th>
            			<th>Pinalti</th>
            			<th>S</th>
            		</tr>
            	</thead>
            	<tbody>
            	<?php
            		$html = file_get_contents(LinkScrapingLigaItalia());
            		$premiere_doc = new DOMDocument();
            		libxml_use_internal_errors(TRUE); //disable libxml errors
            		if(!empty($html)){ //if any html is actually returned
            			$premiere_doc->loadHTML($html);
            			libxml_clear_errors(); //remove errors for yucky html
            			$pokemon_xpath = new DOMXPath($premiere_doc);
            			//get all the h2's with an id
            			$pokemon_row = $pokemon_xpath->query('//tr[@data-person_id]');
            			$pokemon_list = array();
            			$i = 0;
            			if($pokemon_row->length > 0){
            				foreach($pokemon_row as $row){
            					echo "<tr>";
            					if($i < 18){
            						$types = $pokemon_xpath->query('td', $row);
            						$n = 0;
            						foreach($types as $type){
            							if($type->nodeValue != ""){
            								$nodeValue = "<td>".$type->nodeValue.'</td>';
        									echo $nodeValue;
            							}
            							$n++;
            						}
            						$i ++;
            					}
            					echo "</tr>";
            				}
            			}
            		} 
            	?>
            	</tbody>
            </table>
            <table id="top_liga_spanyol" class="table table-striped">
            	<thead>
            		<tr>
            			<th>Pemain</th>
            			<th>Klub</th>
            			<th>Gol</th>
            			<th>Pinalti</th>
            			<th>S</th>
            		</tr>
            	</thead>
            	<tbody>
            	<?php
            		$html = file_get_contents(LinkScrapingLigaSpanyol());
            		$premiere_doc = new DOMDocument();
            		libxml_use_internal_errors(TRUE); //disable libxml errors
            		if(!empty($html)){ //if any html is actually returned
            			$premiere_doc->loadHTML($html);
            			libxml_clear_errors(); //remove errors for yucky html
            			$pokemon_xpath = new DOMXPath($premiere_doc);
            			//get all the h2's with an id
            			$pokemon_row = $pokemon_xpath->query('//tr[@data-person_id]');
            			$pokemon_list = array();
            			$i = 0;
            			if($pokemon_row->length > 0){
            				foreach($pokemon_row as $row){
            					echo "<tr>";
            					if($i < 18){
            						$types = $pokemon_xpath->query('td', $row);
            						$n = 0;
            						foreach($types as $type){
            							if($type->nodeValue != ""){
            								$nodeValue = "<td>".$type->nodeValue.'</td>';
        									echo $nodeValue;
            							}
            							$n++;
            						}
            						$i ++;
            					}
            					echo "</tr>";
            				}
            			}
            		} 
            	?>
            	</tbody>
            </table>
	    </div>
	</div>
</div>

<script>
	$(document).ready(function()
	{
		$("#select_league").change(function()
		{
			if($("#select_league").val() == "liga_indonesia")
			{
				$("#liga_inggris,#liga_italia,#liga_spanyol").hide();
				$("#liga_indonesia").show();
			}
			else if($("#select_league").val() == "liga_inggris")
			{
				$("#liga_indonesia,#liga_italia,#liga_spanyol,#top_liga_italia,#top_liga_spanyol").hide();
				$("#liga_inggris,#top_liga_inggris").show();
			}
			else if($("#select_league").val() == "liga_italia")
			{
				$("#liga_indonesia,#liga_inggris,#liga_spanyol,#top_liga_inggris,#top_liga_spanyol").hide();
				$("#liga_italia,#top_liga_italia").show();
			}
			else if($("#select_league").val() == "liga_spanyol")
			{
				$("#liga_indonesia,#liga_inggris,#liga_italia,#top_liga_italia,#top_liga_inggris").hide();
				$("#liga_spanyol,#top_liga_spanyol").show();
			}
		});
	})
</script>