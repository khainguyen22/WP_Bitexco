<?php
/**
 * Template Name: Trụ Sở
 */
?>
<?php get_header()?>

<!--  Banner -->
	<?php 
		$banner = get_field('headquater_banner', 'option');
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

<!-- Headquarters -->
<!-- End Headquarters -->

<!-- Other Information -->
<?php
			$other_info = get_field('headquater_other_information', 'option');
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