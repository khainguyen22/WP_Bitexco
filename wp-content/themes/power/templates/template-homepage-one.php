<?php

/**
Template Name: Trang chủ
 **/
$home_san_xuat_kinh_doanh = get_field('home_san_xuat_kinh_doanh', 'option');
$home_san_xuat_kinh_doanh_background = '';
$home_san_xuat_kinh_doanh_content = '';
if ($home_san_xuat_kinh_doanh) {
    $home_san_xuat_kinh_doanh_content = $home_san_xuat_kinh_doanh['content'];
    $home_san_xuat_kinh_doanh_background = $home_san_xuat_kinh_doanh['background'];
}
$home_du_an_cua_chung_toi = get_field('home_du_an_cua_chung_toi', 'option');
$home_du_an_cua_chung_toi_background = '';
$home_du_an_cua_chung_toi_content = '';
if ($home_du_an_cua_chung_toi) {
    $home_du_an_cua_chung_toi_content = $home_du_an_cua_chung_toi['content'];
    $home_du_an_cua_chung_toi_background = $home_du_an_cua_chung_toi['background'];
    $timestamp = strtotime($home_san_xuat_kinh_doanh_content['date']);
}
$post_of_outstanding = array(
    'post_type'   => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'orderby' => 'post_date',
    'order' => 'DESC',
);
$the_query_post_outstanding = new WP_Query($post_of_outstanding);
get_header();
?>

