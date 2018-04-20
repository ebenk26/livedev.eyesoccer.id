<?php
$res[0] = json_decode($res[0]);
$res[1] = json_decode($res[1]); ?>

<div class="container box-border-radius fl-l mt-30">
				
    <div class="fl-l img-80" style="display:none;">				
        <img src="<?=imgUrl()?>assets/img/content_11.jpg" alt="" height="100%">
    </div>
    <div class="tabel-liga-370 b-r-1 table-pd-3 fl-l" style="width:500px;">
        <table>
            <tr>
                <td>Level Liga</td>
                <td>: <?php echo $res[0]->query->competition; ?></td>
            </tr>
            <tr>
                <td>Jumlah Klub</td> 
                <td>: <?php echo $res[1]->data[0]->cc?> Klub</td>
            </tr>
            <tr>
                <td>Jumlah Pemain</td>
                <td>:
				<?php echo $res[0]->data->player_local;?> Pemain</td>
            </tr>
        </table>
    </div>
    <div class="tabel-liga-370 table-pd-3 fl-l">
        <table>
            <tr>
                <td>Pemain Asing</td>
                <td>:
				<?php echo $res[0]->data->player_foreign?> Pemain</td>
            </tr>
            
        </table>
    </div>
</div>