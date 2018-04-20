<?php  
$res[0] = json_decode($res[0]); ?>
<table class="stripe cell-border table-striped table-hover" cellspacing="0" width="100%">
	<thead id="back900">
		<th>No</th>
		<th>Nama</th>
		<th>Klub</th>
		<th>Tgl Lahir</th>
		<th>Posisi</th>
		<th>Kewarganegaraan</th>
		<th>lisensi</th>
		
	</thead>
	<tbody >
		<?php $no = 0; foreach($res[0]->data as $r): $no++ ?>
		<tr>
			<td><?php echo $no?></td>
			<td style=""><img  src="<?php echo checkImg($r->url_pic)?>" style="width: 40px;height:40px;border-radius:50%;vertical-align: inherit;"> 
				 <?php echo anchor(OFFICIALDETAIL.$r->slug,$r->name)?></td>
			<td><?php echo $r->club?></td>	
			<td><?php echo formatDate($r->birth_date)?></td>
			<td><?php echo $r->position?></td>
			<td><?php echo $r->nationality?></td>
			<td><?php echo $r->license?></td>
		</tr>
		<?php endforeach; ?>

	</tbody>
	
</table>
<?php

$res[1]  = json_decode($res[1])->data;
$countLocalPlayer = $res[1][0]->cc;
$limit = $res[0]->query->limit;
(int) $page  = $res[0]->query->page;
$totalPage = ceil($countLocalPlayer/$limit); //total page
$competition = $res[0]->query->competition;
$uri = ($competition == null ? 'Liga Indonesia 1' : $competition);?>

<div class="pull-right">
	
  <ul class="orange-default">
  	<?php echo ($page > 1 ? '<li>'.anchor(pOFFICIAL.$uri.'/page/'.($page-1) ,'Sebelumnya','display="block"').'</li>' : '')?>
    <?php  
	    if($page > 4 ){?>

	    <li><?php echo anchor(pOFFICIAL.$uri.'/page/1','1')?></li>
	    <li>...</li>
    <?php }
   
    for($i=($page-2); $i < ($page+2);$i++):

    if($i < 1 ){ continue; }
    if($i > $totalPage){ break;}?>

    	<li <?php echo ($page == $i ? 'class="active"' : '')?>><?php echo  anchor(pOFFICIAL.$uri.'/page/'.$i,$i)?></li>

    <?php endfor;?>
    <?php if($totalPage > $page){?>
		<li>...</li>
		<li><?php echo anchor(pOFFICIAL.$uri.'/page/'.$totalPage,$totalPage) ?></li>
    <?php }?>

   <?php echo ($page < $totalPage ?'<li>'.anchor(pOFFICIAL.$uri.'/page/'.($page > 0 ? ($page+1) : $page),'Selanjutnya').'</li>' : '')?>
    
  </ul>
</div>