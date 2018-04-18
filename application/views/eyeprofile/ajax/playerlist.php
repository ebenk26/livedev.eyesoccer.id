<?php  $res = json_decode($res); ?>
<table class="stripe cell-border table-striped table-hover" cellspacing="0" width="100%">
	<thead id="back900">
		<th>No</th>
		<th>Pemain</th>
		<th>Tgl. Lahir</th>
		<th>Posisi</th>
		<th>Klub</th>
		<th>Kewarganegaraan</th>
	</thead>
	<tbody >
		<?php $no = 0; foreach($res->data as $r): $no++ ?>
		<tr>
			<td><?php echo $no?></td>
			<td style=""><img  src="<?php echo $r->url_pic?>" style="width: 40px;height:40px;border-radius:50%;vertical-align: inherit;"> 
				 <?php echo anchor(PLAYERDETAIL.$r->name,$r->name)?></td>
			<td><?php echo formatDate($r->birth_date)?></td>
			<td><?php echo $r->position_a?></td>
			<td><?php echo $r->club?></td>
			<td><?php echo $r->nationality?></td>
		</tr>
		<?php endforeach; ?>

	</tbody>
	
</table>
<?php
//pagination 
$cc  = json_decode($count)->data;
$countLocalPlayer = $cc->player_local;
$limit = $res->query->limit;
(int) $page  = $res->query->page;
$totalPage = ceil($countLocalPlayer/$limit); //total page
$competition = $res->query->competition;
$uri = ($competition == null ? 'Liga Indonesia 1' : $competition);?>

<div class="pull-right">
	
  <ul class="orange-default">
  	<?php echo ($page > 1 ? '<li>'.anchor(pPLAYER.$uri.'/page/'.($page-1) ,'Sebelumnya','display="block"').'</li>' : '')?>
    <?php  
	    if($page > 4 ){?>

	    <li><?php echo anchor(pPLAYER.$uri.'/page/1','1')?></li>
	    <li>...</li>
    <?php }
   
    for($i=($page-2); $i < ($page+2);$i++):

    if($i < 1 ){ continue; }
    if($i > $totalPage){ break;}?>

    	<li <?php echo ($page == $i ? 'class="active"' : '')?>><?php echo  anchor(pPLAYER.$uri.'/page/'.$i,$i)?></li>

    <?php endfor;?>
    <?php if($totalPage > $page){?>
		<li>...</li>
		<li><?php echo anchor(pPLAYER.$uri.'/page/'.$totalPage,$totalPage) ?></li>
    <?php }?>

   <?php echo ($page < $totalPage ?'<li>'.anchor(pPLAYER.$uri.'/page/'.($page > 0 ? ($page+1) : $page),'Selanjutnya').'</li>' : '')?>
    
  </ul>
</div>