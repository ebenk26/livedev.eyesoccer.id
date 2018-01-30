<div class="container eyv-r mt-10">
	<div class="border-box">
	    <table id="liga_inggris" class="table table-striped">
	    	<thead>
	    		<tr>
	    			<th>Pemain</th>
	    			<th>Klub</th>
	    			<th>Gol</th>
	    			<th>Pinalti</th>
	    			<th>Pertama</th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    	<?php
	    		$html = file_get_contents(LinkScrapingTopLigaInggris());
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
        <table id="liga_italia" class="table table-striped">
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
	</div>
</div>
