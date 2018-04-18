<?php
$player = json_decode($player);
$club = json_decode($club);
$dplayer = $player->data;
$dclub = $club->data;

?>

<div class="container box-border-radius fl-l mt-30">            				
        <div class="fl-l img-80" style="display:none;">				
            <img src="<?=imgUrl()?>assets/img/content_11.jpg" alt="" height="100%">
        </div>
        <div class="tabel-liga-370 b-r-1 table-pd-3 fl-l" style="width:500px;">
            <table>
                <tr>
                    <td>Level Liga</td>
                    <td>: <?php echo $player->query->competition?></td>
                   
                </tr>
                <tr>
                    <td>Jumlah Klub</td>
                    <td>: <?php echo $dclub[0]->cc?> Klub</td>
                </tr>
                <tr>
                    <td>Jumlah Pemain</td>
                    <td>:
					<?php echo $dplayer->player_local;?> Pemain</td>
                </tr>
                <tr>
                    <td>Pemain Asing</td>
                    <td>:
					<?php echo $dplayer->player_foreign;?> Pemain</td>
                </tr>
            </table>
        </div>
        <div class="tabel-liga-370 table-pd-3 fl-l">
            <table>
                <tr>
                    <td>Rekor Juara</td>
                    <td>: -</td>
                </tr>
                <tr>
                    <td>Usia Rata-rata</td>
                    <td>: -
                </tr>
                <tr>
                    <td>Juara Bertahan</td>
                    <td>: -</td>
                </tr><tr>
                    <td>Pemain Bertahan</td>
                    <td>: -</td>
                </tr>
            </table>
        </div>
</div>