<body class="home">
    <?php get_header(); ?>
    <section class="home-slide">
        <div class="home-slide-carousel">

            <div class="item ">
                <img src="<?php echo $home_san_xuat_kinh_doanh_background; ?>" alt="<?php echo $home_san_xuat_kinh_doanh_content['title']; ?>">
                <div class="content">
                    <h3 class="title"><?php echo isset($home_san_xuat_kinh_doanh_content['title']) ? $home_san_xuat_kinh_doanh_content['title'] : ""; ?></h3>
                    <div class="d-flex desc-wrap">
                        <div class="desc-left">
                            <h3 class="title"><?php echo isset($home_san_xuat_kinh_doanh_content['san_luong_ngay']) ? $home_san_xuat_kinh_doanh_content['san_luong_ngay'] : ""; ?><span class="unit"> Triệu kWh</span></h3>
                            <span class="description uppercase">Ngày
                                <?php
                                $day = date('d', $timestamp);
                                echo $day;
                                ?>
                            </span>
                        </div>
                        <div class="desc-left">
                            <h3 class="title"><?php echo isset($home_san_xuat_kinh_doanh_content['san_luong_thang']) ? $home_san_xuat_kinh_doanh_content['san_luong_thang'] : ""; ?><span class="unit"> Triệu kWh</span></h3>
                            <span class="description uppercase">Tháng
                                <?php
                                $day = date('m', $timestamp);
                                echo $day;
                                ?>
                            </span>
                        </div>
                        <div class="desc-left">
                            <h3 class="title"><?php echo isset($home_san_xuat_kinh_doanh_content['san_luong_nam']) ? $home_san_xuat_kinh_doanh_content['san_luong_nam'] : ""; ?><span class="unit"> Triệu kWh</span></h3>
                            <span class="description uppercase">Năm
                                <?php
                                $day = date('Y', $timestamp);
                                echo $day;
                                ?>
                            </span>
                        </div>
                    </div>
                    <a href="<?php echo $home_san_xuat_kinh_doanh_content['link'] ?>" class="btn btn-warning btn-detail uppercase"><?php echo isset($home_san_xuat_kinh_doanh_content['button']) ? $home_san_xuat_kinh_doanh_content['button'] : "Chi tiết"; ?></a>
                </div>
            </div>

            <div class="item">
                <img src="<?php echo $home_du_an_cua_chung_toi_background  ?>" alt="<?php echo $home_san_xuat_kinh_doanh_content['title']; ?>">
                <div class="content">
                    <h3 class="title"><?php echo isset($home_du_an_cua_chung_toi_content['title']) ? $home_du_an_cua_chung_toi_content['title'] : ""; ?></h3>
                    <div class="d-flex desc-wrap">
                        <div class="desc-left">
                            <h3 class="title"><?php echo isset($home_du_an_cua_chung_toi_content['du_an_thuy_dien']) ? $home_du_an_cua_chung_toi_content['du_an_thuy_dien'] : ""; ?></h3>
                            <span class="description uppercase">Dự án thủy điện</span>
                        </div>
                        <div class="desc-left">
                            <h3 class="title"><?php echo isset($home_du_an_cua_chung_toi_content['du_an_dien_mat_troi']) ? $home_du_an_cua_chung_toi_content['du_an_dien_mat_troi'] : ""; ?></h3>
                            <span class="description uppercase">Dự án điện mặt trời</span>
                        </div>
                        <div class="desc-left">
                            <h3 class="title"><?php echo isset($home_du_an_cua_chung_toi_content['du_an_dien_gio']) ? $home_du_an_cua_chung_toi_content['du_an_dien_gio'] : ""; ?></h3>
                            <span class="description uppercase">Dự án điện gió</span>
                        </div>
                    </div>
                    <a href="<?php echo $home_du_an_cua_chung_toi_content['link'] ?>" class="btn btn-warning btn-detail uppercase"><?php echo isset($home_du_an_cua_chung_toi_content['button']) ? $home_du_an_cua_chung_toi_content['button'] : "Chi tiết"; ?></a>
                </div>
            </div>

            <?php if ($the_query_post_outstanding->have_posts()) : ?>
                <?php while ($the_query_post_outstanding->have_posts()) : $the_query_post_outstanding->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                    <div class="item">
                        <img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>" class="img-banner">
                        <div class="content">
                            <h3 class="title"><?php echo the_title() ?></h3>
                            <div class="d-flex desc-wrap">
                                <p class="the_excerpt"><?php echo the_excerpt() ?></p>
                            </div>
                            <a href="<?php echo get_the_permalink() ?>" class="btn btn-warning btn-detail uppercase">Số liệu chi tiết</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

    </section>
    <footer>
        <div class="footer d-flex justify-content-between">
            <div class="copy-right">
                <span>©2022 Bitexco Group of Companies.</span>
            </div>
            <ul class="d-flex footer-links">
                <li class="link px-2"><a href="#">Trụ sở</a></li>
                <li class="link px-2"><a href="#">Sơ đồ website</a></li>
                <li class="link px-2"><a href="#">Điều khoản sử dụng</a></li>
                <li class="link px-2"><a href="#">Chính sách bảo mật</a></li>
            </ul>
        </div>
        <div class="top-header home-header footer-mobile">
            <ul class="nav nav-left">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">tập đoàn bitexco
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">bất động sản
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">thương mại - dịch vụ
                    </a>
                </li>
            </ul>
            <ul class="nav d-flex nav-right">
                <li class="nav-login">
                    <img class="icon-user" src="../access/images/icon-user.png" alt="">
                    <a class="nav-link " aria-current="page" href="#">đăng nhập
                    </a>
                </li>
                <span class="navigator" style=" color: #d8d8d88c;">|</span>
                <li class="nav-signup">
                    <a class="nav-link" href="#">đăng ký
                    </a>
                </li>
                <li class="nav-langue">
                    <div class="languages">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                            <path d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="#434449" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.00012 11C7.00012 16.5228 8.79098 21 11.0001 21C13.2093 21 15.0001 16.5228 15.0001 11C15.0001 5.47715 13.2093 1 11.0001 1C8.79098 1 7.00012 5.47715 7.00012 11Z" stroke="#434449" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M1 11H21" stroke="#434449" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <select name="" id="">
                            <option value="">Tiếng Việt</option>
                            <option value="">English</option>
                            <option value="">Japanese</option>
                            <option value="">Spain</option>
                        </select>
                    </div>
                </li>
            </ul>
        </div>
    </footer>
</body>