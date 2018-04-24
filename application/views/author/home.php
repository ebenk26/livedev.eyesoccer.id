<style>
tr.list_author{
    background-color: #f0f0f059;
}
tr.list_author:hover{
    background-color: #ffb8b8d4;
}

</style>
<div class="center-desktop">
<div id="author">
<h2>Daftar Author</h2>
<table>	
			<?php
				foreach ($author_list as $author)
				{
				?>
				<tr class="list_author">
					<td width="30%" align="center">
						<div class="w4">
							<a>
								<div class="w4-f">
									<img src="<?php echo imgUrl(); ?>assets/img/eyesoccer logo_001.png" style="width:10%;" alt="<?= $author['fullname']; ?>">
								</div>
								</a>
						</div>
					</td>
					<td width="70%" align="left">
						<table>
							<tr>
								<td>
								<p><h2><?= $author['fullname'];?></h2></p>
								<span class="time-view">
								<?= $author['total'];?> post					
								</span>
								<h4>Profile</h4></br>
								Berpengalaman 10 tahun didunia berita sepakbola dunia dan Nasional, Pernah berkuliah di mana saja, dan pernah menjadi wartawan disalah satu media dimana saja
								</td>
							</tr>
							<tr>
								<td>
									<table>
										<tr>
											<th>
											Social media
											</th>
											<td align="left">
											example@sosialmedia.com
											</td>
										</tr>
										<tr>
											<th>
											Email
											</th>
											<td align="left">
											example@email.com
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				<tr>
				<?php
				}
			?>
	</table>
</div>
</div>
