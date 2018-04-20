<?php 
$res = json_decode($res);

echo "<div class='ep2box fl-l pd-t-20'>";		

	foreach($res->data as $r){
	$url = preg_match("/[^\/]+$/", $r->url_logo, $matches);
	echo '<a href="'.CLUBDETAIL.$r->slug.'" style="text-decoration:unset;color:#424242;">'.'<div class="box-content ep2 fl-l">';
			echo '<img src="'.(count($matches) == 0 ? imgCache('LOGO UNTUK APLIKASI.jpg') : $r->url_logo).'" alt="" >';
			echo '<div class="detail">';
				echo '<h2>'.$r->name.'</h2>';
				echo '<h3>'.$r->competition.'</h3>';
				echo "<table>
					<tr>
						<td>Squad</td>";
						echo "<td>: ".$r->number_of_player."</td>";
					echo "</tr>
					<tr>";
						echo "<td>Manager</td>";
						echo "<td>: ".getManager($r->club_id)."</td>";
					echo "</tr>
				</table>
			</div>
		</div>
	</a>";
	}
echo "</div>";?>


<?php
//pagination 

$cc  = json_decode($count)->data;
$totalRows = $cc[0]->cc;
$limit = $res->query->limit;
(int) $page  = $res->query->page;
$totalPage = ceil($totalRows/$limit); //total page
$competition = $res->query->competition;
$league = $res->query->league;
$uri = ($competition == null ? 'Liga Indonesia 1' : ($league != null || $league != '' ? $competition.'/'.$league : $competition));?>

<div class="pull-right">
	
  <ul class="orange-default">
  	<?php echo ($page > 1 ? '<li>'.anchor(pCLUB.$uri.'/page/'.($page-1) ,'Sebelumnya','display="block"').'</li>' : '')?>
    <?php  
	    if($page > 4 ){?>

	    <li><?php echo anchor(pCLUB.$uri.'/page/1','1')?></li>
	    <li>...</li>
    <?php }
   
    for($i=($page-2); $i < ($page+2);$i++):

    if($i < 1 ){ continue; }
    if($i > $totalPage){ break;}?>

    	<li <?php echo ($page == $i ? 'class="active"' : '')?>><?php echo  anchor(pCLUB.$uri.'/page/'.$i,$i)?></li>

    <?php endfor;?>
    <?php if($totalPage > $page AND $page > 3){?>
		<li>...</li>
		<li><?php echo anchor(pCLUB.$uri.'/page/'.$totalPage,$totalPage) ?></li>
    <?php }?>

   <?php echo ($page < $totalPage ?'<li>'.anchor(pCLUB.$uri.'/page/'.($page > 0 ? ($page+1) : $page),'Selanjutnya').'</li>' : '')?>
    
  </ul>
</div>