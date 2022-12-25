<?php
/**
 * Template Name: Liên Hệ
 */
?>

<?php get_header()?>

<div class="lien-he">
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

	<!-- Form Lien He -->
	<div class="content container-fluid">
			<div class="row">
					<div class="col-12 col-md-6 col-left">
							<div class="wrap">
									<h5 class="title">Kết nối với chúng tôi </h5>
									<form action="">
											<div class=" ">
													<label for="phong-ban" class="w-100  size-text-16 required">Phòng/Ban</label>
													<select name="phong-ban" class="form-select w-100" id="" required>
															<option value="1">Bitexco Power</option>
															<option value="2">Bitexco Power</option>
													</select>
											</div>
											<div class=" ">
													<label for="ho-ten" class="w-100 size-text-16 required">Họ tên</label>
													<input type="text" class="form-control" placeholder="Nhập đầy đủ họ tên" required>
											</div>
											<div class="d-flex">
													<div class=" w-50">
															<label for="" class=" size-text-16 required">Số điện thoại</label>
															<input type="tel" class="form-control " placeholder="Nhập số điện thoại" required>
													</div>
													<div class="w-50">
															<label for="" class=" size-text-16 required">Email</label>
															<input type="email" class="form-control " placeholder="Nhập email" required>
													</div>
											</div>
											<div class=" ">
													<label for="" class="size-text-16 required">Công ty</label>
													<input type="text" class="form-control" placeholder="Nhập tên công ty" required>
											</div>
											<div class=" ">
													<label for="" class="size-text-16">Nội dung</label>
													<textarea class="w-100" rows="6" required></textarea>
											</div>
											<div class="submit">
													<input type="submit" value="Gửi" class="form-control search">
											</div>
									</form>
							</div>
					</div>
					<div class="col-12 col-md-6 col-right">
							<div class="wrap">
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
															<span>Email: <a
																			href="mailto:info@bitexcopower.com.vn">info@bitexcopower.com.vn</a></span>
													</span>
											</div>
									</div>
							</div>
					</div>
			</div>
	</div>
	<!-- End Form Lien He -->
</div>

<?php get_footer()?>