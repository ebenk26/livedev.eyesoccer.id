<!--img upload-->
    <div class="detail-post-box" id="upload_pop" style="display:none">
        <?php echo form_open_multipart(MEURL.'upload_foto',array('name'=> 'uploadform'))?>
        <div class="takepic-box m-0 p-r">
            <div class="pic-l">
                <div class="container ">
                    <input type="file" class="fileimg" name="upl_img">
                        <div class="box-pic drp">
                            <div class="up-pic tx-c p-r ">
                                <img src="" id="dropzone" >

                                    <ul class="box-up">
                                        <li>
                                            <i class="material-icons">cloud_upload</i>
                                        </li>
                                        <li>
                                            <span>Drag your photo here</span>
                                            
                                        </li>
                                        <li>
                                            <span>Or</span>
                                        </li>
                                        <li>
                                            <button class="btn-browse" type="button" style="z-index: 999" id="browse">Choose File</button>
                                        </li>
                                    </ul>
                                
                            </div> 
                        <div class="container rsz mt-10">
                            <div id="slidecontainer">
                                <input type="range" min="1" max="100" value="1" class="slider cropit-image-zoom-input" id="myRange">
                            </div>
                            <button class="btn-danger hidden" id="cancel" type="button">Pilih File</button>
                           
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="pic-r p-r">
                <div class="container com-tag">
                    <ul>
                        <li><span>Keterangan </span></li>
                        <li><input type="text" placeholder="Tuli Keterangan disini..." name="caption" class="c-caption"></li>
                        <li></li>
                        <!--<li><span>Tag</span></li>
                        <li><input type="text" placeholder="Gunakan @ untuk menyebut teman" class="input2"></li>
                        <li></li>
                        <li><span>Lokasi</span></li>
                        <li><input type="text" placeholder="Ketik lokasimu" class="input2"></li>
                        <li></li>
                        <li></li>
                        <li></li>-->
                        <li>
                            <button class="btn-me-submit fl-r" type="submit" >Kirim</button></li>
                    </ul>
                </div>
            </div>

        </div>

        <?php echo form_close()?>
        
    </div>

    <!--/img-upload-->