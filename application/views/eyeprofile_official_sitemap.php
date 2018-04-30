<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<?php
$cmd15=$this->db->query("select * from eyeprofile_club_official order by id_official DESC LIMIT 1000");

//$eyenews_id=$row15['eyenews_id']; 

?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
	  xmlns:news="http://www.google.com/schemas/sitemap-news/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xmlns:xhtml="http://www.w3.org/1999/xhtml"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <?php foreach($cmd15->result_array() as $row15){ ?>
	<url>	
     <loc><?php echo base_url('eyeprofile/official_detail').'/'.$row15['slug'];?></loc>	 
	</url>
    <?php } ?>

</urlset>