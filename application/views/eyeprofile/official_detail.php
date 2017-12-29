<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$ofisial=$this->db->query("SELECT * FROM tbl_official_team WHERE official_id='".$id."'")->row_array();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=1000">
        <link href="<?=base_url()?>newassets/css/style.css" rel="stylesheet">
        <link href="<?=base_url()?>newassets/css/bs.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="crumb">
        <ul>
            <li>Home</li>
            <li>EyeProfile</li>
            <li>Klub</li>
            <li>Ofisial</li>
        </ul>
    </div>
    <div class="container">
        <div class="garis-banner over-in profile-pemain">
            <div class="left">
                <svg style="height: 189px;">
                    <g id="Layer_2" data-name="Layer 2">
                        <g id="Layer_1-2" data-name="Layer 1">
                            <polygon class="fill" points="132 0 22 190 0 190 110 0 132 0" />
                            <polygon class="fill" points="330 0 330 190 42 190 152 0 330 0" />
                        </g>
                    </g>
                </svg>
                <div class="box-img-radius">
                    <img src="<?=base_url()?>systems/player_storage/<?=$ofisial["official_photo"]?>" alt="">                        
                </div>
            </div>
            <div class="right fill">
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>Tanggal lahir</td>
                                <td>: <?=$ofisial["birth_date"]?></td>
                            </tr>
                            <tr>
                                <td>Tempat lahir</td>
                                <td>: <?=$ofisial["birth_place"]?></td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan</td>
                                <td>: <?=$ofisial["nationality"]?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>Klub Sebelumnya</td>
                                <td>: </td>
                            </tr>
                            <tr>
                                <td>Posisi</td>
                                <td>: <?=$ofisial["position"]?></td>
                            </tr>
                            <tr>
                                <td>Bergabung</td>
                                <td>: </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>Formasi</td>
                                <td>: </td>
                            </tr>
                            <tr>
                                <td>Durasi</td>
                                <td>: </td>
                            </tr>
                            <tr>
                                <td>Rasio Kemenangan</td>
                                <td>: </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h3><?=$ofisial["name"]?></h3>
        </div>
    </div>

    <div class="dekstop pd-t-280">
    <div class="center-dekstop m-0">
        <div class="w-60 m-r-1 pd-t-20 formasi">
            <div class="container ofisial-detail">
                <h3>Latar Belakang</h3>
                <p>
				Latar Belakang
                </p>
            </div>
        </div>
        <div class="w-40 pd-t-20">
        <h3 class="">Formasi (4-3-2-1)</h3>
        <div class="container box-formasi det-pos">
            <img src="http://3.bp.blogspot.com/-ibBCQCt1CL0/VHMXdT8LhhI/AAAAAAAAA68/6pLm6hX64yM/s1600/Formasi%2Bsepak%2BBola.png" alt="">
        </div>
        </div>
        <div class="container pd-t-20 pd-b-100">
            <h3 class="h3-oranye">Karir Klub</h3>
            <table class="radius table table-striped pd-18" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="t-b-b">No</th>
                        <th class="t-b-b">Timnas</th>
                        <th class="t-b-b">Tahun</th>
                        <th class="t-b-b">Main</th>
                        <th class="t-b-b">Gol</th>
                        <th class="t-b-b">Pelatih</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
				$no=1;?>
                    <tr>
                        <td><?=$no++?></td>
                        <td>
                            <img src="" alt="" width="15px"> </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
					
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </body>
</html>