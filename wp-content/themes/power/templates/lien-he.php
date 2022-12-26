<?php

/**
 * Template Name: Liên Hệ
 */
?>

<?php get_header() ?>

<!--  Banner -->
<?php
$banner = get_field('contact_banner', 'option');
?>
<section class="terms sitemap-banner banner">
	<div class="terms-header">
		<div class="terms-header-top" style="background-image: url(<?php echo $banner['image'] ?>)">
			<div>
				<span class="line-headding"></span>
				<h3><?php echo paint_if_exist($banner['banner_title']) ?></h3>
				<p><?php echo paint_if_exist($banner['banner_description']) ?></p>
			</div>
		</div>
	</div>
</section>
<!-- End  Banner -->

<!-- Form Lien He -->

<?php
	

?>

<div class="contact-content">
	<div class="container">
		<div class="contact-box">
			<div class="contact-form">
				<h5 class="title">Kết nối với chúng tôi </h5>
				<?php echo do_shortcode('[contact-form-7 id="6" title="Liên hệ"]') ?>
			</div>
			<div class="contact-information">
				<h5 class="title">Thông tin liên hệ</h5>
				<div class="info">
					<p class="desc">Quý Cổ đông và Nhà đầu tư có nhu cầu về thông tin, xin vui lòng liên hệ:</p>
					<h6 class="name-company">Tổng công ty Bitexco Power</h6>
					<div class="contact-info">
						<span class="d-flex address">
							<span class="tag tag-location">
							</span>
							<span class=""> Tầng 1, Tháp The Manor, đường Mễ Trì, phường Mỹ
								Đình
								1, quận
								Nam Từ Liêm, Tp. Hà Nội.</span>
						</span>
						<span class="d-flex phone">
							<span class="tag tag-phone"></span>
							<div>
								<div class="tel">
									Tel
									<a href="tel:+ 124 875 89 90">+ 124 875 89 90 </a>
									<span class="mx-2">|</span>
									<a href="tel:+ 124 875 89 90"> + 124 875 89 90</a>
								</div>
								<div class="d-flex so-may">
									<span>Số máy lẻ:</span>
									<ul>
										<li>Ban đầu tư và phát triển dự án: +102</li>
										<li>Ban quản lý vận hành: +103</li>
										<li>Ban tuyển dụng: +104</li>
									</ul>
								</div>
							</div>
						</span>
						<span class="d-flex fax">
							<span class="tag tag-fax">
							</span>
							<span>Fax: <a href="tel:++ 84 24 3851 9203">+ 84 24 3851
									9203</a></span>
						</span>
						<span class="d-flex email">
							<span class="tag tag-mail">
							</span>
							<span>Email: <a href="mailto:info@bitexcopower.com.vn">info@bitexcopower.com.vn</a></span>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Form Lien He -->

<?php get_footer() ?>