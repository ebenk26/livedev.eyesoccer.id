<?php $this->load->view('eyeme/header');?>
<div class="desktop">
    <div class="center-desktop m-0">
        
        <div class="w900 m-0">
            <div class="container mt-30">
                <div class="me-sub">
                    <span>JELAJAHI</span>
                </div>
            </div>
        </div>
        <div class="w900 m-0">
        <?php 
        //parsing data explore
        foreach($ex as $k => $v){  
            ?>
            <div class="me-post" ref="<?php echo $v->id_img?>">
                <img src="<?php echo MEIMG.$v->img_name?>" class="me-gambar-post" alt="">
                <div class="tengah tx-c">
                    <i class="material-icons">favorite</i>
                    <span><?php echo $v->countLike?></span>
                    <i class="material-icons">chat_bubble</i>
                    <span><?php echo $v->countComment?></span>
                </div>
            </div>

          <?php  }?>                  
         </div>
    </div>
</div>
<?php 
$this->load->view('eyeme/notif');
$this->load->view('eyeme/img_upload');
$this->load->view('eyeme/post_detail');
$this->load->view('eyeme/footer');
?>
