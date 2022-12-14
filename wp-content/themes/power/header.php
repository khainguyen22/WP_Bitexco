<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <?php global $c5_options; ?>
    <meta property="fb:app_id" content="<?php echo $c5_options['opt-id-appfb']; ?>" />
    <meta property="fb:admins" content="<?php echo $c5_options['opt-id-adminfb']; ?>" />
    <?php wp_head(); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js"></script>

</head>

<body <?php body_class(); ?>>
    <header>
        <div class="home header">
            <div class="top-header home-header">
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
                <ul class="nav justify-content-center d-flex nav-right">
                    <li class="nav-login">
                        <img class="icon-user" src="<?php echo get_stylesheet_directory_uri() ?>/access/images/icon-user.png" alt="icon">
                        <a class="nav-link " aria-current="page" href="#">đăng nhập
                        </a>
                    </li>
                    <span class="navigator" style="place-self: center; color: #d8d8d88c;">|</span>
                    <li class="nav-signup">
                        <a class="nav-link" href="#">đăng ký
                        </a>
                    </li>
                    <li class="nav-langue">
                        <div class="languages d-flex">
                            <select name="languages" id="languages">
                                <option value="vn">Tiếng Việt</option>
                                <option value="en">English</option>
                                <option value="ja">Japanese</option>
                                <option value="sp">Spain</option>
                            </select>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="bottom-header ">
                <div class="logo">
                    <a href="/"> <img class="img-logo" src="<?php echo get_stylesheet_directory_uri() ?>/access/images/logo.png" alt="logo"></a>
                </div>
                <div class="navbar">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary_menu',
                            'container'  => '',
                            'menu_class' => 'nav-list',
                            'fallback_cb' => 'specia_fallback_page_menu',
                            'walker' => new specia_nav_walker(),
                            'add_li_class'  => 'nav-item',
                            'link_class'    =>    'nav-item-link'
                        )
                    );

                    ?>
                </div>
            </div>
        </div>
        <div class="menu-main-container">
            <div id="menu-main" class="menu">
                <div class="row">
                    <div class="col-12 col-xl-3 main-menu-primary">
                        <ul class="main-menu-primary-lists">
                            <li class="main-menu-primary-item is-active"><a href="#">Sản xuất điện</a></li>
                            <li class="main-menu-primary-item"><a href="#">kinh doanh điện</a></li>
                            <li class="main-menu-primary-item"><a href="#">dịch vụ</a></li>
                            <li class="main-menu-primary-item"><a href="#">lĩnh vực khác</a></li>
                            <li class="main-menu-primary-item"><a href="#">Thông tin mời thầu</a></li>
                            <li class="main-menu-primary-item"><a href="#">truyền thông</a></li>
                            <li class="main-menu-primary-item"><a href="#">sự kiện</a></li>
                            <li class="main-menu-primary-item"><a href="#">tuyển dụng</a></li>
                            <li class="main-menu-primary-item"><a href="#">liên hệ</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-xl-5 sub-menu">
                        <ul class="sub-menu-lists">
                            <li class="sub-menu-item"><a href="#">Thương hiệu Bitexco Power</a></li>
                            <li class="sub-menu-item"><a href="#">Lịch sử phát triển</a></li>
                            <li class="sub-menu-item"><a href="#">Ban lãnh đạo</a></li>
                            <li class="sub-menu-item"><a href="#">Các công ty thành viên</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-xl-4 menu-image">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/access/images/image73.png" alt="image73.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="search">
            <div class="search-bar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                    <circle cx="11" cy="11.5" r="8" stroke="#0D0D0E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M16.5 17.458L21.5 22.458" stroke="#0D0D0E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <input class="search-input" type="text" placeholder="Nhập nội dung tìm kiếm">
            </div>
        </div>
    </header>
    <?php if (is_front_page()) { ?>
        <main class="main_page">
        <?php } else { ?>

        <?php } ?>