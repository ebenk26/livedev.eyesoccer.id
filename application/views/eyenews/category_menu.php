<div class="center-desktop m-0">
    <div class="menu-3 m-0 bbg tx-c">
        <!-- <div class="over-x m-0">
            <div class="w-max"> -->
                <ul>
                    <?php
                        $news_type = $this->Master_model->getAll('tbl_news_types',
                                                                 $where = array(),
                                                                 $select = array('news_type_id','news_type'),
                                                                 $order = array(),
                                                                 $limit = '', $offset = '',
                                                                 $whereNotin = array('news_type',array('tulisan kamu')),
                                                                 $like = array());;
                        
                        $catid = 0;
                        foreach ($news_type as $cat_name)
                        {
                            if($catid == 0)
                            {
                                $catid = (isset($select_cat) AND $select_cat == $cat_name->news_type) ? $cat_name->news_type_id : 0;
                            }
                            
                            $catname = $cat_name->news_type;
                            switch($catname)
                            {
                                case 'Berita':
                                    $catname = 'Peristiwa';
                                break;
                                
                                case 'Usia Muda':
                                    $catname = 'Pembinaan';
                                break;
                            }
                            ?>
                                <li>
                                    <a href="<?php echo base_url()?>eyenews/kategori/<?php echo $cat_name->news_type?>"><?php echo $catname;?></a>
                                </li>
                            <?php
                        }
                    ?>
                </ul>
            <!-- </div>
        </div>
        <div class="container p-r ar-menu-3">
            <i class="material-icons fl-l">keyboard_arrow_left</i>
            <i class="material-icons fl-r">keyboard_arrow_right</i>
        </div> -->
    </div>
    
    <?php
        if($catid > 0)
        {
            $sub_news_type = $this->Master_model->getAll('tbl_sub_category_news',
                                                     $where = array('news_type_id' => $catid),
                                                     $select = array('sub_category_name'),
                                                     $order = array(),
                                                     $limit = '', $offset = '',
                                                     $like = array());;
            if($sub_news_type)
            {
                ?>
                    <div class="trending" style='margin-bottom: 10px;'>
                        <span class="x-c">
                        <?php
                            foreach ($sub_news_type as $cat_name)
                            {
                                ?>
                                    <a href="<?php echo base_url()?>eyenews/kategori/<?php echo $select_cat.'/'.$cat_name->sub_category_name; ?>" title="<?php echo $cat_name->sub_category_name;?>">
                                        <?php echo $cat_name->sub_category_name;?>
                                    </a>
                                <?php
                            }
                        ?>
                        </span>
                    </div>
                <?php
            }           
            
        }
    ?>
</div>