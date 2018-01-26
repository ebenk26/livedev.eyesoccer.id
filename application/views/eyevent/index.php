<style type="text/css">
    .nav > li > a {
        position: relative;
        display: block;
        padding: 10px 7px;
        font-size: .8em;
</style>

<div class="center-desktop m-0">
    <div class="container">
        <div class="half2">
            <?php
                foreach($eyevent_main as $vent)
                {
            ?>              
                    <div class="gambar2">
                        <a href="<?php echo base_url(); ?>eyevent/detail/<?= $vent['id_event'];?>">                 
                            <img src="<?=imgUrl()?>systems/eyevent_storage/<?php print $vent['thumb1']; ?>">
                        </a>
                        <div class="fl-l ae">
                            <a href="">
                                <i class="material-icons">keyboard_arrow_left</i>
                            </a>
                        </div>
                    </div>
            <?php 
                } 
            ?>
        </div>
        <div class="half2 p-d-l-20">
            <?php
                foreach($eyevent_main_2 as $vent2)
                {
            ?>              
                    <div class="gambar2">
                        <a href="<?php echo base_url(); ?>eyevent/detail/<?= $vent2['id_event'];?>">                    
                            <img src="<?=imgUrl()?>systems/eyevent_storage/<?php print $vent2['thumb1']; ?>">
                        </a>
                        <div class="fl-r ae">
                            <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                            </a>
                        </div>
                    </div>
            <?php 
                } 
            ?>
        </div>
        <!-- </div> -->
    </div>
</div>

<div class="center-desktop m-0">
    <!-- <div class="w1020 m-0"> -->
    <div class="container menu-5 m-0 bbg" style="border-bottom: unset;">
        <div class="fl-l" style="width: max-content;">
            <div class="tab tab-event">
                <ul class="nav nav-tabs" id="tab-nav" style="width: 100%;">
                    <li class="active">
                        <a href="#jadwal-pertandingan" data-toggle="tab">JADWAL & HASIL PERTANDINGAN</a>
                    </li>
                    <li>
                        <a href="#klasemen" data-toggle="tab">KLASEMEN</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- </div> -->
</div>

<div class="center-desktop m-0">
    <div class="container mt-20">
        <div class="tab-content" style="margin-top: 1em;">
            <div id="jadwal-pertandingan" class="tab-pane fade in active">
                <select id="pilih-liga" class="lc fl-r">
                    <option>Semua Liga</option>
                    <?php 
                        foreach ($all_liga as $ligaa)
                        {
                    ?>
                            <option value="<?= $ligaa['id_event']; ?>"><?= $ligaa["title"]; ?></option>
                    <?php        
                        }
                    ?>
                </select>
                <?php echo $jadwal; ?>
                <?php echo $kanan_kalender; ?>
            </div>
            <div id="klasemen" class="tab-pane fade">
                <?php echo $klasemen; ?>
                
            </div>
            
        </div>
    </div>
</div>

<input type="hidden" id="hdn-date" value="">

<script>
    var tgl = "";

    $('#z').datepicker({
        inline: true,
        altField: '#d',
        onSelect: function() { 
                tgl = $(this).datepicker('getDate');
                
                $('#hdn-date').val(tgl);
                console.log(tgl);
            }
    });

    $('#btn-date-jadwal').click(function(event) {

        var tanggal = tgl.getDate();

        var monthNames = ["January", "February", "March", "April", "May", "June",
          "July", "August", "September", "October", "November", "December"
        ];
        var bulan       = tgl.getMonth() + 1;
        var nm_bulan    = monthNames[tgl.getMonth()];

        var tahun = tgl.getFullYear();

        var txt_tanggal     = tahun+"-"+bulan+"-"+tanggal;

        $('#ajax-tgl-jadwal').html(tanggal + " " + nm_bulan + " " + tahun);

        var urlnya          = "<?= base_url(); ?>Eyevent/get_jadwal/"+txt_tanggal;

        $('#btn-tutup-jadwal').click(function(event) {
            $('#tbl-date-jadwal').attr('style', 'display:none');
        });

        $.ajax({
            url: urlnya,
            type: 'POST',
            dataType: 'json',
            data: {txt_tanggal: txt_tanggal},
        })
        .done(function(result) {
            $('#tbl-date-jadwal').attr('style', 'display:block').attr('style', 'background-color: #f2f2f2');


            $('#body-ajax-jadwal').html(result.txt);
            
        });
        
    });

    $('#d').change(function () {
        $('#z').datepicker('setDate', $(this).val());
    });

    $('#pilih-liga').change(function(event) {
        var liganya     = $(this).val();
        window.location.replace("<?= base_url(); ?>eyevent/liga/"+liganya);
    });
    
</script>