<?php
    $data['active'] = ($member->id_player > 0) ? 'player' : 'klub';
    $this->load->view($folder.'member/header', $data);
?>
<div class="responsif-add-100px">
    <?php
        if ($member->id_club > 0) {
            $data['active'] = 'verifikasi';
            $this->load->view($folder.'member/club/header', $data);
        }
    ?>
    <div class="container mg-tb15">
    	<div id="reqverify" class='loadverify' action="member" loading="off" clean="clsverify">
    	    <div id='clsverify'>
    	        <script>
    	            $(document).ready(function () {
    	                $(window).on('load', function () {
    	                    ajaxOnLoad('loadverify');
    	                });
    	            });
    	        </script>
    	    </div>
    	    <input type='hidden' name='fn' value='verifydetail' class='cinput'>
    	    <input type='hidden' name='act' value='<?php echo isset($_GET['act']) ? $_GET['act'] : ''; ?>' class='cinput'>
            <div class="x-form-daftar-pemain row">
                <i class="far fa-edit" style="float:right; font-size:.9em;"></i>
                <div class="col-xs-12 pd-t-19 edits dftr-pemain">
                    <span>Nama Lengkap</span>
                    <span>No. Kartu Keluarga</span>
                    <span>No. KTP/NIK/Kartu Pelajar</span>
                    <span>Registrasi</span>
                </div>
            </div>
    	</div>
    </div>
</div>