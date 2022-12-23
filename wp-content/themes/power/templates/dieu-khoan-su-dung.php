<?php
/**
 * Template Name: Điều Khoản Sử Dụng
 */
?>
<?php get_header()?>

<!--  Banner -->
	<?php 
		$banner = get_field('privacy_policy_banner', 'option');
	?>
	<section class="terms sitemap-banner" >
		<div class="terms-header">
			<div class="terms-header-top" style="background-image: url(<?php echo $banner['image']?>)">
				<div>
					<span class="line-headding"></span>
					<h3><?php echo paint_if_exist($banner['banner_title'])?></h3>
					<p><?php  echo paint_if_exist($banner['banner_description'])?></p>
				</div>
			</div>
		</div>
	</section>
<!-- End  Banner -->
		 
<!-- Privacy Policy -->
	<?php
		$privacy_policy = get_field('privacy_policy', 'option');
	?>
	<section class="term-content-box">
		<div class="container">
				<h5>
						<?php echo paint_if_exist($privacy_policy['title'])?>
				</h5>
				<span class="divider"></span>
				<div class="terms-content">
						<div>
								<?php echo paint_if_exist($privacy_policy['text'])?>
						</div>
				</div>
		</div>
	</section>

<!-- End Privacy Policy -->
	
<!-- Other Information -->
	<?php
			$other_info = get_field('privacy_policy_other_information', 'option');
	?>
	<section class="other-information">
			<div class="other-container ">
					<div class="other-content hover-zoom">
							<?php if ($other_info) : ?>
							<?php foreach ($other_info as $value) : ?>
									<a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>
							<?php endforeach; ?>
							<?php endif; ?>
					</div>
			</div>
	</section>
<!-- End other information -->
<?php get_footer()?>