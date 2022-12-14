<?php

/**
Template Name: Tin tức thủy điện - Hoạt động xã hội
 **/
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REDIRECT_URL]";
$banner = get_field('banner_news', 'option');
$other_info = get_field('other_info_news', 'option');
$main_navigation = $banner['main_navigation'];
$other_navigation = $banner['other_navigation'];
$the_slug = "hoat-dong-xa-hoi";
$args = array(
    'post_type'   => 'post',
    'post_status' => 'publish',
    'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
    'category_name' =>  $the_slug,
);
$post_of_outstanding = array(
    'post_type'   => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'category_name' =>  $the_slug,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => 'outstanding',
            'value' => '1',
            'compare' => 'LIKE'
        ),
        array(
            'key' => 'outstanding',
            'value' => '0',
            'compare' => 'LIKE'
        ),
    )
);
$post_of_news = array(
    'post_type'   => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'category_name' =>  $the_slug,
);
$filter = array(
    'post_type'    => 'post',
    'post_status' => 'publish',
    'category_name' =>  $the_slug,
);

$filter = new WP_Query($filter);
$the_query_post_outstanding = new WP_Query($post_of_outstanding);
$the_query_post_news = new WP_Query($post_of_news);
$the_query_post = new WP_Query($args);
get_header();
?>
<div class="hoat-dong-sx-kd-content tin-tuc-thuy-dien">
    <div class="terms-header ">
        <div class="terms-header-top" style='background-image:url("<?php echo $banner['background']; ?>")'>
            <div>
                <span class="line-headding"></span>
                <h3><?php echo isset($banner['title']) ? $banner['title'] : ""; ?></h3>
            </div>
        </div>
    </div>
    <div class="content-container">
        <div class="container">
            <div class="news-post">
                <div class="row">
                    <div class="col-12 col-lg-6 tin-noi-bat animate_underline  hover-zoom-img  hover-zoom ">
                        <h6>Tin nổi bật</h6>
                        <?php if ($the_query_post_outstanding->have_posts()) : ?>
                            <?php while ($the_query_post_outstanding->have_posts()) : $the_query_post_outstanding->the_post();
                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                                <img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>" class="img-banner">
                                <div class="content">
                                    <span class="tag tag-name"><span class="text"><?php echo get_the_tag_list('', ', ') ?></span> </span>
                                    <h5> <a href="<?php echo get_the_permalink() ?>"><?php echo the_title() ?></a></h5>
                                    <p class="size-text-16"><?php echo get_the_excerpt() ?></p>
                                    <span class="tag tag-calender">
                                        <span class="text"><?php echo get_the_date() ?></span>
                                    </span>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 col-lg-6 tin-moi-nhat-wrap">
                        <h6 class="title">Tin mới nhất</h6>
                        <div class="row tin-moi-nhat">
                            <?php if ($the_query_post_news->have_posts()) : ?>
                                <?php while ($the_query_post_news->have_posts()) : $the_query_post_news->the_post();
                                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                                    <div class="col-12 d-flex tin-moi-nhat-item hover-zoom hover-zoom-img ">
                                        <div class="img-banner">
                                            <img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>" class="img-banner">
                                        </div>
                                        <div class="content">
                                            <span class="tag tag-calender">
                                                <span class="text"><?php echo get_the_date() ?></span>
                                            </span>
                                            <h6><a href="<?php echo get_the_permalink() ?>"><?php echo the_title() ?></a></h6>
                                            <span class="tag tag-name"><span class="text"><?php echo get_the_tag_list('', ', ') ?></span>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navigation">
                <ul class="d-flex flex-wrap">
                <?php if ($other_navigation) : ?>
                        <?php foreach ($other_navigation as $key => $value) : ?>
                            <li class="<?php echo $actual_link == $value['link'] ? 'active' : '' ?>"> <a href="<?php echo $value['link']; ?>"><?php echo $value['label']; ?></a></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <section class="lists-post">
        <div class="container">
            <div class="row fillter">
                <div class="form-filter ">
                    <form action="" class="d-flex justify-content-between flex-wrap">
                        <div class="form-filter-search">
                            <input type="text" class="form-control search" placeholder="Tìm kiếm">
                        </div>
                        <div class="form-filter-company">
                            <select name="company" id="" class="form-select">
                                <option value="">Công ty</option>
                                <?php if ($filter->have_posts()) : ?>
                                    <?php while ($filter->have_posts()) : $filter->the_post(); ?>
                                        <option value="<?php echo get_field("company"); ?>"><?php echo get_field("company"); ?></option>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-filter-type">
                            <select name="type" id="" class="form-select">
                                <option value="">Loại hình</option>
                                <?php if ($filter->have_posts()) : ?>
                                    <?php while ($filter->have_posts()) : $filter->the_post(); ?>
                                        <option value="<?php echo get_field("type"); ?>"><?php echo get_field("type"); ?></option>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="button-submit">
                            <button class="btn btn-search btn-submit">Tìm kiếm</button>
                        </div>
                        <div class="button-reset">
                            <button class="btn btn-reset">Đặt lại</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="list">
                <?php if ($the_query_post->have_posts()) : ?>
                    <?php while ($the_query_post->have_posts()) : $the_query_post->the_post();
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                        <div class="custom-post d-flex ">
                            <img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>" class="img-banner">
                            <div class="content ">
                                <span class="tag tag-name"><span class="text"><?php echo get_the_tag_list('', ', ') ?></span> </span>
                                <h6> <a href="<?php echo get_the_permalink() ?>"><?php echo the_title() ?></a></h6>
                                <p class="size-text-16"><?php echo get_the_excerpt() ?></p>
                                <span class="tag tag-calender">
                                    <span class="text"><?php echo get_the_date() ?></span>
                                </span>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <nav aria-label="Page navigation example m-auto">
                <?php
                global $wp_query;
                $custom_query = '';
                if ($custom_query) $main_query = $custom_query;
                else $main_query = $wp_query;
                $paged = ($paged) ? $paged : get_query_var('paged');
                $big = 999999999;
                $total = isset($main_query->max_num_pages) ? $main_query->max_num_pages : '';
                if ($total > 1) echo '<ul class="pagination justify-content-center custom-pagination">';
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, $paged),
                    'total' => $total,
                    'mid_size' => '3',
                    'prev_text'    => __('<li class="page-item pagination-prev">Trước</li>', 'Bitexco'),
                    'next_text'    => __('<li class="page-item pagination-next">Sau</li>', 'Bitexco'),
                ));
                if ($total > 1) echo '</ul>';
                ?>
            </nav>
        </div>
    </section>
    <section class="other-information">
        <div class="other-container">
            <div class="other-content hover-zoom">
            <?php if ($other_info) : ?>
                    <?php foreach ($other_info as $value) : ?>
                        <a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>
<?php
get_footer();
?>