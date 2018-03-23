<!doctype html>
<html>
	<head>

	</head>

	<body style="margin: 0 !important; padding: 0 !important; background-color: #ffffff;" bgcolor="#ffffff">
		<!-- HIDDEN PREHEADER TEXT -->
<?php /*var_dump($kanal);exit();*/ ?>
		<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>

		<table border="0" cellpadding="0" cellspacing="0" width="600px" background="http://m.eyesoccer.id/assets/img/email/background.png" bgcolor="#FFC107" style="margin:  0 auto;background: #FFC107 url(http://m.eyesoccer.id/assets/img/email/background.png);background-size: cover;">
			<tr>
				<td align="center" valign="top" width="100%" style="padding: 50px 15px 10px;" class="mobile-padding">

					<!--[if (gte mso 9)|(IE)]>
						<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
							<tr>
							<td align="center" valign="top" width="600">
						<![endif]-->

					<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
						<tbody>
							<tr>
								<td align="left" valign="top" style="padding: 0 0 20px 0;">
									<img src="http://m.eyesoccer.id/assets/img/email/logo.png" border="0" style="display: block;">
								</td>

								<td align="right" valign="top" style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
									<p style="color: #ffffff;font-size: 15px;line-height: 28px;margin: 0;">
										<?php echo date('d M Y'); ?>
									</p>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="left" valign="top" style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
									<p style="color: #ffffff;font-size: 17px;line-height: 28px;margin: 0;">Halo, ::full_name:: <br>Kabar Terhangat Dari Eyesoccer Hari Ini:</p>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="left" valign="bottom" style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
									<p style="color: #ffffff;font-size: 22px;line-height: 28px;margin: 30px 0px 0px;"> 
										<?= ucfirst($kanal); ?> :
									</p>
								</td>
							</tr>
						</tbody>
					</table>

					<!--[if (gte mso 9)|(IE)]>
						</td>
						</tr>
						</table>
						<![endif]-->
				</td>
    		</tr>
    		<tr>
    			<td align="center" height="100%" valign="top" width="100%" style="padding: 0 15px 50px;" class="mobile-padding">
		            <!--[if (gte mso 9)|(IE)]>
		            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
		            <tr>
		            <td align="center" valign="top" width="600">
		            <![endif]-->

					<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
						<tr>
							<td align="center" valign="top" style="padding: 0 0 25px 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
								<table cellspacing="0" cellpadding="0" border="0" width="100%">
									<tbody>
										<tr>

											<td align="center" bgcolor="#ffffff" style="border-radius: 5px 5px 0 0;">

												<img src="<?= $nasional->data[0]->url_pic; ?>/medium" width="600" alt="insert alt text here" style="display: block;border-radius: 5px 5px 0 0;font-family: sans-serif;font-size: 16px;color: #999999;" class="img-max">
											</td>
										</tr>
										<tr>

											<td align="center" bgcolor="#ffffff" style="border-radius: 0 0 5px 5px;padding: 25px;">
												<table cellspacing="0" cellpadding="0" border="0" width="100%">
													<tbody>
														<tr>

															<td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif;">
																<h2 style="font-size: 18px;color: #444444;margin: 0;"> 
																	<?php echo $nasional->data[0]->title; ?> 
																</h2>
															</td>

														</tr>

														<tr>

															<td align="center" style="padding: 10px 0 0 0;">

																<table border="0" cellspacing="0" cellpadding="0">

																	<tbody>

																		<tr>

																			<td align="center">

																				<a href="https://www.eyesoccer.id/<?= $kanal; ?>/detail/<?php echo $nasional->data[0]->slug; ?>" target="_blank" ><img src="http://m.eyesoccer.id/assets/img/email/button-red.png" style="margin:  5px;"></a>

																			</td>

																		</tr>

																	</tbody>

																</table>

															</td>

														</tr>

													</tbody>

												</table>

											</td>

										</tr>

									</tbody>

								</table>
							</td>
						</tr>

						<tr>

							<td align="center" valign="top" style="padding: 25px 0 10px;font-family: Open Sans, Helvetica, Arial, sans-serif;">

								<table cellspacing="0" cellpadding="0" border="0" width="100%">

									<tbody>

										<?php 
											for ($i = 1; $i <= 2; $i++)
											{
										?>
												<tr>

													<td align="center" bgcolor="#ffffff" style="border-radius: 5px 0 0 5px;">

														<img src="<?= $nasional->data[
															$i]->url_pic ?>/medium" width="200" height="" alt="insert alt text here"

														 style="display: block;margin:  20px;" class="img-max">

													</td>

													<td align="center" bgcolor="#ffffff" style="padding: 20px;border-radius: 0 5px 5px 0;">

														<table cellspacing="0" cellpadding="0" border="0" width="100%">

															<tbody>

																<tr>

																	<td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif;">

																		<h2 style="font-size: 20px; color: #444444; margin: 0; padding-bottom: 10px;"><?= $nasional->data[$i]->title; ?></h2>

												

																	</td>

																</tr>

																<tr>

																	<td align="center" style="padding: 10px 0 0 0;">

																		<table border="0" cellspacing="0" cellpadding="0">

																			<tbody>

																				<tr>

																					<td align="center">

																						<a href="https://www.eyesoccer.id/<?= $kanal ?>/detail/<?= $nasional->data[$i]->slug; ?>" target="_blank" ><img src="http://m.eyesoccer.id/assets/img/email/button-blue.png" alt="" srcset=""></a>

																					</td>

																				</tr>

																			</tbody>

																		</table>

																	</td>

																</tr>

															</tbody>

														</table>

													</td>

												</tr>
										<?php		
											}
										?>

												<tr>

													<td align="center" bgcolor="#ffffff" style="border-radius: 5px 0 0 5px;">

														<img src="<?= $inter->data[
															0]->url_pic ?>/medium" width="200" height="" alt="insert alt text here"

														 style="display: block;margin:  20px;" class="img-max">

													</td>

													<td align="center" bgcolor="#ffffff" style="padding: 20px;border-radius: 0 5px 5px 0;">

														<table cellspacing="0" cellpadding="0" border="0" width="100%">

															<tbody>

																<tr>

																	<td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif;">

																		<h2 style="font-size: 20px; color: #444444; margin: 0; padding-bottom: 10px;"><?= $inter->data[0]->title; ?></h2>

												

																	</td>

																</tr>

																<tr>

																	<td align="center" style="padding: 10px 0 0 0;">

																		<table border="0" cellspacing="0" cellpadding="0">

																			<tbody>

																				<tr>

																					<td align="center">

																						<a href="https://www.eyesoccer.id/<?= $kanal ?>/detail/<?= $inter->data[0]->slug; ?>" target="_blank" ><img src="http://m.eyesoccer.id/assets/img/email/button-blue.png" alt="" srcset=""></a>

																					</td>

																				</tr>

																			</tbody>

																		</table>

																	</td>

																</tr>

															</tbody>

														</table>

													</td>

												</tr>

									</tbody>

								</table>

							</td>

						</tr>

	            </table>

            <!--[if (gte mso 9)|(IE)]>

            </td>

            </tr>

            </table>

            <![endif]-->

        </td>

    </tr>

	<tr>

		<td align="center" height="100%" valign="top" width="100%" bgcolor="#f6f6f6">

			<!--[if (gte mso 9)|(IE)]>

						<table align="center" border="0" cellspacing="0" cellpadding="0">

						<tr>

						<td align="center" valign="top">

						<![endif]-->

						<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" background="http://m.eyesoccer.id/assets/img/email/bg2.png" bgcolor="#FFC107" style="margin:  0 auto;background: #FFC107 url(http://m.eyesoccer.id/assets/img/email/bg2.png);background-size: cover;">

							<tbody>

								<tr>

									<td align="center" valign="middle" style="height: 60px;" height="60px">

										<table>

											<tbody>

												<tr>

													<td style="font-family: Open Sans, Helvetica, Arial, sans-serif;color: white;"><a href="https://www.eyesoccer.id" style="text-decoration: none;color: white;padding:  0px 5px;">HOME</a></td>

													<td style="font-family: Open Sans, Helvetica, Arial, sans-serif;color: white;"><a href="https://www.eyesoccer.id/eyenews" style="text-decoration: none;color: white;padding: 0px 5px;">EYENEWS</a></td>

													<td style="font-family: Open Sans, Helvetica, Arial, sans-serif;color: white;"><a href="https://www.eyesoccer.id/eyeprofile/klub/Liga%20Indonesia%201/1" style="text-decoration: none;color: white;padding: 0px 5px;">EYEPROFILE</a></td>

													<td style="font-family: Open Sans, Helvetica, Arial, sans-serif;color: white;"><a href="https://www.eyesoccer.id/eyetube" style="text-decoration: none;color: white;padding: 0px 5px;">EYETUBE</a></td>

													<td style="font-family: Open Sans, Helvetica, Arial, sans-serif;color: white;"><a href="https://www.eyesoccer.id/eyemarket" style="text-decoration: none;color:  white;padding: 0px 5px;">EYEMARKET</a></td>

												</tr>

											</tbody>

										</table>

									</td>

								</tr>

								<tr>

									<td align="center" valign="top" style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #999999;">

										<table style="height: 52px;display: block;width: 131px;padding: 15px 0px;box-sizing:  border-box;">

											<tbody>

												<tr>

													<td>

														<a href="https://www.facebook.com/eyesoccerindonesia" style="width: 28px;height: 28px;display:  block;">

															<img src="http://m.eyesoccer.id/assets/img/email/Facebook.png" alt="" srcset="">

														</a>

													</td>

													<td>

														<a href="https://twitter.com/eyesoccer_id" style="width: 28px;height: 28px;display: block;">

															<img src="http://m.eyesoccer.id/assets/img/email/Twitter.png" alt="" srcset="">

														</a>

													</td>

													<td>

														<a href="https://www.instagram.com/eyesoccer/" style="width: 28px;height: 28px;display: block;">

															<img src="http://m.eyesoccer.id/assets/img/email/Instagram.png" alt="" srcset="">

														</a>

													</td>

													<td>

														<a href="https://www.youtube.com/channel/UCSFVvSPMGhFNxojGZV4Kagw" style="width: 28px;height: 28px;display: block;">

															<img src="http://m.eyesoccer.id/assets/img/email/YoutTube.png" alt="" srcset="">

														</a>

													</td>

												</tr>

											</tbody>

										</table>

										<!-- <p style="color:  white;font-size: 14px;line-height: 20px;">

											<a href="https://www.instagram.com/eyesoccer/" style="text-decoration: none;color:  white;">Instagram</a> - <a href="https://www.youtube.com/channel/UCSFVvSPMGhFNxojGZV4Kagw" style="color: white;text-decoration:none;">Youtube</a> - <a href="https://twitter.com/eyesoccer_id" style="color: white;text-decoration:none;">Twitter</a> - <a href="https://www.facebook.com/eyesoccerindonesia" style="color: white;text-decoration:none;">Facebook</a>

										</p> -->

									</td>

								</tr>

							</tbody>

						</table>

			<!--[if (gte mso 9)|(IE)]>

						</td>

						</tr>

						</table>

						<![endif]-->

		</td>

    </tr>

</table>

</body>

</html>

